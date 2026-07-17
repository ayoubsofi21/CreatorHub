<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggleLike(LikeRequest $request, $realisationId)
    {
        $validated = $request->validated();
        $userId = $validated['user_id'];

        $like = Like::where('user_id', $userId)
            ->where('realisation_id', $realisationId)
            ->first();

        if ($like) {
            $like->delete();

            return response()->json(['message' => 'Like removed successfully!'], 200);
        }

        Like::create([
            'user_id' => $userId,
            'realisation_id' => $realisationId,
        ]);

        return response()->json(['message' => 'Realisation liked successfully!'], 201);
    }
}
