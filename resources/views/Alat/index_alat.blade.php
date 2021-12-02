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
			<h1 class="page-header">{{$menu}} <small>{{name()}}</small></h1>
            
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
					<div class="panel-body">
                        <!-- <div class="col-md-6">
                            <div class="btn-group">
                                <button class="btn btn-white" onclick="tambah_data()">Buat Baru</button>
                                <button class="btn btn-white active">Cetak</button>
                            </div>
                        </div> -->
                        <form id="data-all" enctype="multipart/form-data">
                            @csrf
                            <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="3%" class="text-nowrap"></th>
                                        <th width="10%" class="text-nowrap">Plat Nomor</th>
                                        <th class="text-nowrap">Progres Jumlah Transaksi</th>
                                        <th width="13%" class="text-nowrap">Biaya Perawatan (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(alat_get() as $no=>$o)
                                        <tr>
                                            <td style="vertical-align: top !important;">{{$no+1}}</td>
                                            <td style="vertical-align: top !important;">
                                                <span class="btn btn-green btn-xs" onclick="view(`{{base64_encode($o->id)}}`)" style="margin-bottom:1%"><i class="fas fa-pencil-alt"></i></span>
                                            </td>
                                            <td style="vertical-align: top !important;">{{$o->nopol}}</td>
                                            <td style="vertical-align: top !important;">
                                                <div class="widget-chart-info-progress">
                                                    <b>{{$o->name}}</b>
                                                    <span class="pull-right">{{transaksi_truk($o->id)}}%</span>
                                                </div>
                                                <div class="progress progress-sm m-b-15">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated rounded-corner bg-indigo" style="width: {{transaksi_truk($o->id)}}%"></div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: top !important;">Rp.{{uang(tagihan_truk($o->id))}}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="col-xl-8 offset-xl-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Profil Alat</legend>
                                        <div id="notifikasi-tambah" class="noot"></div>
                                        <form id="data-tambah" enctype="multipart/form-data">
                                            @csrf    
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Nama Kendaraan</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input type="text" name="name" placeholder="ketik disini..."  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">No Polisi & Plat Nomor</span></label>
                                                <div class="col-lg-9 col-xl-3">
                                                    <input type="text" name="nopol" placeholder="ketik disini..."  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Kondisi</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select name="sts"  placeholder="ketik disini..."  class="form-control">
                                                        <option value="">Pilih Kondisi---</option>
                                                        <option value="1">Ready</option>
                                                        <option value="2">Maintenance</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
									</div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
                                    <a href="javascript:;" class="btn btn-danger" onclick="simpan_data()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-ubah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="col-xl-8 offset-xl-2">
										<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Profil Alat</legend>
                                        <div id="notifikasi-ubah" class="noot"></div>
                                        <form id="data-ubah" enctype="multipart/form-data">
                                            @csrf    
                                            <div id="tampil-ubah"></div>
                                        </form>
									</div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
                                    <a href="javascript:;" class="btn btn-danger" onclick="ubah_data()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection
@push('ajax')
    <script src="{{url('assets/assets/plugins/ckeditor/ckeditor.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js')}}"></script>
	<script src="{{url('assets/assets/js/demo/form-wysiwyg.demo.js')}}"></script>
    <script  type="text/javascript" >
        $('#myTable').DataTable( {
			responsive: true,
			paging: true,
			info: true,
			ordering:false,
			lengthChange: false,
		} );

        function tambah_data(){
            $('#modal-tambah').modal('show');
        }

        function ubah(a){
			
			$.ajax({
				type: 'GET',
				url: "{{url('Alat/ubah')}}",
				data: "id="+a,
				success: function(msg){
					$('#modal-ubah').modal('show');
					$('#tampil-ubah').html(msg);
					
				}
			}); 
		}

        function hapus(a){
			
			$.ajax({
				type: 'GET',
				url: "{{url('Alat/hapus')}}",
				data: "id="+a,
				success: function(msg){
					location.reload();
				}
			}); 
		}

        function simpan_data(){
			
            var form=document.getElementById('data-tambah');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Alat')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
							location.reload();
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
							document.getElementById("notifikasi-tambah").style.width = "100%";
							$('#notifikasi-tambah').html(msg);
                        }
                        
                        
                    }
                });

        } 

        function ubah_data(){
			
            var form=document.getElementById('data-ubah');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Alat/ubah')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        if(msg=='ok'){
							location.reload();
                               
                        }else{
							document.getElementById("loadnya").style.width = "0px";
							document.getElementById("notifikasi-ubah").style.width = "100%";
							$('#notifikasi-ubah').html(msg);
                        }
                        
                        
                    }
                });

        } 
    </script>
   
@endpush