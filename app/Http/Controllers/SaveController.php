<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRequest;
class SaveController extends Controller
{
   public function toggleSave(SaveRequest $request, $realisationId)
    {
        $request->validate([
            'user_id' => 'required:users,id'
        ]);
        $userId = $request->user_id;
        $save = Save::where('user_id', $userId)
                    ->where('realisation_id', $realisationId)
                    ->first();
        if ($save) {
            $save->delete(); // Unsave
            return response()->json(['message' => 'Realisation unsaved successfully!'], 200);
        }
        Save::create([
            'user_id' => $userId,
            'realisation_id' => $realisationId
        ]);
        return response()->json(['message' => 'Realisation saved successfully!'], 201);
    }
}
