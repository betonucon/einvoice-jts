@extends('layouts.web')

@push('style')
    <style>
        #style-3::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px #fff;
            background-color: #fff;
        }

        #style-3::-webkit-scrollbar
        {
            width: 3px;
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar-thumb
        {
            background-color: #fff;
        }

    </style>
@endpush
@section('conten')   
        
        <div id="content" class="content content-full-width">
			<h2 class="page-header">{{$menu}} <small>{{name()}}</small></h2>
            
            <div class="col-xl-12 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="ui-general-1">
						<!-- begin panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">List Data</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
						<!-- end panel-heading -->
						<!-- begin panel-body -->
                    <div class="panel-body" style="background: #b5b5d330;">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">INVOICE</span>
                                    <span class="d-sm-block d-none">INVOICE</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">DETAIL INVOICE</span>
                                    <span class="d-sm-block d-none">DETAIL INVOICE</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">DOKUMEN CUSTOMER</span>
                                    <span class="d-sm-block d-none">DOKUMEN CUSTOMER</span>
                                </a>
                            </li>
                            @if($data->sts==3)
                            <li class="nav-item">
                                <a href="#default-tab-4" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">DOKUMEN PEMBAYARAN</span>
                                    <span class="d-sm-block d-none">DOKUMEN PEMBAYARAN</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                        <form id="data-tambah" action="{{url('/Invoice')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" style="margin-bottom:0px;padding:1%;background:#fff">
                                <div class="tab-pane fade active show" id="default-tab-1">
                                    <div class="col-xl-10 offset-xl-1">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Pengajuan Invoice</legend>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Invoice</span></label>
                                            <div class="col-lg-9 col-xl-5">
                                                <input type="text" disabled  name="invoice" value="{{$data->invoice}}" placeholder="ketik disini..."  class="form-control">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Transaksi & Customer</span></label>
                                            <div class="col-lg-9 col-xl-5">
                                                <select name="transaksi"  disabled   onchange="pilih_transaksi(this.value)" placeholder="ketik disini..."  class="form-control">
                                                    <option value="">-- Pilih Transaksi -----</option>
                                                    <option value="1" @if($transaksi==1) selected @endif>Masuk Gudang</option>
                                                    <option value="2" @if($transaksi==2) selected @endif>Keluar Gudang</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-lg-9 col-xl-4">
                                                <select name="kode_customer" disabled   placeholder="ketik disini..."  class="form-control">
                                                    <option value="">-- Pilih customer -----</option>
                                                    @foreach(customer_get() as $ven)
                                                        <option value="{{$ven->kode_customer}}" @if($data->kode_customer==$ven->kode_customer) selected @endif>{{$ven->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Keterangan Invoice</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea name="name"  disabled  placeholder="ketik disini..."  class="form-control" rows="4">{{$data->name}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Qty (/Ton) & Nilai Invoice</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                <input type="text"  disabled  placeholder="ketik disini..." name="qty" value="{{$data->qty}}" class="form-control" onkeypress="return hanyaAngka(event)"/>
                                            </div>
                                            <div class="col-lg-9 col-xl-5">
                                                <input type="text"  disabled  id="inputmask" data-inputmask="'alias': 'currency'" name="nilai" value="{{$data->nilai}}" placeholder="ketik disini..."  class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Tanggal Invoice</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                <input type="text"  disabled   name="tanggal" id="tanggal" value="{{$data->tanggal}}" placeholder="ketik disini..."  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input type="submit"> -->

                                </div>
                                <div class="tab-pane fade" id="default-tab-2">
                                    <div class="col-xl-10 offset-xl-1">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Lokasi Gudang</legend>
                                        <div class="col-12" >
                                           
                                            <div class="table-responsive">
                                                <div id="tampil-lokasi"></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane fade" id="default-tab-3">
                                    <div class="col-xl-10 offset-xl-1">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Dokumen Customer</legend>
                                        <div class="col-12" >
                                           
                                            <div class="table-responsive">
                                                <div id="tampil-dokumen"></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="tab-pane fade" id="default-tab-4">
                                    <div class="col-xl-10 offset-xl-1">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Dokumen Pembayaran</legend>
                                        <div class="col-12" >
                                           
                                            <div class="table-responsive">
                                                <div id="tampil-pembayaran"></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
                                    @if(Auth::user()->role_id==4)
                                        @if($data->sts==1)
                                            <a href="javascript:;" class="btn btn-blue" onclick="approve()">Approval</a>
                                        @endif
                                    @endif
                                    @if(Auth::user()->role_id==5)
                                        @if($data->sts==2)
                                            <a href="javascript:;" class="btn btn-blue" onclick="approve_bayar()">Proses Tagihan</a>
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-approval" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-success fade show m-b-0">
                                        <span class="close" data-dismiss="alert">×</span>
                                        <strong>Notifikasi!</strong>
                                        Jika proses disetujui maka sistem akan menginformasikan data kepada keuangan
                                        <div id="notifikasi-approval" class="noot"></div>
                                    </div>
                                    
                                    <form id="data-approval" action="{{url('/Invoice/Approval')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="sts"  onchange="cek_status(this.value)">
                                                <option value="">Pilih Status</option>
                                                <option value="2">Setujui</option>
                                                <option value="1">Kembalikan</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="alasan">
                                            <label for="exampleInputEmail1">Alasan <i>(Opsional)</i></label>
                                            <textarea class="form-control" name="alasan"></textarea>
                                        </div>
                                    </form>   
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Tutup</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="approval()">Proses</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-tagihan" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-success fade show m-b-0">
                                        <span class="close" data-dismiss="alert">×</span>
                                        <strong>Notifikasi!</strong>
                                        Jika proses disetujui maka sistem akan menginformasikan bahwa pembayaran telah dilakukan
                                        <div id="notifikasi-approvalbayar" class="noot"></div>
                                    </div>
                                    
                                    <form id="data-approvalbayar" action="{{url('/Tagihan/Approvalbayar')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Dokumen Pembayaran</label>
                                            <input type="file" class="form-control" name="file" >
                                            <small class="f-s-12 text-grey-darker">Upload dokumen pembayaran dengan format (pdf,jpeg,png,jpg,gif,svg)</small>
                                        </div>
                                        
                                    </form>   
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Tutup</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="approvalbayar()">Proses</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection
@push('ajax')
    <script type='text/javascript' src="{{url('js/mask.js')}}"></script>
    <script  type="text/javascript" >
        $(document).ready(function() {
            $("#inputmask").inputmask();
            $("#inputmask2").inputmask();

            $.ajax({
                type: 'GET',
                url: "{{url('Invoice/lokasi_gudang_view')}}",
                data: "id={{$data->id}}&transaksi={{$transaksi}}",
                success: function(msg){
                    $('#tampil-lokasi').html(msg);
                    
                }
            }); 

            var file="<iframe src='{{url('dokumen/'.$data->file)}}' height='550' width='100%'></iframe>";
            $('#tampil-dokumen').html(file);

            var filebayar="<iframe src='{{url('dokumen/'.$data->file_bayar)}}' height='550' width='100%'></iframe>";
            $('#tampil-pembayaran').html(filebayar);
        });

        $('#alasan').hide();
		
		function cek_status(a){
			if(a=='1'){
				$('#alasan').show();
			}else if(a=='2'){
				$('#alasan').hide();
			}else{
				$('#alasan').hide();
			}
		}

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });

        function approve(){
			
            $('#modal-approval').modal('show');
		}

        function approve_bayar(){
			
            $('#modal-tagihan').modal('show');
		}

        function approval(){
			
            var form=document.getElementById('data-approval');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Invoice/Approval')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
							location.assign("{{url('InvoiceAcc')}}");
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
							document.getElementById("notifikasi-approval").style.width = "100%";
							$('#notifikasi-approval').html(msg);
                        }
                        
                        
                    }
                });

        } 

        function approvalbayar(){
			
            var form=document.getElementById('data-approvalbayar');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Invoice/Approvalbayar')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
							location.assign("{{url('InvoiceBayar')}}");
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
							document.getElementById("notifikasi-approvalbayar").style.width = "100%";
							$('#notifikasi-approvalbayar').html(msg);
                        }
                        
                        
                    }
                });

        } 
    </script>
   
@endpush