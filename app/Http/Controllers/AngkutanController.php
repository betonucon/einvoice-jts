<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Invoice;
use App\Transaksialat;
use PDF;
class AngkutanController extends Controller
{
    public function index(){
        if(Auth::user()->role_id==2 || Auth::user()->role_id==3){
            $menu='Invoice';
            $page="Angkutan";
            return view("Angkutan.index",compact('menu','page'));
        }else{
            return view("error");
        }
    }
    
    public function buat(request $request){
        $menu='Buat Invoice';
        $page="Angkutan";
        if($request->transaksi==''){
            $transaksi=1;
        }else{
            $transaksi=$request->transaksi;
        }
        $data=Invoice::where('invoice',$request->invoice)->first();
        return view("Angkutan.create",compact('menu','page','data','transaksi'));
    }

    public function ubah(request $request){
        $menu='Ubah Invoice';
        $cek=Invoice::where('id',base64_decode($request->id))->where('sts',1)->count();
        
        if($cek>0){
            $data=Invoice::where('id',base64_decode($request->id))->first();
            if($request->transaksi==''){
                $transaksi=$data['transaksi'];
            }else{
                $transaksi=$request->transaksi;
            }
            $page="Angkutan";
            return view("Angkutan.edit",compact('menu','page','data','transaksi'));
        }else{
            return redirect('Invoice');
        }
    }

    public function view(request $request){
        $menu='View Invoice';
        
            $data=Invoice::where('id',$request->id)->first();
            if($request->transaksi==''){
                $transaksi=$data['transaksi'];
            }else{
                $transaksi=$request->transaksi;
            }
            $page="Angkutan";
            return view("Angkutan.view",compact('menu','page','data','transaksi'));
        
    }

    public function view_admin(request $request){
        $menu='Proses Angkutan';
        
            $data=Invoice::where('id',base64_decode($request->id))->first();
            if($request->transaksi==''){
                $transaksi=$data['transaksi'];
            }else{
                $transaksi=$request->transaksi;
            }
            $page="Angkutan";
            return view("Angkutan.view_admin",compact('menu','page','data','transaksi'));
        
    }

    public function index_acc(){
        if(Auth::user()->role_id==4){
            $menu='Persetujuan Invoice';
            $page="Angkutan";
            return view("Angkutan.index_acc",compact('menu','page'));
        }else{
            return view("error");
        }
    }

    public function index_bayar(){
        if(Auth::user()->role_id==5){
            $menu='Pembayaran Invoice';
            $page="Angkutan";
            return view("Angkutan.index_bayar",compact('menu','page'));
        }else{
            return view("error");
        }
    }

    public function lokasi_gudang(request $request){
        echo'
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Plat Nomor</th>
                        <th>Nama Kendaraan</th>
                    </tr>
                </thead>
                <tbody>';
                    $jum=0;
                    foreach(transaksialat_get($request->id) as $nx=>$detail){
                        
                        echo'
                        <tr>
                            <td><span class="btn btn-red btn-xs" onclick="hapus_gudang('.$detail['id'].')"><i class="fas fa-trash-alt"></i></span></td>
                            <td>'.$detail->alat['nopol'].'</td>
                            <td>'.$detail->alat['name'].'</td>
                        </tr>';
                    }
                    echo'
                    
                </tbody>
            </table>

        ';
    }

    public function lokasi_gudang_view(request $request){
        echo'
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Plat Nomor</th>
                        <th>Nama Kendaraan</th>
                    </tr>
                </thead>
                <tbody>';
                    
                    foreach(transaksialat_get($request->id) as $nx=>$detail){
                       
                        echo'
                        <tr>
                            <td>'.($nx+1).'</td>
                            <td>'.$detail->alat['nopol'].'</td>
                            <td>'.$detail->alat['name'].'</td>
                        </tr>';
                    }
                    echo'
                    
                </tbody>
            </table>

        ';
    }
    public function lokasi_gudang_admin_view(request $request){
        echo'
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Plat Nomor</th>
                        <th>Nama Kendaraan</th>
                        <th width="20%">Muatan</th>
                        <th width="8%">Proses</th>
                    </tr>
                </thead>
                <tbody>';
                    
                    foreach(transaksialat_get($request->id) as $nx=>$detail){
                       
                        echo'
                        <tr>
                            <td>'.($nx+1).'</td>
                            <td>'.$detail->alat['nopol'].'</td>
                            <td>'.$detail->alat['name'].'</td>
                            <td>'.$detail['qty'].' Rit</td>
                            <td><span class="btn btn-blue btn-xs" onclick="proses_angkut('.$detail['id'].',`'.$detail->alat['nopol'].'`,`'.$detail->alat['name'].'`)"><i class="fas fa-truck"></i></span></td>
                            
                        </tr>';
                    }
                    echo'
                    
                </tbody>
            </table>

        ';
    }

    
    
