<?php

namespace App\Http\Controllers;

use App\Models\riwayatPenarikan;
use Illuminate\Http\Request;

class WalletTransaction extends Controller
{
    //
    public function index() {

      
        
        return view('admin.transaksi.list-transaksi');
    }
}
