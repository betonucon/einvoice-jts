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
                                    <span class="d-sm-none">TAGIHAN</span>
                                    <span class="d-sm-block d-none">TAGIHAN</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">Tab 2</span>
                                    <span class="d-sm-block d-none">TUJUAN</span>
                                </a>
                            </li> -->
                            
                        </ul>
                        <form id="data-tambah" action="{{url('/Tagihan/ubah')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" style="margin-bottom:0px;padding:1%;background:#fff">
                                <div class="tab-pane fade active show" id="default-tab-1">
                                    <div class="col-xl-10 offset-xl-1">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Pengajuan Invoice</legend>
                                        <input type="hidden" name="tagihan" value="{{$data->tagihan}}">
                                        @if($data->tagihan==1)
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Invoice Tagihan & Plat Nomor</span></label>
                                                    <div class="col-lg-9 col-xl-5">
                                                        <input type="text"  name="invoice" placeholder="ketik disini..." value="{{$data->invoice}}" class="form-control">
                                                    </div>
                                                    <div class="col-lg-9 col-xl-4">
                                                        <select name="alat_id" placeholder="ketik disini..."  class="form-control">
                                                            <option value="">-- Pilih Angkutan -----</option>
                                                            @foreach(alat_get() as $ven)
                                                                <option value="{{$ven->id}}" @if($data->alat_id==$ven->id) selected @endif>[{{$ven->nopol}}] {{$ven->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Keterangan Invoice</span></label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <textarea name="name" placeholder="ketik disini..."  class="form-control" rows="4">{{$data->name}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Nilai Tagihan</span></label>
                                                    <div class="col-lg-9 col-xl-5">
                                                        <input type="text" id="inputmask"  value="{{$data->nilai}}" data-inputmask="'alias': 'currency'" name="nilai" placeholder="ketik disini..."  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Dokumen Tagihan</span></label>
                                                    <div class="col-lg-9 col-xl-3">
                                                        <input type="file"  name="file" placeholder="ketik disini..."  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Tanggal Tagihan</span></label>
                                                    <div class="col-lg-9 col-xl-3">
                                                        <input type="text"  name="tanggal" id="tanggal" value="{{$data->tanggal}}" placeholder="ketik disini..."  class="form-control">
                                                    </div>
                                                </div>
                                        @endif
                                        @if($data->tagihan==2)
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Invoice Tagihan & Vendor</span></label>
                                                    <div class="col-lg-9 col-xl-5">
                                                        <input type="text"  name="invoice" placeholder="ketik disini..." value="{{$data->invoice}}" class="form-control">
                                                    </div>
                                                    <div class="col-lg-9 col-xl-4">
                                                        <select name="kode_vendor" placeholder="ketik disini..."  class="form-control">
                                                            <option value="">-- Pilih Vendor -----</option>
                                                            @foreach(vendor_get() as $ven)
                                                                <option value="{{$ven->kode_vendor}}" @if($data->kode_vendor==$ven->kode_vendor) selected @endif>{{$ven->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Keterangan Invoice</span></label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <textarea name="name" placeholder="ketik disini..."  class="form-control" rows="4">{{$data->name}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Nilai Tagihan</span></label>
                                                    <div class="col-lg-9 col-xl-5">
                                                        <input type="text" id="inputmask"  value="{{$data->nilai}}" data-inputmask="'alias': 'currency'" name="nilai" placeholder="ketik disini..."  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Dokumen Tagihan</span></label>
                                                    <div class="col-lg-9 col-xl-3">
                                                        <input type="file"  name="file" placeholder="ketik disini..."  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label">Tanggal Tagihan</span></label>
                                                    <div class="col-lg-9 col-xl-3">
                                                        <input type="text"  name="tanggal" id="tanggal" value="{{$data->tanggal}}" placeholder="ketik disini..."  class="form-control">
                                                    </div>
                                                </div>
                                        @endif
                                    </div>
                                    

                                </div>
                                <div class="tab-pane fade" id="default-tab-2">
                                        
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
        });

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });

        function tambah_data(){
            $('#modal-tambah').modal('show');
        }

        function ubah(a){
			
			$.ajax({
				type: 'GET',
				url: "{{url('Vendor/ubah')}}",
				data: "id="+a,
				success: function(msg){
					$('#modal-ubah').modal('show');
					$('#tampil-ubah').html(msg);
					
				}
			}); 
		}

        

        function simpan_data(){
			
            var form=document.getElementById('data-tambah');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Tagihan/ubah')}}?id={{$data->id}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
							location.assign("{{url('Tagihan')}}");
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
                            $('#modal-notif').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        } 

        
    </script>
   
@endpush