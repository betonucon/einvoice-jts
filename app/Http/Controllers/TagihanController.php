<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Tagihan;
class TagihanController extends Controller
{
    public function index(){
        if(Auth::user()->role_id==2 || Auth::user()->role_id==3){
            $menu='Tagihan';
            $page="tagihan";
            return view("Tagihan.index",compact('menu','page'));
        }else{
            return view("error");
        }
    }
    
    public function buat(request $request){
        $menu='Buat Tagihan';
        $page="tagihan";
        if($request->tagihan==0){
            $tagihan=0;
        }else{
            $tagihan=$request->tagihan;
        }
        return view("Tagihan.create",compact('menu','page','tagihan'));
    }

    public function ubah(request $request){
        $menu='Ubah Tagihan';
        $cek=Tagihan::where('id',base64_decode($request->id))->where('sts',1)->count();
        if($cek>0){
            $data=Tagihan::where('id',base64_decode($request->id))->first();
            $page="tagihan";
            return view("Tagihan.edit",compact('menu','page','data'));
        }else{
            return redirect('Tagihan');
        }
    }

    public function index_acc(){
        if(Auth::user()->role_id==4){
            $menu='Persetujuan Tagihan';
            $page="tagihan";
            return view("Tagihan.index_acc",compact('menu','page'));
        }else{
            return view("error");
        }
    }

    public function index_bayar(){
        if(Auth::user()->role_id==5){
            $menu='Pembayaran Tagihan';
            $page="tagihan";
            return view("Tagihan.index_bayar",compact('menu','page'));
        }else{
            return view("error");
        }
    }

    
    
    public function save(request $request){
        error_reporting(0);
        if($request->tagihan==2){

                $rules = [
                    'tagihan'=> 'required',
                    'invoice'=> 'required',
                    'kode_vendor'=> 'required',
                    'name'=> 'required',
                    'nilai'=> 'required',
                    'file'=> 'required',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'invoice.required'=> 'Masukan Nomor Invoice Tagihan', 
                    'kode_vendor.required'=> 'Pilih Vendor', 
                    'name.required'=> 'Masukan Keterangan Tagihan', 
                    'nilai.required'=> 'Masukan Nilai Tagihan', 
                    'file.required'=> 'Upload Dokumen Tagihan', 
                    'tanggal.required'=> 'Masukan Tanggal Tagihan', 
                    
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

                    $image = $request->file('file');
                    $size = $image->getSize();
                    $imageFileName ='TG'.str_replace("/","-",$request->invoice).'.'. $image->getClientOriginalExtension();
                    $filePath =$imageFileName;
                    $file = \Storage::disk('public_uploads');
                    
                    
                    if($image->getClientOriginalExtension()=='pdf'){
                        if($file->put($filePath, file_get_contents($image))){
                            
                                $data= Tagihan::create([
                                    'invoice'=>$request->invoice,
                                    'tagihan'=>$request->tagihan,
                                    'kode_vendor'=>$request->kode_vendor,
                                    'name'=>$request->name,
                                    'nilai'=>ubah_uang($request->nilai),
                                    'file'=>$filePath,
                                    'role_id'=>Auth::user()['role_id'],
                                    'tanggal'=>$request->tanggal,
                                    'create'=>date('Y-m-d H:i:s'),
                                    'sts'=>1,
                                ]);

                                echo'ok';
                        }else{
                            echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                        }
                    }else{
                        echo'<div style="padding:1%">Error ! <br> Format file harus pdf</div>';
                    }
                }

        }else{

                $rules = [
                    'invoice'=> 'required',
                    'alat_id'=> 'required',
                    'name'=> 'required',
                    'nilai'=> 'required',
                    'file'=> 'required',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'invoice.required'=> 'Masukan Nomor Invoice Tagihan', 
                    'alat_id.required'=> 'Pilih Angkutan', 
                    'name.required'=> 'Masukan Keterangan Tagihan', 
                    'nilai.required'=> 'Masukan Nilai Tagihan', 
                    'file.required'=> 'Upload Dokumen Tagihan', 
                    'tanggal.required'=> 'Masukan Tanggal Tagihan', 
                    
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

                    $image = $request->file('file');
                    $size = $image->getSize();
                    $imageFileName ='TG'.str_replace("/","-",$request->invoice).'.'. $image->getClientOriginalExtension();
                    $filePath =$imageFileName;
                    $file = \Storage::disk('public_uploads');
                    
                    
                    if($image->getClientOriginalExtension()=='pdf'){
                        if($file->put($filePath, file_get_contents($image))){
                            
                                $data= Tagihan::create([
                                    'invoice'=>$request->invoice,
                                    'tagihan'=>$request->tagihan,
                                    'kode_vendor'=>'VN0001',
                                    'alat_id'=>$request->alat_id,
                                    'name'=>$request->name,
                                    'nilai'=>ubah_uang($request->nilai),
                                    'file'=>$filePath,
                                    'role_id'=>Auth::user()['role_id'],
                                    'tanggal'=>$request->tanggal,
                                    'create'=>date('Y-m-d H:i:s'),
                                    'sts'=>1,
                                ]);

                                echo'ok';
                        }else{
                            echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                        }
                    }else{
                        echo'<div style="padding:1%">Error ! <br> Format file harus pdf</div>';
                    }
                }
        }
    }

