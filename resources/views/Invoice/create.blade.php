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
                                                <select name="transaksi" onchange="pilih_transaksi(this.value)" placeholder="ketik disini..."  class="form-control">
                                                    <option value="">-- Pilih Transaksi -----</option>
                                                    <option value="1" @if($transaksi==1) selected @endif>Masuk Gudang</option>
                                                    <option value="2" @if($transaksi==2) selected @endif>Keluar Gudang</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-lg-9 col-xl-4">
                                                <select name="kode_customer" placeholder="ketik disini..."  class="form-control">
                                                    <option value="">-- Pilih customer -----</option>
                                                    @foreach(customer_get() as $ven)
                                                        <option value="{{$ven->kode_customer}}">{{$ven->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Keterangan Invoice</span></label>
                                            <div class="col-lg-9 col-xl-9">
                                                <textarea name="name" placeholder="ketik disini..."  class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Qty (/Ton) & Nilai Invoice</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                <input type="text" placeholder="ketik disini..." name="qty" onkeyup="proses_ton(this.value)" class="form-control" onkeypress="return hanyaAngka(event)"/>
                                            </div>
                                            <div class="col-lg-9 col-xl-5">
                                                <input type="text" id="inputmask" data-inputmask="'alias': 'currency'" name="nilai" placeholder="ketik disini..."  class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Dokumen Customer</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                <input type="file"  name="file" placeholder="ketik disini..."  class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Tanggal Invoice</span></label>
                                            <div class="col-lg-9 col-xl-3">
                                                <input type="text"  name="tanggal" id="tanggal" placeholder="ketik disini..."  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input type="submit"> -->

                                </div>
                                <div class="tab-pane fade" id="default-tab-2">
                                    <div class="col-xl-10 offset-xl-1">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Lokasi Gudang</legend>
                                        <div class="col-12" >
                                            <span class="btn btn-blue btn-xs" onclick="tambah_data()">Tambah Gudang</span>
                                            <div class="table-responsive">
                                                <div id="tampil-lokasi"></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
                                    <a href="javascript:;" class="btn btn-danger" onclick="simpan_data()">Simpan</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div id="notifikasi-gudang" class="noot"></div>
                                    <form id="data-gudang" action="{{url('/Invoice/proses_gudang')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="ton" id="tonase">
                                        <div class="form-group">
                                            <label>Pilih Gudang</label>
                                            <select name="gudang_id" placeholder="ketik disini..."  class="form-control">
                                                <option value="">-- Pilih Gudang -----</option>
                                                @foreach(gudang_get() as $ven)
                                                    <option value="{{$ven->id}}">[{{$ven->kode}}] {{$ven->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" placeholder="ketik disini..." name="qty" class="form-control" onkeypress="return hanyaAngka(event)"/>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Tutup</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_gudang({{$data->id}},{{$transaksi}})">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-notif" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div id="notifikasi" class="noot"></div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Tutup</a>
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
                url: "{{url('Invoice/lokasi_gudang')}}",
                data: "id={{$data->id}}&transaksi={{$transaksi}}",
                success: function(msg){
                    $('#tampil-lokasi').html(msg);
                    
                }
            }); 
        });

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });

        function tambah_data(){
            $('#modal-tambah').modal('show');
        }

        function proses_ton(a){
            $('#tonase').val(a);
        }

        function pilih_transaksi(a){
            if(a==1){
                location.assign("{{url('Invoice/Create?invoice='.$data->invoice)}}&transaksi="+a);
            }else{
                location.assign("{{url('Invoice/Create?invoice='.$data->invoice)}}&transaksi="+a);
            }
        }

        function hapus_gudang(a){
			
			$.ajax({
				type: 'GET',
				url: "{{url('Invoice/hapus_gudang')}}",
				data: "id="+a,
				success: function(msg){
					$.ajax({
                        type: 'GET',
                        url: "{{url('Invoice/lokasi_gudang')}}",
                        data: "id={{$data->id}}&transaksi={{$transaksi}}",
                        success: function(msg){
                            $('#tampil-lokasi').html(msg);
                            
                        }
                    }); 
				}
			}); 
		}

        

        function simpan_data(){
			
            var form=document.getElementById('data-tambah');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Invoice?id='.$data->id)}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
							location.assign("{{url('Invoice')}}");
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
                            $('#modal-notif').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        } 

        function simpan_gudang(id,transaksi){
			
            var form=document.getElementById('data-gudang');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Invoice/proses_gudang')}}?id="+id+"&transaksi="+transaksi,
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
                            $('#modal-tambah').modal('hide');
                            document.getElementById("loadnya").style.width = "0px";
							document.getElementById("notifikasi-gudang").style.width = "0px";
                            $('#notifikasi-gudang').html('');
							$.ajax({
                                type: 'GET',
                                url: "{{url('Invoice/lokasi_gudang')}}",
                                data: "id={{$data->id}}&transaksi={{$transaksi}}",
                                success: function(msg){
                                    $('#tampil-lokasi').html(msg);
                                    
                                }
                            }); 
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
							document.getElementById("notifikasi-gudang").style.width = "100%";
							$('#notifikasi-gudang').html(msg);
                        }
                        
                        
                    }
                });

        } 
    </script>
   
@endpush