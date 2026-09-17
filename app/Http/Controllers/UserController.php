<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showLanguage(Request $request)
    {
        return response()->json([
            'language' => $request->user()->language,
        ]);
    }
    
    public function updateLanguage(Request $request)
    {
        $request->validate([
            'language' => ['required', 'in:pt,en'],
        ]);

        $user = $request->user();

        $user->update([
            'language' => $request->language,
        ]);

        return response()->json([
            'message' => 'Language updated successfully.',
            'language' => $user->language,
        ]);
    }
}