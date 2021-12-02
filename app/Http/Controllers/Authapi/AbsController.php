<?php

namespace App\Http\Controllers\Authapi;
use App\Http\Controllers\Controller;
use App\User;
use App\Karyawan;
use Illuminate\Http\Request;
use Auth;


class AbsController extends Controller
{
    
    public function proses_absen(Request $request) {
        $data =User::where('username',Auth::user()->username)->first();
        // $data =Karyawan::where('nik_ktp',$request->nik)->first();
        return response()->json($data, 200);
    }
}
