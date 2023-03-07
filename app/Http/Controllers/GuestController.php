<?php

namespace App\Http\Controllers;
use App\Models\DataSiswa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        $data = DB::table('data_siswas')->where('status','Terdaftar')->get();
        return view('guest.lihat_status',[
            'data' => $data,
        ]);
    }
}