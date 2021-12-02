<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Customer;
class CustomerController extends Controller
{
    public function index(){
        $menu='Customer';
        $page="master";
        return view("Customer.index",compact('menu','page'));
    }

    public function ubah(request $request){
        $data=Customer::find($request->id);
        echo'
                <input type="hidden" name="id" value="'.$data['id'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama Customer</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <input type="text" name="name" placeholder="ketik disini..." value="'.$data['name'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Alamat Customer</span></label>
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
            'name.required'=> 'Masukan nama customer', 
            'alamat.required'=> 'Masukan alamat customer', 
            'telepon.required'=> 'Masukan telepon customer', 
            'email.required'=> 'Masukan email customer', 
            
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

            $count=Customer::count();
                    
            if($count>0){
                $cek=Customer::orderBy('kode_customer','Desc')->firstOrfail();
                $urutan = (int) substr($cek['kode_customer'], 2, 4);
                $urutan++;
                $kode="CS".sprintf("%04s", $urutan);
            }else{
                $kode="CS".sprintf("%04s", 1);
            }
            $data= Customer::create([
                'name'=>$request->name,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'telepon'=>$request->telepon,
                'kode_customer'=>$kode,
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
            'name.required'=> 'Masukan nama customer', 
            'alamat.required'=> 'Masukan alamat customer', 
            'telepon.required'=> 'Masukan telepon customer', 
            'email.required'=> 'Masukan email customer', 
            
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

            $data= Customer::where('id',$request->id)->update([
                'name'=>$request->name,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'telepon'=>$request->telepon,
            ]);

            echo'ok';
        }
    }

    public function hapus(request $request){
        $data=Customer::where('id',$request->id)->delete();
    }
}
