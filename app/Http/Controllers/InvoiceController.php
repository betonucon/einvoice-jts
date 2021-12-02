<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Invoice;
use App\Transaksigudang;
use PDF;
class InvoiceController extends Controller
{
    public function index(){
        if(Auth::user()->role_id==2 || Auth::user()->role_id==3){
            $menu='Invoice';
            $page="invoice";
            return view("Invoice.index",compact('menu','page'));
        }else{
            return view("error");
        }
    }
    
    public function buat(request $request){
        $menu='Buat Invoice';
        $page="invoice";
        if($request->transaksi==''){
            $transaksi=1;
        }else{
            $transaksi=$request->transaksi;
        }
        $data=Invoice::where('invoice',$request->invoice)->first();
        return view("Invoice.create",compact('menu','page','data','transaksi'));
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
            $page="invoice";
            return view("Invoice.edit",compact('menu','page','data','transaksi'));
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
            $page="invoice";
            return view("Invoice.view",compact('menu','page','data','transaksi'));
        
    }

    public function index_acc(){
        if(Auth::user()->role_id==4){
            $menu='Persetujuan Invoice';
            $page="invoice";
            return view("Invoice.index_acc",compact('menu','page'));
        }else{
            return view("error");
        }
    }

    public function index_bayar(){
        if(Auth::user()->role_id==5){
            $menu='Pembayaran Invoice';
            $page="invoice";
            return view("Invoice.index_bayar",compact('menu','page'));
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
                        <th>Gudang</th>
                        <th>Detail</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>';
                    $jum=0;
                    foreach(transaksigudang_get($request->id,$request->transaksi) as $nx=>$detail){
                        $jum+=$detail['qty'];
                        echo'
                        <tr>
                            <td><span class="btn btn-red btn-xs" onclick="hapus_gudang('.$detail['id'].')"><i class="fas fa-trash-alt"></i></span></td>
                            <td>'.$detail->gudang['kode'].'</td>
                            <td>'.$detail->gudang['name'].'</td>
                            <td>'.$detail['qty'].' Ton</td>
                        </tr>';
                    }
                    echo'
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>'.$jum.' Ton</td>
                    </tr>
                </tbody>
            </table>

        ';
    }

    public function lokasi_gudang_view(request $request){
        echo'
            <table class="table table-striped m-b-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Gudang</th>
                        <th>Detail</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>';
                    $jum=0;
                    foreach(transaksigudang_get($request->id,$request->transaksi) as $nx=>$detail){
                        $jum+=$detail['qty'];
                        echo'
                        <tr>
                            <td>'.($nx+1).'</td>
                            <td>'.$detail->gudang['kode'].'</td>
                            <td>'.$detail->gudang['name'].'</td>
                            <td>'.$detail['qty'].' Ton</td>
                        </tr>';
                    }
                    echo'
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>'.$jum.' Ton</td>
                    </tr>
                </tbody>
            </table>

        ';
    }

    
    
    public function create_sewa(request $request){
        $bul=explode('-',date('Y-m-d'));
        $count=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('kategori',2)->count();
        
        if($count>0){
            $cek=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('kategori',2)->orderBy('id','Desc')->firstOrfail();
            $urutan = substr($cek['invoice'],0,3);
            
            $urutan++;
            $invoice=sprintf("%03s", $urutan).'/JTS/TR-IPP/INV/'.romawi($bul[1]).'/'.$bul[0];
            $nomor=sprintf("%03s", $urutan).'JTSTR-IPPINV'.romawi($bul[1]).$bul[0];
        }else{
            $invoice=sprintf("%03s", 1).'/JTS/TR-IPP/INV/'.romawi($bul[1]).'/'.$bul[0];
            $nomor=sprintf("%03s", 1).'JTSTR-IPPINV'.romawi($bul[1]).$bul[0];
            
        }
        $cek=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('sts',0)->where('kategori',2)->count();
        if($cek>0){
            $inv=Invoice::where('bulan',$bul[1])->where('tahun',$bul[0])->where('sts',0)->where('kategori',2)->first();
            echo $inv['invoice'];
        }else{
            $data= Invoice::create([
                'invoice'=>$invoice,
                'nomor'=>$nomor,
                'role_id'=>Auth::user()['role_id'],
                'create'=>date('Y-m-d H:i:s'),
                'sts'=>0,
                'bulan'=>$bul[1],
                'tahun'=>$bul[0],
                'kategori'=>2,
            ]);
            echo $invoice;
        }
    }

    public function save(request $request){
        error_reporting(0);
        
        $rules = [
            'kode_customer'=> 'required',
            'name'=> 'required',
            'qty'=> 'required',
            'nilai'=> 'required',
            'transaksi'=> 'required',
            'file'=> 'required|mimes:pdf,jpeg,png,jpg,gif,svg',
            'tanggal'=> 'required',
        ];

        $messages = [
            'invoice.required'=> 'Masukan Nomor Invoice Invoice', 
            'kode_customer.required'=> 'Pilih customer', 
            'name.required'=> 'Masukan Keterangan Invoice', 
            'qty.required'=> 'Masukan Jumlah Barang', 
            'transaksi.required'=> 'Pilih Transaksi', 
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
            
            $jumlah= Transaksigudang::where('transaksi',$request->transaksi)->where('invoice_id',$request->id)->sum('qty');
            if($jumlah==$request->qty){
            
                if($file->put($filePath, file_get_contents($image))){
                        
                        $data= Invoice::where('id',$request->id)->update([
                            'kode_customer'=>$request->kode_customer,
                            'qty'=>$request->qty,
                            'transaksi'=>$request->transaksi,
                            'name'=>$request->name,
                            'nilai'=>ubah_uang($request->nilai),
                            'file'=>$filePath,
                            'tanggal'=>$request->tanggal,
                            'sts'=>1,
                        ]);
                        if($data){
                            foreach(transaksigudang_get($request->id,$request->transaksi) as $nx=>$detail){
                                $det=Transaksigudang::where('id',$detail['id'])->update([
                                    'sts'=>1,
                                ]);
                            }
                            echo'ok';
                        }
                        
                }else{
                    echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                }
            }else{
                echo'<div style="padding:1%">Error ! <br> Isi detail invoice dan sesuaikan dengan jumlah banyak barang</div>'; 
            }
        }
    }

    public function update(request $request){
        error_reporting(0);
        
        if($request->file==''){
                
                $rules = [
                    'kode_customer'=> 'required',
                    'name'=> 'required',
                    'qty'=> 'required',
                    'nilai'=> 'required',
                    'transaksi'=> 'required',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'invoice.required'=> 'Masukan Nomor Invoice Invoice', 
                    'kode_customer.required'=> 'Pilih customer', 
                    'name.required'=> 'Masukan Keterangan Invoice', 
                    'qty.required'=> 'Masukan Jumlah Barang', 
                    'transaksi.required'=> 'Pilih Transaksi', 
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
                    $data= Invoice::where('id',$request->id)->update([
                        'kode_customer'=>$request->kode_customer,
                        'qty'=>$request->qty,
                        'transaksi'=>$request->transaksi,
                        'name'=>$request->name,
                        'nilai'=>ubah_uang($request->nilai),
                        'tanggal'=>$request->tanggal,
                        'sts'=>1,
                    ]);
                    if($data){
                        foreach(transaksigudang_get($request->id,$request->transaksi) as $nx=>$detail){
                            $det=Transaksigudang::where('id',$detail['id'])->update([
                                'sts'=>1,
                            ]);
                        }
                        echo'ok';
                    }
                }
        }else{
            
                $rules = [
                    'kode_customer'=> 'required',
                    'name'=> 'required',
                    'qty'=> 'required',
                    'nilai'=> 'required',
                    'transaksi'=> 'required',
                    'file'=> 'required|mimes:pdf,jpeg,png,jpg,gif,svg',
                    'tanggal'=> 'required',
                ];

                $messages = [
                    'invoice.required'=> 'Masukan Nomor Invoice Invoice', 
                    'kode_customer.required'=> 'Pilih customer', 
                    'name.required'=> 'Masukan Keterangan Invoice', 
                    'qty.required'=> 'Masukan Jumlah Barang', 
                    'transaksi.required'=> 'Pilih Transaksi', 
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
                    
                    $jumlah= Transaksigudang::where('transaksi',$request->transaksi)->where('invoice_id',$request->id)->sum('qty');
                    if($jumlah==$request->qty){
                    
                        if($file->put($filePath, file_get_contents($image))){
                                
                                $data= Invoice::where('id',$request->id)->update([
                                    'kode_customer'=>$request->kode_customer,
                                    'qty'=>$request->qty,
                                    'transaksi'=>$request->transaksi,
                                    'name'=>$request->name,
                                    'nilai'=>ubah_uang($request->nilai),
                                    'file'=>$filePath,
                                    'tanggal'=>$request->tanggal,
                                    'sts'=>1,
                                ]);
                                if($data){
                                    foreach(transaksigudang_get($request->id,$request->transaksi) as $nx=>$detail){
                                        $det=Transaksigudang::where('id',$detail['id'])->update([
                                            'sts'=>1,
                                        ]);
                                    }
                                    echo'ok';
                                }
                                
                        }else{
                            echo'<div style="padding:1%">Error ! <br> Gagal Upload</div>';
                        }
                    }else{
                        echo'<div style="padding:1%">Error ! <br> Isi detail invoice dan sesuaikan dengan jumlah banyak barang</div>'; 
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
                foreach(transaksigudang_get($inv['id'],$inv['transaksi']) as $nx=>$detail){
                    $det=Transaksigudang::where('id',$detail['id'])->update([
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
            'ton'=> 'required',
            'gudang_id'=> 'required',
            'qty'=> 'required',
        ];

        $messages = [
            'ton.required'=> 'Masukan jumlah tonase yang diajukan', 
            'gudang_id.required'=> 'Pilih Gudang', 
            'qty.required'=> 'Jumlah Qty', 
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
            $ceknya= Transaksigudang::where('gudang_id',$request->gudang_id)->where('transaksi',$request->transaksi)->where('invoice_id',$request->id)->count();
            if($ceknya>0){
                echo'<div style="padding:1%">Error !<br> Gudang ini sudah terdaftar</div>';
            }else{
                $ton= Transaksigudang::where('gudang_id',$request->gudang_id)->where('transaksi',$request->transaksi)->where('invoice_id',$request->id)->sum('qty');
                $tonmasuk=($ton+$request->qty);
                if($tonmasuk>$request->ton){
                    echo'<div style="padding:1%">Error !<br> Jumlah tonase melebihi pengajuan</div>';
                }else{
                    $data= Transaksigudang::create([
                        'gudang_id'=>$request->gudang_id,
                        'transaksi'=>$request->transaksi,
                        'qty'=>$request->qty,
                        'invoice_id'=>$request->id,
                        'sts'=>0,
                        'tanggal'=>date('Y-m-d'),
                    ]);

                    echo'ok';
                }
            }
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
        $data=Transaksigudang::where('id',$request->id)->delete();
    }

    public function cetak(request $request){
        $data=Invoice::where('id',base64_decode($request->inv))->first();
        
        $pdf = PDF::loadView('Invoice.cetak', compact('data'));
        $pdf->setPaper('A4', 'Potrait');
        return $pdf->stream($data['nomor'].'.pdf');
    }
}
