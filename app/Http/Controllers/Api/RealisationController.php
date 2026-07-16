<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealisationRequest;
use App\Http\Requests\UpdateRealisationRequest;
use App\Models\Realisation;
use Illuminate\Support\Facades\Auth;

class RealisationController extends Controller
{
    // Feed
    public function index()
    {
        return response()->json(
            Realisation::with(['user', 'skills'])
                ->withCount(['likes', 'comments', 'saves'])
                ->latest()
                ->get()
        );
    }

    // Create
    public function store(StoreRealisationRequest $request)
    {
        $realisation = Realisation::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'media_url' => $request->media_url,
            'media_type' => $request->media_type,
        ]);

        if ($request->has('skills')) {
            $realisation->skills()->sync($request->skills);
        }

        return response()->json([
            'message' => 'Realisation created successfully',
            'data' => $realisation->load('skills')
        ], 201);
    }

    // Show
    public function show(Realisation $realisation)
    {
        return response()->json(
            $realisation->load([
                'user',
                'skills',
                'likes',
                'comments',
                'saves'
            ])
        );
    }

    // Update
    public function update(UpdateRealisationRequest $request, Realisation $realisation)
    {
        if ($realisation->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $realisation->update($request->validated());

        if ($request->has('skills')) {
            $realisation->skills()->sync($request->skills);
        }

        return response()->json([
            'message' => 'Realisation updated',
            'data' => $realisation->load('skills')
        ]);
    }

    // Delete
    public function destroy(Realisation $realisation)
    {
        if ($realisation->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $realisation->delete();

        return response()->json([
            'message' => 'Realisation deleted successfully'
        ]);
    }
}





