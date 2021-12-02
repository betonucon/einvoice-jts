<?php

namespace App\Http\Controllers;
use App\Vendor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MasterController extends Controller
{
    public function hashmake(request $request){
        $data=Hash::make($request->text);
        echo $data;
    }
}
