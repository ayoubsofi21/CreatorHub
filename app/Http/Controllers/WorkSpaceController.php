<?php

namespace App\Http\Controllers;

use App\Models\workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workspaces = Workspace::all();
        return response()->json($workspaces);
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'user_id' => 'required|exists:users,id',
    ]);

    $workspace = Workspace::create([
        'name' => $request->name,
        'description' => $request->description,
        'user_id' => $request->user_id,
    ]);

    $workspace->columns()->createMany([
        [
            'name' => 'Todo',
            'position' => 1,
        ],
        [
            'name' => 'In Progress',
            'position' => 2,
        ],
        [
            'name' => 'Review',
            'position' => 3,
        ],
        [
            'name' => 'Done',
            'position' => 4,
        ],
    ]);

    return response()->json([
        'message' => 'Workspace successfully created',
        'workspace' => $workspace->load('columns')
    ], 201);
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
        $workspace = Workspace::findOrFail($id);
        $workspace->update($request->all());
        return response()->json($workspace);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workspace = Workspace::findOrFail($id);
        $workspace->delete();
        return response()->json(['message' => 'Workspace deleted successfully']);
    }
    public function invite(Request $request, workspace $workspace){
        request()->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        $workspace->members()->syncWithoutDetaching([$request->user_id]);
            return response()->json([
        'message' => 'Member invited successfully'
    ]);
    }
    public function members(workspace $workspace){
        $members = $workspace->members;
        return response()->json($members);
    }
    
}
