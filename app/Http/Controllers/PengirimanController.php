<?php

namespace App\Http\Controllers;

use App\Models\pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.penjemputan.delivery');
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
    public function show(pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengiriman $pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengiriman $pengiriman)
    {
        //


    }
}
