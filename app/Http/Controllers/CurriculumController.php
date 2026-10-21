<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\CurriculumField;
use App\Services\CurriculumAiService;
use Throwable;

class CurriculumController extends Controller
{
    public function show()
    {
        $curriculumField = CurriculumField::where('user_id', Auth::id())->first();

        return response()->json([
            'curriculum' => $curriculumField,
        ]);
    }

    public function update(Request $request)
    {
        $curriculumField = CurriculumField::firstOrCreate(
            [
                'user_id' => Auth::id(),
            ],
            [
                'font_size' => 1,
            ]
        );

        $curriculumField->update(
            $request->except([
                'user_id',
                'font_size',
            ])
        );

        return response()->json([
            'message' => 'Curriculum saved successfully.',
            'curriculum' => $curriculumField,
        ]);
    }

    public function updateFontSize(Request $request)
    {
        $request->validate([
            'font_size' => ['required'],
        ]);

        $userId = Auth::id();

        $curriculumField = CurriculumField::where('user_id', $userId)->first();

        if (!$curriculumField) {
            return response()->json([
                'message' => 'Curriculum not found.',
            ], 404);
        }

        $curriculumField->update([
            'font_size' => $request->font_size,
        ]);

        return response()->json([
            'message' => 'Font size updated successfully.',
        ]);
    }

    public function generateAi(Request $request, CurriculumAiService $service)
    {
        $rules = [
            'prompt' => ['required', 'string', 'min:20', 'max:15000'],
            'profile' => ['required', 'array'],
        ];

        foreach (CurriculumAiService::PROFILE_FIELDS as $field) {
            $rules["profile.{$field}"] = ['sometimes', 'nullable', 'string', 'max:3000'];
        }

        $validated = $request->validate($rules);

        $profile = [];

        foreach (CurriculumAiService::PROFILE_FIELDS as $field) {
            $value = $validated['profile'][$field] ?? null;

            if (is_string($value) && trim($value) !== '') {
                $profile[$field] = trim($value);
            }
        }

        $evidenceFields = array_merge(
            [
                'about',
                'responsibilities',
                'responsibilities_2',
                'position',
                'position_2',
                'course_name',
            ],
            array_map(fn ($index) => "hard_skill_{$index}", range(1, 5)),
            array_map(fn ($index) => "info_{$index}", range(1, 5))
        );

        $hasEvidence = collect($evidenceFields)->contains(
            fn ($field) => !empty($profile[$field])
        );

        if (!$hasEvidence) {
            return response()->json([
                'message' => 'Preencha ao menos uma informação profissional verdadeira antes de gerar o currículo com IA.',
            ], 422);
        }

        if (!config('gemini.api_key')) {
            return response()->json([
                'message' => 'A integração com o Gemini ainda não foi configurada no servidor.',
            ], 503);
        }

        try {
            $generated = $service->generate($validated['prompt'], $profile);

            return response()->json([
                'message' => 'Currículo gerado com sucesso.',
                'curriculum' => $generated,
            ]);
        } catch (Throwable $exception) {
            Log::warning('Falha ao gerar currículo com Gemini.', [
                'exception' => get_class($exception),
            ]);

            return response()->json([
                'message' => 'Não foi possível gerar o currículo agora. Tente novamente em instantes.',
            ], 502);
        }
    }
}
