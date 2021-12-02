<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Vendor;
class VendorController extends Controller
{
    public function index(){
        $menu='Vendor';
        $page="master";
        return view("Vendor.index",compact('menu','page'));
    }

    public function ubah(request $request){
        $data=Vendor::find($request->id);
        echo'
                <input type="hidden" name="id" value="'.$data['id'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama Vendor</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <input type="text" name="name" placeholder="ketik disini..." value="'.$data['name'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Alamat Vendor</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <textarea name="alamat" placeholder="ketik disini..."  class="form-control" rows="4">'.$data['alamat'].'</textarea>
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">No Telepon</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="text" name="telepon" placeholder="ketik disini..." value="'.$data['telepon'].'"  class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Email</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <input type="text" name="email" placeholder="ketik disini..." value="'.$data['email'].'"  class="form-control">
                    </div>
                </div>
        ';
        
    }
    
    public function save(request $request){
        error_reporting(0);
        
        $rules = [
            'name'=> 'required',
            'alamat'=> 'required',
            'telepon'=> 'required',
            'email'=> 'required',
        ];

        $messages = [
            'name.required'=> 'Masukan nama Vendor', 
            'alamat.required'=> 'Masukan alamat Vendor', 
            'telepon.required'=> 'Masukan telepon Vendor', 
            'email.required'=> 'Masukan email Vendor', 
            
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

            $count=Vendor::count();
                    
            if($count>0){
                $cek=Vendor::orderBy('kode_vendor','Desc')->firstOrfail();
                $urutan = (int) substr($cek['kode_vendor'], 2, 4);
                $urutan++;
                $kode="VN".sprintf("%04s", $urutan);
            }else{
                $kode="VN".sprintf("%04s", 1);
            }
            $data= Vendor::create([
                'name'=>$request->name,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'telepon'=>$request->telepon,
                'kode_vendor'=>$kode,
            ]);

            echo'ok';
        }
    }

    public function update(request $request){
        error_reporting(0);
        
        $rules = [
            'name'=> 'required',
            'alamat'=> 'required',
            'telepon'=> 'required',
            'email'=> 'required',
        ];

        $messages = [
            'name.required'=> 'Masukan nama Vendor', 
            'alamat.required'=> 'Masukan alamat Vendor', 
            'telepon.required'=> 'Masukan telepon Vendor', 
            'email.required'=> 'Masukan email Vendor', 
            
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

            $data= Vendor::where('id',$request->id)->update([
                'name'=>$request->name,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'telepon'=>$request->telepon,
            ]);

            echo'ok';
        }
    }

    public function hapus(request $request){
        $data=Vendor::where('id',$request->id)->delete();
    }
}
