<html>
    <head>
        <title>{{$data->nomor}}</title>
        <style>
            
            
            /* body {
                background-image: url({{public_path('img/logo.png')}}); 
                background-color: #c7b39b;
            } */
            .headernya{
                width:100%;
                height:80px;
                border:solid 1px #fff;
                margin-bottom:2%;
                display:block
            }
            table{
                border-collapse:collapse;
            }
            .labelkwitansi{
                font-size:14px;
                padding:4px;
            }
            .isinya{
                width:100%;
                height:1000px;
                border:solid 1px #fff;
                display:block;
                margin-bottom:1%;
            }
            .kwitansi{
                width:100%;
                height:980px;
                border:solid 1px #fff;
                display:block;
                margin-bottom:1%;
                padding:1%;
            }
            .divlokasi{
                width:100%;
                height:700px;
                border:solid 1px #000;
                display:block;
                margin-bottom:1%;
                padding:1%;
            }
            .isistruk{
                width:100%;
                margin-top:90px;
                min-height:900px;
                border:solid 1px #fff;
            }
            td{
                padding:1px;
                vertical-align:top;
            }
            .tth{
                font-size:14px;
                border-bottom:solid 2px #797981;
                border-top:solid 2px #797981;
                border-left:solid 2px #fff;
                border-right:solid 2px #fff;
            }
            .nomor{
                font-size:14px;
                border-bottom:dotted 2px #797981;
                border-top:solid 2px #fff;
                border-left:solid 2px #fff;
                border-right:solid 2px #fff;
            }
            .nomorkw{
                font-size:14px;
                padding:4px;
                border-bottom:dotted 2px #797981;
                border-top:dotted 2px #dfdfe3;
                border-left:dotted 2px #dfdfe3;
                border-right:dotted 2px #dfdfe3;
                font-style:italic;
            }
            .ttdd{
                font-size:14px;
                border-bottom:solid 2px #797981;
                border-top:solid 2px #fff;
                border-left:solid 2px #fff;
                border-right:solid 2px #fff;
                padding-top:5px;
                
            }
            .tthh{
                font-size:14px;
                border:dotted 2px #000;
            }
            .ttd{
                font-size:13px;
                padding-left:3px;
                border:dotted 2px #fff;
            }
            .thth{
                font-size:13px;
                background:aqua;
                padding-left:3px;
                border:solid 1px #000;
            }
            .tdtd{
                font-size:13px;
                padding-left:3px;
                border:solid 1px #000;
            }
            .ttdp{
                font-size:13px;
                padding-left:3px;
                border:solid 1px #fff;
            }
            .textkanan{
                font-size:17px;
                color:#5e2929;
                text-align:center;
            }
            p{
                margin:0px;
            }
            .ppn{
                font-size:13px;
                padding-left:10px;
            }
            .footer {
                width: 100%;
                text-align: center;
                height:170px;
                border:solid 1px #fff;
            }
        </style>
    </head>
    <body>
        
        
        <div class="isinya">
            
            <table width="100%" border="0">
                <tr>
                    <td><img src="{{public_path('img/logo.png')}}" width="33%" height="70px"></td>
                    <td width="80%" class="textkanan">
                        <p><b>P T&nbsp;&nbsp;&nbsp;J A Y A&nbsp;&nbsp;&nbsp;T A T A R A&nbsp;&nbsp;S E J A H T E R A</b></p>
                        <p style="font-size:14px">Komplek  BBS  III  Blok  A3  No. 2</p>
                        <p style="font-size:14px">Ciwaduk - Cilegon</p>
                        <p style="font-size:14px">Tlp: 0254 389669 Fax: 0254 389669</p>
                    </td>
                </tr>
            </table>
            
            <table width="100%" border="0">
                <tr>
                    <td style="text-align:center;">
                        <font style="font-weight:bold;color:#000;font-size:19px;display:block">I N V O I C E</font>
                    </td>
                </tr>
            </table><br>
            <table width="100%" border="0">
                
                <tr>
                    <td width="30%" style="background:#dfdfe3;padding-top:10px;padding-bottom:10px;padding-left:5px">
                        <b>No-Invoice:</b><br>
                        <p class="ppn">{{$data->invoice}}</p>
                        <p class="ppn">{{tgl_indo($data->tanggal)}}</p>
                        
                    </td>
                    <td width="35%" style="background:#dfdfe3;padding-top:10px;padding-bottom:10px;padding-left:5px">
                        <b>From:</b><br>
                        <p class="ppn">{{name()}}</p>
                        {!!alamat()!!}
                    </td>
                    <td width="35%" style="background:#dfdfe3;padding-top:10px;padding-bottom:10px">
                        <b>To:</b><br>
                        <p class="ppn">{{$data->getcustomer['name']}}</p>
                        <p class="ppn">{{$data->getcustomer['alamat']}}</p>
                        <p class="ppn">Tlp : {{$data->getcustomer['telepon']}}</p>
                    </td>
                </tr>
            </table><br>
            <table width="100%" border="1">
                <tr>
                    <th width="5%" class="tth">No</th>
                    <th  class="tth">Keterangan</th>
                    <th width="10%" class="tth">Qty</th>
                    <th width="20%" class="tth">Jumlah</th>
                </tr>
                <tr>
                    <td class="ttdd">1.</td>
                    <td class="ttdd" style="padding-bottom:30px">{{$data->name}}</td>
                    <td class="ttdd">{{$data->qty}} Kgs</td>
                    <td class="ttdd" align="right">Rp.{{uang($data->nilai)}}</td>
                </tr>
                <tr>
                    <th class="ttdd" colspan="3" align="left">TOTAL</th>
                    <th class="ttdd" align="right">Rp.{{uang($data->nilai)}}</th>
                </tr>
                <tr>
                    <td class="ttdd" colspan="4" align="left">
                        <b>Terbilang :</b>
                        &nbsp;&nbsp;&nbsp; <i>{{terbilang($data->nilai)}} rupiah =======</i>
                    </td>
                </tr>
                
            </table>
            <br>
            <table width="100%" border="1">
                <tr>
                    <td width="100%" colspan="2" class="ttd"><b>Mohon Pembayaran Transfer Ke : </b></td>
                </tr>
                <tr>
                    <td width="15%" class="ttd">Bank</td>
                    <td class="ttd">: {{bank()}}</td>
                </tr>
                <tr>
                    <td class="ttd">Nomor Rekening</td>
                    <td class="ttd">: {{rekening()}}</td>
                </tr>
                <tr>
                    <td class="ttd">Atas Nama</td>
                    <td class="ttd">: {{pemilik_rekening()}}</td>
                </tr>
            </table>   
            
            <table width="100%" border="0">
                <tr>
                    <td width="30%"></td>
                    <td width="40%"></td>
                    <td align="center">
                        <font style="color:#000;font-size:12px;display:block">
                            Hormat Kami<p>{{name()}} <br><br><br><br><br>
                            {{name_direktur()}}<br>
                            <hr style="border: dotted 2px #000">
                            Direktur
                        </font>
                    </td>
                </tr>
                
            </table>
            
        </div>


        <div class="kwitansi">
            
            <div style="width:100%;border:dotted 2px #000;padding:1%">
                <table width="100%" border="0">
                    <tr>
                        <td><img src="{{public_path('img/pt.png')}}" width="10%"></td>
                        <td width="50%" class="textkanan" style="text-align:left;padding-left:10px">
                            <p><b>{{name()}}</b></p>
                            <p style="font-size:13px">Komplek  BBS  III  Blok  A3  No. 2</p>
                            <p style="font-size:13px">Ciwaduk - Cilegon</p>
                            <p style="font-size:13px">Tlp: 0254 389669 Fax: 0254 389669</p>
                        </td>
                        <td width="43%" class="textkanan" >
                            <table width="100%" border="0">
                                <tr>
                                    <td width="12%" style="font-size:14px;"><b>NO:</b></td>
                                
                                    <td class="nomor" style="font-size:14px;">{{$data->invoice}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="100%" border="0">
                    <tr>
                        <td style="text-align:center;padding-top:30px">
                            <font style="font-weight:bold;color:#000;font-size:19px;display:block">K W I T A N S I</font>
                        </td>
                    </tr>
                </table><br>
                <table width="100%" border="0">
                    
                    <tr>
                        <td width="100%" style="background:#dfdfe3;padding-top:10px;padding-bottom:10px;padding-left:10px">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="20%" class="labelkwitansi" >Telah Terima dari </td>
                                    <td class="nomorkw">: {{$data->getcustomer['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="labelkwitansi" >Sebanyak </td>
                                    <td class="nomorkw">: Rp.{{uang($data->nilai)}}</td>
                                </tr>
                                <tr>
                                    <td class="labelkwitansi" >Untuk Pembayaran </td>
                                    <td class="nomorkw">: {{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td class="labelkwitansi" > </td>
                                    <td class="nomorkw">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="labelkwitansi" >Terbilang </td>
                                    <td class="nomorkw">: {{terbilang($data->nilai)}} rupiah</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table><br>
                
                <table width="100%" border="0">
                    <tr>
                        <td width="30%"></td>
                        <td width="40%"></td>
                        <td align="center">
                            <font style="color:#000;font-size:13px;display:block">
                                Cilegon, {{tgl_indo(date('Y-m-d'))}}<p>{{name()}} <br><br><br><br><br>
                                {{name_direktur()}}<br>
                                <hr style="border: dotted 2px #000">
                                Direktur
                            </font>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>

        <div class="divlokasi">
            
            
            <table width="100%" border="0">
                <tr>
                    <td><img src="{{public_path('img/pt.png')}}" width="10%"></td>
                    <td width="50%" class="textkanan" style="text-align:left;padding-left:10px">
                        <p><b>{{name()}}</b></p>
                        <p style="font-size:13px">Komplek  BBS  III  Blok  A3  No. 2</p>
                        <p style="font-size:13px">Ciwaduk - Cilegon</p>
                        <p style="font-size:13px">Tlp: 0254 389669 Fax: 0254 389669</p>
                    </td>
                    <td width="43%" class="textkanan">
                        <table width="100%" border="0">
                            <tr>
                                <td width="20%" ><b>Nomor:</b></td>
                            
                                <td width="80%" class="nomor">{{$data->invoice}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" border="0">
                <tr>
                    <td style="text-align:center;padding-top:30px">
                        <font style="font-weight:bold;color:#000;font-size:19px;display:block">ANGKUTAN DISEWAKAN</font>
                    </td>
                </tr>
            </table><br>
            <table width="100%" border="0">
                
                <tr>
                    <td width="100%" style="background:#fff;padding-top:10px;padding-bottom:10px;padding-left:10px">
                        <table width="100%" border="0">
                            <thead>
                                <tr>
                                    <th class="thth" width="5%">No</th>
                                    <th class="thth" width="15%">Plat Nomor</th>
                                    <th class="thth">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $jum=0;?>
                                @foreach(transaksialat_get($data->id) as $nx=>$detail)
                                <?php $jum+=$detail['qty']; ?>
                                    
                                    <tr>
                                        <td class="tdtd">{{($nx+1)}}</td>
                                        <td class="tdtd">{{$detail->alat['nopol']}}</td>
                                        <td class="tdtd">{{$detail->alat['name']}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="tdtd">&nbsp;</td>
                                    <td class="tdtd"></td>
                                    <td class="tdtd"></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table><br>
            
            <table width="100%" border="0">
                <tr>
                    <td width="30%"></td>
                    <td width="40%"></td>
                    <td align="center">
                        <font style="color:#000;font-size:13px;display:block">
                            Cilegon, {{tgl_indo(date('Y-m-d'))}}<p>{{name()}} <br><br><br><br><br>
                            {{name_direktur()}}<br>
                            <hr style="border: dotted 2px #000">
                            Direktur
                        </font>
                    </td>
                </tr>
                
            </table>
            
        </div>
        
    </body>
</html>