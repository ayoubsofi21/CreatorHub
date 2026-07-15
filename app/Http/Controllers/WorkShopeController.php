<?php

namespace App\Http\Controllers;

use App\Models\workspace;
use Illuminate\Http\Request;

class WorkShopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workspaces = workspace::all();
        return response()->json($workspaces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $work=workspace::create($request->all());
        return response()->json(['workspace' => $work, 'message' => 'Workspace successfully created'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