    public function create_sewa(request $request){
        $bul=explode('-',date('Y-m-d'));
        $count=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('kategori',1)->count();
        
        if($count>0){
            $cek=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('kategori',1)->orderBy('id','Desc')->firstOrfail();
            $urutan = substr($cek['invoice'],0,3);
            
            $urutan++;
            $invoice=sprintf("%03s", $urutan).'/AK/JTS/TR-IPP/INV/'.romawi($bul[1]).'/'.$bul[0];
            $nomor=sprintf("%03s", $urutan).'AKJTSTR-IPPINV'.romawi($bul[1]).$bul[0];
        }else{
            $invoice=sprintf("%03s", 1).'/AK/JTS/TR-IPP/INV/'.romawi($bul[1]).'/'.$bul[0];
            $nomor=sprintf("%03s", 1).'AKJTSTR-IPPINV'.romawi($bul[1]).$bul[0];
            
        }
        $cek=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('sts',0)->where('kategori',1)->count();
        if($cek>0){
            $inv=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('sts',0)->where('kategori',1)->first();
            echo $inv['invoice'];
        }else{
            $data= Invoice::create([
                'invoice'=>$invoice,
                'nomor'=>$nomor,
                'role_id'=>Auth::user()['role_id'],
                'create'=>date('Y-m-d H:i:s'),
                'bulan'=>$bul[1],
                'tahun'=>$bul[0],
                'sts'=>0,
                'kategori'=>1,
            ]);
            echo $invoice;
        }
    }


    public function save(request $request){
        error_reporting(0);
        
        $rules = [
            'kode_customer'=> 'required',
            'name'=> 'required',
            'nilai'=> 'required',
            'file'=> 'required|mimes:pdf,jpeg,png,jpg,gif,svg',
            'tanggal'=> 'required',
        ];

        $messages = [
            'kode_customer.required'=> 'Pilih customer', 
            'name.required'=> 'Masukan Keterangan Invoice', 
            'nilai.required'=> 'Masukan Nilai Invoice', 
            'file.required'=> 'Upload dokumen customer dengan format (pdf,jpeg,png,jpg,gif,svg)', 
            'tanggal.required'=> 'Masukan Tanggal Invoice', 
            
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
            $inv=Invoice::where('id',$request->id)->first();
            $image = $request->file('file');
            $size = $image->getSize();
            $imageFileName =$inv['nomor'].'.'. $image->getClientOriginalExtension();
            $filePath =$imageFileName;
            $file = \Storage::disk('public_uploads');
            
            $jumlah= Transaksialat::where('invoice_id',$request->id)->count();
            if($jumlah>0){
            
                if($file->put($filePath, file_get_contents($image))){
                        $bul=explode('-',$request->tanggal);
                        $data= Invoice::where('id',$request->id)->update([
                            'kode_customer'=>$request->kode_customer,
                            'name'=>$request->name,
                            'nilai'=>ubah_uang($request->nilai),
                            'file'=>$filePath,
                            'tanggal'=>$request->tanggal,
                            'sts'=>1,
                        ]);
                        if($data){
                            foreach(transaksialat_get($request->id) as $nx=>$detail){
                                $det=Transaksialat::where('id',$detail['id'])->update([
                                    'sts'=>1,
                                ]);
                            }
                            echo'ok';
                        }
                        
                }else{
                    echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                }
            }else{
                echo'<div style="padding:1%">Error ! <br> Masukan data kendaraan yang akan disewa</div>'; 
            }
        }
    }

