<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request){
        
            $menu='Dashboard';
            $page="home";
            if($request->tahun==''){
                $tahun=date('Y');
            }else{
                $tahun=$request->tahun;
            }
            return view('welcome',compact('menu','page','tahun'));
        
    }
}
