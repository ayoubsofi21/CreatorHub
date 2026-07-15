<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $realisationId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $userId = $request->user_id;
        $like = Like::where('user_id', $userId)
                    ->where('realisation_id', $realisationId)
                    ->first();

        if ($like) {
            $like->delete(); // إذا كان داير لايك كيحيدو (Unlike)
            return response()->json(['message' => 'Like removed successfully!'], 200);
        }

        // إذا ما كانش داير لايك كيتزاد
        Like::create([
            'user_id' => $userId,
            'realisation_id' => $realisationId
        ]);

        return response()->json(['message' => 'Realisation liked successfully!'], 201);
    }
}
