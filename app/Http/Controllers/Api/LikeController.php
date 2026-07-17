<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealisationRequest;
use App\Http\Requests\UpdateRealisationRequest;
use App\Models\Realisation;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
public function create(Realisation $realisation)
{

    $like = Like::where('user_id', Auth::id())
        ->where('realisation_id', $realisation->id)
        ->first();

    if ($like) {
        return response()->json([
            'message' => 'You already liked this realisation.'
        ], 409);
    }

    Like::create([
        'user_id' => Auth::id(),
        'realisation_id' => $realisation->id,
    ]);

    return response()->json([
        'message' => 'Realisation liked successfully.'
    ], 201);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
