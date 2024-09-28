<?php

namespace App\Http\Controllers;

use App\Models\helpdesk;
use App\Models\User;
use Illuminate\Http\Request;

class HelpdeskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('admin.helpdesk.helpdesk', compact('users'));
    }

    public function pesan($id) 
    {
        return view('livewire.floating-chat', compact('id'));
    }

    public function pesanUser()
    {
        $adminId = 1;
        return view('user.bantuan.pesanUser', compact('adminId'));
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
    public function show(helpdesk $helpdesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(helpdesk $helpdesk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, helpdesk $helpdesk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(helpdesk $helpdesk)
    {
        //
    }
}
