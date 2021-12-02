<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Gudang;
class GudangController extends Controller
{
    public function index(){
        $menu='Gudang';
        $page="master";
        return view("Gudang.index",compact('menu','page'));
    }

    public function index_transaksi(request $request){
        $menu='Transaksi Gudang';
        $page="master";
        return view("Gudang.index_transaksi",compact('menu','page'));
    }

    public function ubah(request $request){
        $data=Gudang::find(base64_decode($request->id));
        echo'
                <input type="hidden" name="id" value="'.$data['id'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama Gudang</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <input type="text" name="kode" placeholder="ketik disini..." value="'.$data['kode'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Detail Gudang</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <textarea name="name" placeholder="ketik disini..."  class="form-control" rows="4">'.$data['name'].'</textarea>
                    </div>
                </div>
                
        ';
        
    }
    
    public function save(request $request){
        error_reporting(0);
        
        $rules = [
            'kode'=> 'required',
            'name'=> 'required',
        ];

        $messages = [
            'kode.required'=> 'Masukan kode Gudang', 
            'name.required'=> 'Masukan nama Gudang', 
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div style="padding:1%">Error !<br>';
            foreach(parsing_validator($val) as $value){
                foreach($value as $isi){
                    echo'-&nbsp;'.$isi.'<br>';
                }
            }
            echo'</div>';
        }else{

            $count=Gudang::count();
                    
            $data= Gudang::create([
                'name'=>$request->name,
                'kode'=>$request->kode,
            ]);

            echo'ok';
        }
    }

    public function update(request $request){
        error_reporting(0);
        
        $rules = [
            'kode'=> 'required',
            'name'=> 'required',
        ];

        $messages = [
            'kode.required'=> 'Masukan kode Gudang', 
            'name.required'=> 'Masukan nama Gudang', 
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div style="padding:1%">Error !<br>';
            foreach(parsing_validator($val) as $value){
                foreach($value as $isi){
                    echo'-&nbsp;'.$isi.'<br>';
                }
            }
            echo'</div>';
        }else{

            $data= Gudang::where('id',$request->id)->update([
                'name'=>$request->name,
                'kode'=>$request->kode,
            ]);

            echo'ok';
        }
    }

    public function hapus(request $request){
        $data=Gudang::where('id',$request->id)->delete();
    }
}
