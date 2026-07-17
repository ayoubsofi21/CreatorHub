<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;

class RealisationSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Realisation::with(['user', 'skills']);
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        if ($request->has('skill')) {
            $skillName = $request->skill;
            $query->whereHas('skills', function($q) use ($skillName) {
                $q->where('name', $skillName);
            });
        }
        $realisations = $query->latest()->get();
        return response()->json($realisations, 200);
    }
}