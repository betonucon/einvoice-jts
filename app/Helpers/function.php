<?php

function barcoderider($id,$w,$h){
   $d = new Milon\Barcode\DNS2D();
   $d->setStorPath(__DIR__.'/cache/');
   return $d->getBarcodeHTML($id, 'QRCODE',$w,$h);
}

function name(){
    return 'PT JAYA TATARA SEJAHTERA';
}

function name_direktur(){
    return 'KHONY SUMINAR';
}

function pemilik_rekening(){
    return 'PT JAYA TATARA SEJAHTERA';
}

function bank(){
    return 'CIMB NIAGA';
}

function rekening(){
    return '3290100092006';
}

function alamat(){
    return '<p class="ppn">Komplek BBS III Blok A3 No. 2</p><p class="ppn">Ciwaduk - Cilegon</p><p class="ppn">Tlp: 0254 389669 Fax: 0254 389669</p>';
}
function alamat_utama(){
    return 'Komplek BBS III Blok A3 No. 2</br>Ciwaduk - Cilegon</br>Tlp: 0254 389669 Fax: 0254 389669</br>';
}

function domain(){
    return 'jayatatarasejahtera.com';
}

function email(){
    return 'sales@jayatatarasejahtera.com';
}

function parsing_validator($url){
   $content=utf8_encode($url);
   $data = json_decode($content,true);

   return $data;
}

function bulan($bulan)
{
   Switch ($bulan){
      case '01' : $bulan="Januari";
         Break;
      case '02' : $bulan="Februari";
         Break;
      case '03' : $bulan="Maret";
         Break;
      case '04' : $bulan="April";
         Break;
      case '05' : $bulan="Mei";
         Break;
      case '06' : $bulan="Juni";
         Break;
      case '07' : $bulan="Juli";
         Break;
      case '08' : $bulan="Agustus";
         Break;
      case '09' : $bulan="September";
         Break;
      case 10 : $bulan="Oktober";
         Break;
      case 11 : $bulan="November";
         Break;
      case 12 : $bulan="Desember";
         Break;
      }
   return $bulan;
}
function warna($bulan)
{
   Switch ($bulan){
      case '0' : $bulan="Yellow";
         Break;
      case 1 : $bulan="#F0F8FF";
         Break;
      case 2 : $bulan="#FAEBD7";
         Break;
      case 3 : $bulan="#00FFFF";
         Break;
      case 4 : $bulan="#7FFFD4";
         Break;
      case 5 : $bulan="#F0FFFF";
         Break;
      case 6 : $bulan="#8A2BE2";
         Break;
      case 7 : $bulan="#A52A2A";
         Break;
      case 8 : $bulan="#DEB887";
         Break;
      case 9 : $bulan="#5F9EA0";
         Break;
      case 10 : $bulan="#7FFF00";
         Break;
      case 11 : $bulan="#D2691E";
         Break;
      case 12 : $bulan="#FF7F50";
         Break;
      }
   return $bulan;
}

function hari_ini($tgl){
    $hari=date('D',strtotime($tgl));
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}

function selisih_jam($tgl1,$tgl2){
    $waktu_awal        =strtotime($tgl1);
    $waktu_akhir    =strtotime($tgl2); 
    $diff    =$waktu_akhir - $waktu_awal;
    $jam    =floor($diff / (60 * 60));
    $menit    =$diff - $jam * (60 * 60);
    $selisih=$jam.'.'.$menit;
    return $selisih;
}

function tgl_indo($id){
   error_reporting(0);
    $exp=explode('-',$id);
    $data=$exp[2].' '.bulan($exp[1]).' '.$exp[0];
    return $data;
}

function ubah_bulan($id){
    if($id>9){
       $data=$id;
    }else{
       $data='0'.$id;
    }
    return $data;
 }

function ubah_uang($uang){
   $xpl=explode('.',$uang);
   $patr='/([^0-9]+)/';
   $data=preg_replace($patr,'',$xpl[0]);
   return $data.'.'.$xpl[1];
}

function ubah_jam($id){
    return date('H:i',strtotime($id));
}

function customer_get(){
   $data=App\Customer::orderBy('name','Asc')->get();
   return $data;
}

function uang($id){
   $data=number_format($id,2);
   return $data;
}

function vendor_get(){
   $data=App\Vendor::where('kode_vendor','!=','VN0001')->orderBy('name','Asc')->get();
   return $data;
}

function alat_get(){
   $data=App\Alat::orderBy('name','Asc')->get();
   return $data;
}

function gudang_get(){
   $data=App\Gudang::orderBy('kode','Asc')->get();
   return $data;
}

function tagihan_truk($id){
   $data=App\Tagihan::where('alat_id',$id)->count();
   if($data>0){
      $tagihan=App\Tagihan::where('alat_id',$id)->sum('nilai');
      $nilai=$tagihan;
   }else{
      $nilai=0;
   }

   return $nilai;
}

function dasbor_tagihan($bulan,$tahun){
   $cek=App\Tagihan::whereYear('tanggal_approval',$tahun)->count();
   if($cek>0){
      $data=App\Tagihan::whereYear('tanggal_approval',$tahun)->whereMonth('tanggal_approval',$bulan)->sum('nilai');
      $nilai=$data;
   }else{
      $nilai=20;
   }
      
   
   return $nilai;
}

