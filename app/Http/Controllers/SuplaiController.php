<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDeliveryRequest;
use App\Http\Requests\StoreUserSupplyRequest;
use App\Models\pengiriman;
use App\Models\suplai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuplaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        //
        return view('user.beranda.index');
    }

    public function index()
    {
        //
        return view('admin.suplai.supply');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreUserSupplyRequest $request, StoreUserDeliveryRequest $delivery)
    {


        $user = Auth::user();
        DB::transaction(function() use ($request, $user, $delivery) {
            $validated = $request->validated();
            $validated['user_id'] = $user->id;
            $validated['menunggu'] = true;
            $validated['diterima'] = false;
            $validated['ditolak'] = false;

            $newReSupply = suplai::create($validated);

            $validatedDelivery = $delivery->validated();
            $validatedDelivery['user_id'] = $user->id;
            $validatedDelivery['menunggu'] = true;
            $validatedDelivery['berhasil'] = false;
            $validatedDelivery['ditolak'] = false;

            $newReDelivery = pengiriman::create($validatedDelivery);

        
            

        });

        return redirect()->route('suplai.home');
       
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
    public function show(suplai $suplai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(suplai $suplai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, suplai $suplai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(suplai $suplai)
    {
        //
    }
}
