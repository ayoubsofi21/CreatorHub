<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;

class RealisationSearchController extends Controller
{
    public function search(Request $request)
    {
        // كنبداو بـ Query فارغة فيها العلاقات ديال المستخدم والمهارات
        $query = Realisation::with(['user', 'skills']);

        // 1. البحث بالكلمات المفتاحية فالعنوان أو الوصف (Search by keyword)
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // 2. التصفية حسب المهارات (Filter by Skill Name)
        if ($request->has('skill')) {
            $skillName = $request->skill;
            $query->whereHas('skills', function($q) use ($skillName) {
                $q->where('name', $skillName);
            });
        }

        // جلب النتائج مرتبة من الأحدث إلى الأقدم
        $realisations = $query->latest()->get();

        return response()->json($realisations, 200);
    }
}