function dasbor_invoice($bulan,$tahun){
   $cek=App\Invoice::whereYear('tanggal_approval',$tahun)->count();
   if($cek>0){
      $data=App\Invoice::whereYear('tanggal_approval',$tahun)->whereMonth('tanggal_approval',$bulan)->sum('nilai');
      $nilai=$data;
   }else{
      $nilai=20;
   }
      
   
   return $nilai;
}

function transaksi_truk($id){
   $data=App\Transaksialat::where('alat_id',$id)->count();
   if($data>0){
      $total=App\Transaksialat::sum('qty');
      $alat=App\Transaksialat::where('alat_id',$id)->sum('qty');
      $prsen=($total/100);
      $nilai=round($alat/$prsen);
   }else{
      $nilai=0;
   }
   return $nilai;
}

function tagihan_get(){
   if(Auth::user()['role_id']==4){
      $data=App\Tagihan::orderBy('id','Asc')->get();
   }else{
      $data=App\Tagihan::where('role_id',Auth::user()['role_id'])->orderBy('id','Asc')->get();
   }
   
   return $data;
}

function stok_gudang($id){
   $masuk=App\Transaksigudang::where('gudang_id',$id)->where('transaksi',1)->sum('qty');
   $keluar=App\Transaksigudang::where('gudang_id',$id)->where('transaksi',2)->sum('qty');

   $data=($masuk-$keluar);
   return $data;
}

function terupdate_gudang($id){
   $cek=App\Transaksigudang::where('gudang_id',$id)->count();
   if($cek>0){
      $data=App\Transaksigudang::where('gudang_id',$id)->orderBy('id','Desc')->firstOrfail();
      $tgl=$data['tanggal'];
   }else{
      $tgl="0000-00-00";
   }
   
   return $tgl;
}

function transaksigudang_get($id,$transaksi){
   $data=App\Transaksigudang::where('invoice_id',$id)->where('transaksi',$transaksi)->orderBy('id','Asc')->get();
   return $data;
}

function transaksialat_get($id){
   $data=App\Transaksialat::where('invoice_id',$id)->orderBy('id','Asc')->get();
   return $data;
}

function romawi($bln){
   switch ($bln){
       case '01': 
           return "I";
           break;
       case '02':
           return "II";
           break;
       case '03':
           return "III";
           break;
       case '04':
           return "IV";
           break;
       case '05':
           return "V";
           break;
       case '06':
           return "VI";
           break;
       case '07':
           return "VII";
           break;
       case '08':
           return "VIII";
           break;
       case '09':
           return "IX";
           break;
       case '10':
           return "X";
           break;
       case '11':
           return "XI";
           break;
       case '12':
           return "XII";
           break;
   }
}

function penyebut($nilai) {
   $nilai = abs($nilai);
   $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
   $temp = "";
   if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
   } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " belas";
   } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
   } else if ($nilai < 200) {
      $temp = " seratus" . penyebut($nilai - 100);
   } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
   } else if ($nilai < 2000) {
      $temp = " seribu" . penyebut($nilai - 1000);
   } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
   } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
   } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
   } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
   }     
   return $temp;
}

function terbilang($nilai) {
   if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
   } else {
      $hasil = trim(penyebut($nilai));
   }     		
   return $hasil;
}

function tagihan_bayar_get(){
   $data=App\Tagihan::where('sts','>',1)->orderBy('id','Asc')->get();
   return $data;
}

function invoice_get(){
   $data=App\Invoice::where('sts','>',0)->where('kategori',2)->orderBy('id','Asc')->get();
   return $data;
}

function invoice_angkutan_get(){
   $data=App\Invoice::where('sts','>',0)->where('kategori',1)->orderBy('id','Asc')->get();
   return $data;
}

function invoice_notif(){
   $data=App\Invoice::where('sts',1)->where('kategori',2)->count();
   return $data;
}

function invoice_bayar_notif(){
   $data=App\Invoice::where('sts',2)->where('kategori',2)->count();
   return $data;
}

function tagihan_bayar_notif(){
   $data=App\Tagihan::where('sts',2)->count();
   return $data;
}
function tagihan_notif(){
   $data=App\Tagihan::where('sts',1)->count();
   return $data;
}

function invoice_angkutan_notif(){
   $data=App\Invoice::where('sts',1)->where('kategori',1)->count();
   return $data;
}

function invoice_bayarangkutan_notif(){
   $data=App\Invoice::where('sts',2)->where('kategori',1)->count();
   return $data;
}

function all_notif(){
   $data=(invoice_notif()+tagihan_notif()+invoice_angkutan_notif());
   return $data;
}

function all_bayar_notif(){
   $data=(invoice_bayar_notif()+tagihan_bayar_notif()+invoice_bayarangkutan_notif());
   return $data;
}

function invoice_bayar_get(){
   $data=App\Invoice::where('sts','>',1)->where('kategori',2)->orderBy('id','Asc')->get();
   return $data;
}

function invoice_angkutan_bayar_get(){
   $data=App\Invoice::where('sts','>',1)->where('kategori',1)->orderBy('id','Asc')->get();
   return $data;
}


?>