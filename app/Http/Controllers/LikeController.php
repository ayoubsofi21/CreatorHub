<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    public function toggleLike(LikeRequest $request, $realisationId)
    {
        // hna kay9lab 3la dak user_id o realisation_id o kaydir validation diyal les champ
        $validated = $request->validated(); 
        $userId = $validated['user_id'];
        $like = Like::where('user_id', $userId)
                    ->where('realisation_id', $realisationId)
                    ->first();
        if ($like) {
            $like->delete(); // hna ila l9a like deja kayn kay7aydo 
            return response()->json(['message' => 'Like removed successfully!'], 200);
        }
        // ila makaynch like hna kanzidouh    
        Like::create([
            'user_id' => $userId,
            'realisation_id' => $realisationId
        ]);
        return response()->json(['message' => 'Realisation liked successfully!'], 201);
    }
}
