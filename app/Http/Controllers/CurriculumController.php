<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CurriculumField;


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
}