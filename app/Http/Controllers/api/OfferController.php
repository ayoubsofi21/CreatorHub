<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $offers = Offer::with('user', 'skills')
            ->latest()
            ->get();

        return response()->json($offers);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreOfferRequest $request)
{
    $offer = Offer::create([
        // 'user_id' => auth()->id(),
        'user_id' => 1,
        'title' => $request->title,
        'description' => $request->description,
        'budget' => $request->budget,
        'deadline' => $request->deadline,
    ]);

    $offer->skills()->sync($request->skills);

    return response()->json([
        'message' => 'Offer created successfully.',
        'offer' => $offer->load('skills'),
    ], 201);
}   

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return response()->json(
            $offer->load('user', 'skills', 'candidatures.user')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
            'deadline' => $request->deadline,
        ]);

        $offer->skills()->sync($request->skills);

        return response()->json([
            'message' => 'Offer updated successfully.',
            'offer' => $offer->load('user', 'skills'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return response()->json([
            'message' => 'Offer deleted successfully.'
        ], 200);
    }
}