    public function update(request $request){
        error_reporting(0);
        
        if($request->file==''){
                
                $rules = [
                    'kode_customer'=> 'required',
                    'name'=> 'required',
                    'nilai'=> 'required',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'kode_customer.required'=> 'Pilih customer', 
                    'name.required'=> 'Masukan Keterangan Invoice', 
                    'nilai.required'=> 'Masukan Nilai Invoice', 
                    'tanggal.required'=> 'Masukan Tanggal Invoice', 
                    
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
                    $bul=explode('-',$request->tanggal);
                    $data= Invoice::where('id',$request->id)->update([
                        'kode_customer'=>$request->kode_customer,
                        'name'=>$request->name,
                        'nilai'=>ubah_uang($request->nilai),
                        'tanggal'=>$request->tanggal,
                        'sts'=>1,
                    ]);
                    if($data){
                        foreach(transaksialat_get($request->id) as $nx=>$detail){
                            $det=Transaksialat::where('id',$detail['id'])->update([
                                'sts'=>1,
                            ]);
                        }
                        echo'ok';
                    }
                    echo'ok';
                }
        }else{
            
                $rules = [
                    'kode_customer'=> 'required',
                    'name'=> 'required',
                    'nilai'=> 'required',
                    'file'=> 'required|mimes:pdf,jpeg,png,jpg,gif,svg',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'kode_customer.required'=> 'Pilih customer', 
                    'name.required'=> 'Masukan Keterangan Invoice', 
                    'nilai.required'=> 'Masukan Nilai Invoice', 
                    'file.required'=> 'Upload aadokumen customer dengan format (pdf,jpeg,png,jpg,gif,svg)', 
                    'tanggal.required'=> 'Masukan Tanggal Invoice', 
                    
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
                    $inv=Invoice::where('id',$request->id)->first();
                    $image = $request->file('file');
                    $size = $image->getSize();
                    $imageFileName =$inv['nomor'].'.'. $image->getClientOriginalExtension();
                    $filePath =$imageFileName;
                    $file = \Storage::disk('public_uploads');
                    
                    $jumlah= Transaksialat::where('invoice_id',$request->id)->count();
                    if($jumlah>0){
                    
                        if($file->put($filePath, file_get_contents($image))){
                            $bul=explode('-',$request->tanggal);
                                $data= Invoice::where('id',$request->id)->update([
                                    'kode_customer'=>$request->kode_customer,
                                    'name'=>$request->name,
                                    'nilai'=>ubah_uang($request->nilai),
                                    'file'=>$filePath,
                                    'tanggal'=>$request->tanggal,
                                    'sts'=>1,
                                ]);
                                if($data){
                                    foreach(transaksialat_get($request->id) as $nx=>$detail){
                                        $det=Transaksialat::where('id',$detail['id'])->update([
                                            'sts'=>1,
                                        ]);
                                    }
                                    echo'ok';
                                }
                                
                        }else{
                            echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                        }
                    }else{
                        echo'<div style="padding:1%">Error ! <br> Masukan data kendaraan yang akan disewa</div>'; 
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

            $inv= Invoice::where('id',$request->id)->first();
            $data= Invoice::where('id',$request->id)->update([
                'sts'=>$request->sts,
                'alasan'=>$request->alasan,
                'tanggal_approval'=>date('Y-m-d'),
            ]);
            if($data){
                foreach(transaksialat_get($inv['id'],$inv['transaksi']) as $nx=>$detail){
                    $det=Transaksialat::where('id',$detail['id'])->update([
                        'sts'=>1,
                    ]);
                }
                echo'ok';
            }
        }
    }

    public function proses_gudang(request $request){
        error_reporting(0);
        
        $rules = [
            'alat_id'=> 'required',
        ];

        $messages = [
            'alat_id.required'=> 'Pilih Kendaraan', 
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
            $ceknya= Transaksialat::where('invoice_id',$request->id)->where('alat_id',$request->alat_id)->count();
            if($ceknya>0){
                echo'<div style="padding:1%">Error !<br> Kendaraan ini sudah terdaftar</div>';
            }else{
                
                    $data= Transaksialat::create([
                        'alat_id'=>$request->alat_id,
                        'invoice_id'=>$request->id,
                        'sts'=>0,
                        'tanggal'=>date('Y-m-d'),
                    ]);

                    echo'ok';
                
            }
        }
    }

    public function proses_angkutan(request $request){
        error_reporting(0);
        
        $rules = [
            'qty'=> 'required',
        ];

        $messages = [
            'qty.required'=> 'Masukan jumlah angkutan', 
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
           
            $data= Transaksialat::where('id',$request->transaksialat_id)->update([
                'qty'=>$request->qty,
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
            $datat=Invoice::where('id',$request->id)->first();
            $image = $request->file('file');
            $size = $image->getSize();
            $imageFileName ='BY'.$datat['invoice'].'.'. $image->getClientOriginalExtension();
            $filePath =$imageFileName;
            $file = \Storage::disk('public_uploads');
            
            
            if($file->put($filePath, file_get_contents($image))){
                $data= Invoice::where('id',$request->id)->update([
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
        $data=Invoice::where('id',$request->id)->where('sts',1)->delete();
    }

    public function hapus_gudang(request $request){
        $data=Transaksialat::where('id',$request->id)->delete();
    }

    public function cetak(request $request){
        $data=Invoice::where('id',base64_decode($request->inv))->first();
        
        $pdf = PDF::loadView('Angkutan.cetak', compact('data'));
        $pdf->setPaper('A4', 'Potrait');
        return $pdf->stream($data['nomor'].'.pdf');
    }
}
