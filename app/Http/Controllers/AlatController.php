<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Alat;
class AlatController extends Controller
{
    public function index(){
        $menu='Angkutan';
        $page="master";
        return view("Alat.index",compact('menu','page'));
    }

    public function index_alat(){
        $menu='Transaksi Angkutan';
        $page="master";
        return view("Alat.index_alat",compact('menu','page'));
    }

    public function ubah(request $request){
        $data=Alat::find(base64_decode($request->id));
        echo'
                <input type="hidden" name="id" value="'.$data['id'].'">
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Nama Kendaraan</span></label>
                    <div class="col-lg-9 col-xl-9">
                        <input type="text" name="name"  placeholder="ketik disini..." value="'.$data['name'].'" class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">No Polisi / Nomor Plat</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="text" name="nopol"  placeholder="ketik disini..." value="'.$data['nopol'].'"  class="form-control">
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-lg-3 text-lg-right col-form-label">Kondisi</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="sts"  placeholder="ketik disini..."  class="form-control">
                            <option value="">Pilih Kondisi---</option>
                            <option value="1" '; if($data['sts']==1){echo'selected';} echo'>Ready</option>
                            <option value="2" '; if($data['sts']==2){echo'selected';} echo'>Maintenance</option>
                        </select>
                    </div>
                </div>
               
        ';
        
    }
    
    public function save(request $request){
        error_reporting(0);
        
        $rules = [
            'name'=> 'required',
            'nopol'=> 'required',
            'sts'=> 'required',
        ];

        $messages = [
            'name.required'=> 'Masukan nama Kendaraan', 
            'nopol.required'=> 'Masukan No Polisi / Plat Nomor', 
            'sts.required'=> 'Pilih Kondisi', 
            
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

            $count=Alat::where('nopol',$request->nopol)->count();
                    
            if($count>0){
                echo'<div style="padding:1%">Error !<br> No Polisi / Plat Nomor sudah terdaftar</div>';
            }else{
                $data= Alat::create([
                    'name'=>$request->name,
                    'nopol'=>$request->nopol,
                    'sts'=>$request->sts,
                ]);

                echo'ok';
            }
            

            
        }
    }

    public function update(request $request){
        error_reporting(0);
        
        $rules = [
            'name'=> 'required',
            'nopol'=> 'required',
            'sts'=> 'required',
        ];

        $messages = [
            'name.required'=> 'Masukan nama Kendaraan', 
            'nopol.required'=> 'Masukan No Polisi / Plat Nomor', 
            'sts.required'=> 'Pilih Kondisi', 
            
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

            $data= Alat::where('id',$request->id)->update([
                'nopol'=>$request->nopol,
                'name'=>$request->name,
                'sts'=>$request->sts,
            ]);

            echo'ok';
        }
    }

    public function hapus(request $request){
        $data=Alat::where('id',$request->id)->delete();
    }
}