    public function update(request $request){
        error_reporting(0);
        if($request->tagihan==2){
                $rules = [
                    'invoice'=> 'required',
                    'kode_vendor'=> 'required',
                    'name'=> 'required',
                    'nilai'=> 'required',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'invoice.required'=> 'Masukan Nomor Invoice Tagihan', 
                    'kode_vendor.required'=> 'Pilih Vendor',
                    'name.required'=> 'Masukan Keterangan Tagihan', 
                    'nilai.required'=> 'Masukan Nilai Tagihan', 
                    'tanggal.required'=> 'Masukan Tanggal Tagihan', 
                    
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
                    if($request->file==''){
                            $data= Tagihan::where('id',$request->id)->where('sts',1)->update([
                                'invoice'=>$request->invoice,
                                'kode_vendor'=>$request->kode_vendor,
                                'name'=>$request->name,
                                'nilai'=>ubah_uang($request->nilai),
                                'tanggal'=>$request->tanggal,
                                'create'=>date('Y-m-d H:i:s'),
                                'sts'=>1,
                            ]);

                            echo'ok';
                    }else{
                        $tgs= Tagihan::where('id',$request->id)->first();
                        $image = $request->file('file');
                        $size = $image->getSize();
                        $imageFileName ='TG'.$request->invoice.'.'. $image->getClientOriginalExtension();
                        $filePath =$imageFileName;
                        $file = \Storage::disk('public_uploads');
                        
                        
                        if($image->getClientOriginalExtension()=='pdf'){
                            if($file->put($filePath, file_get_contents($image))){
                                
                                    $data= Tagihan::where('id',$request->id)->where('sts',1)->update([
                                        'invoice'=>$request->invoice,
                                        'kode_vendor'=>$request->kode_vendor,
                                        'name'=>$request->name,
                                        'nilai'=>ubah_uang($request->nilai),
                                        'file'=>$filePath,
                                        'tanggal'=>$request->tanggal,
                                        'create'=>date('Y-m-d H:i:s'),
                                        'sts'=>1,
                                    ]);

                                    echo'ok';
                            }else{
                                echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                            }
                        }else{
                            echo'<div style="padding:1%">Error ! <br> Format file harus pdf</div>';
                        }
                    }
                }
        }

        if($request->tagihan==1){
                $rules = [
                    'invoice'=> 'required',
                    'alat_id'=> 'required',
                    'name'=> 'required',
                    'nilai'=> 'required',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'invoice.required'=> 'Masukan Nomor Invoice Tagihan', 
                    'alat_id.required'=> 'Pilih Angkutan', 
                    'name.required'=> 'Masukan Keterangan Tagihan', 
                    'nilai.required'=> 'Masukan Nilai Tagihan', 
                    'tanggal.required'=> 'Masukan Tanggal Tagihan', 
                    
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
                    if($request->file==''){
                            $data= Tagihan::where('id',$request->id)->where('sts',1)->update([
                                'invoice'=>$request->invoice,
                                'alat_id'=>$request->alat_id,
                                'name'=>$request->name,
                                'nilai'=>ubah_uang($request->nilai),
                                'tanggal'=>$request->tanggal,
                                'create'=>date('Y-m-d H:i:s'),
                                'sts'=>1,
                            ]);

                            echo'ok';
                    }else{
                        $image = $request->file('file');
                        $size = $image->getSize();
                        $imageFileName =$request->invoice.'.'. $image->getClientOriginalExtension();
                        $filePath =$imageFileName;
                        $file = \Storage::disk('public_uploads');
                        
                        
                        if($image->getClientOriginalExtension()=='pdf'){
                            if($file->put($filePath, file_get_contents($image))){
                                
                                    $data= Tagihan::where('id',$request->id)->where('sts',1)->update([
                                        'invoice'=>$request->invoice,
                                        'alat_id'=>$request->alat_id,
                                        'name'=>$request->name,
                                        'nilai'=>ubah_uang($request->nilai),
                                        'file'=>$filePath,
                                        'tanggal'=>$request->tanggal,
                                        'create'=>date('Y-m-d H:i:s'),
                                        'sts'=>1,
                                    ]);

                                    echo'ok';
                            }else{
                                echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                            }
                        }else{
                            echo'<div style="padding:1%">Error ! <br> Format file harus pdf</div>';
                        }
                    }
                }
        }


    }

    public function approval(request $request){
        error_reporting(0);
        
        $rules = [
            'sts'=> 'required',
        ];

        $messages = [
            'sts.required'=> 'Pilih Status Approval', 
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

            $data= Tagihan::where('id',$request->id)->update([
                'sts'=>$request->sts,
                'alasan'=>$request->alasan,
                'tanggal_approval'=>date('Y-m-d'),
            ]);

            echo'ok';
        }
    }

    public function bayar(request $request){
        error_reporting(0);
        
        $rules = [
            'file'=> 'required|mimes:pdf,jpeg,png,jpg,gif,svg',
        ];

        $messages = [
            'file.required'=> 'Upload dokumen pembayaran dengan format (pdf,jpeg,png,jpg,gif,svg)', 
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
            $datat=Tagihan::where('id',$request->id)->first();
            $image = $request->file('file');
            $size = $image->getSize();
            $imageFileName ='BY'.$datat['invoice'].'.'. $image->getClientOriginalExtension();
            $filePath =$imageFileName;
            $file = \Storage::disk('public_uploads');
            
            
            if($file->put($filePath, file_get_contents($image))){
                $data= Tagihan::where('id',$request->id)->update([
                    'sts'=>3,
                    'file_bayar'=>$filePath,
                    'tanggal_bayar'=>date('Y-m-d'),
                ]);

                echo'ok';
            }else{
                echo'Gagal upload';
            }
        }
    }

    public function hapus(request $request){
        $data=Tagihan::where('id',$request->id)->where('sts',1)->delete();
    }
}
