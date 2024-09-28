<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserWithdrawRequest;
use App\Models\riwayatPenarikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    //

    public function dompet() 
    {
        // $user = Auth::user();
        

        // $transactions = riwayatPenarikan::where('user_id', $user->id)
        // ->orderByDesc('id')                                                                           
        // ->paginate(10);

        return view('user.transaksi.dompet');
    }

    public function penarikan(StoreUserWithdrawRequest $request) 
    {
        $user = Auth::user();

        DB::transaction(function() use ($request, $user) 
        {
            $validated = $request->validated();
            $validated['type'] = "TopUp";
            $validated['menunggu'] = true;
            $validated['berhasil'] = false;
            $validated['gagal'] = false;
            $validated['user_id'] = $user->id;
            
            
            $newTopUp = riwayatPenarikan::create($validated);
          
        });

        return redirect()->route('transaksi.dompet');
    }
}
