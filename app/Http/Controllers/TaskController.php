<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'workspace_id' => 'required|exists:workspaces,id',
            'column_id' => 'required|exists:columns,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);
        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'workspace_id' => $request->workspace_id,
            'column_id' => $request->column_id,
            'assigned_to' => $request->assigned_to,
        ]);
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'workspace_id' => 'sometimes|required|exists:workspaces,id',
            'column_id' => 'sometimes|required|exists:columns,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);
        $task->update($request->all());
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
