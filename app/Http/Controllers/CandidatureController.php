<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplyOfferRequest;
use App\Models\Candidature;
use App\Models\Offer;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function apply(ApplyOfferRequest $request, Offer $offer)
            {
                $candidature = Candidature::create([
                    'offer_id' => $offer->id,

                    // Later replace with auth()->id()
                    'user_id' => 2,

                    'message' => $request->message,

                    'status' => 'pending',
                ]);

                return response()->json([
                    'message' => 'condidature submitted successfully.',
                    'application' => $candidature,
                ], 201);
            }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidature $candidature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        //
    }
    
}
