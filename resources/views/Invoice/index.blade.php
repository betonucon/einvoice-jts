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
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button class="btn btn-blue" onclick="create_sewa()">Buat Baru</button>
                                <button class="btn btn-white active">Cetak</button>
                            </div>
                        </div>
                        <form id="data-all" enctype="multipart/form-data">
                            @csrf
                            <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="6%">Act</th>
                                        <th width="4%">Doc</th>
                                        <th width="15%">Invoice</th>
                                        <th>Nama Invoice</th>
                                        <th width="14%">Nilai</th>
                                        <th width="14%">Tanggal Invoice</th>
                                        <th width="13%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(invoice_get() as $no=>$o)
                                        <tr>
                                            <td style="vertical-align: top !important;">{{$no+1}}</td>
                                            <td style="vertical-align: top !important;">
                                                @if($o->sts==2)
                                                    <i class="fas fa-check"></i>  
                                                @else
                                                    @if($o->sts==3)
                                                        <span class="btn btn-aqua btn-xs" onclick="cetak(`{{base64_encode($o->id)}}`)" style="margin-bottom:1%">Cetak</span>
                                                    @else
                                                    <span class="btn btn-green btn-xs" onclick="ubah(`{{base64_encode($o->id)}}`)" style="margin-bottom:1%"><i class="fas fa-pencil-alt"></i></span>
                                                    <span class="btn btn-red btn-xs" onclick="hapus({{$o->id}})"><i class="fas fa-trash-alt"></i></span>
                                                    @endif
                                                    
                                                @endif
                                                
                                            </td>
                                            <td style="vertical-align: top !important;"><span class="btn btn-white btn-xs" onclick="buka_file(`{{$o->file}}`)"><i class="fas fa-file-pdf"></i></span></td>
                                            <td style="vertical-align: top !important;">{{$o->invoice}}</td>
                                            <td style="vertical-align: top !important;">{{$o->name}}</td>
                                            <td style="vertical-align: top !important;">{{uang($o->nilai)}}</td>
                                            <td style="vertical-align: top !important;">{{tgl_indo($o->tanggal)}}</td>
                                            <td style="vertical-align: top !important;"><font style="color:{{$o->status['color']}}">{{$o->status['name']}}</font></td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                    
                    <div class="modal fade" id="modal-file" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                    <div id="tampil-file"></div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Batal</a>
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

        function buka_file(a){
            var file="<iframe src='{{url('dokumen')}}/"+a+"' height='550' width='100%'></iframe>";
            $('#modal-file').modal('show');
            $('#tampil-file').html(file);
        }

        function tambah(){
			
			location.assign("{{url('Invoice/Create')}}");
		}

        function ubah(a){
			
			location.assign("{{url('Invoice/Edit')}}?id="+a);
		}

        function hapus(a){
			
			$.ajax({
				type: 'GET',
				url: "{{url('Invoice/hapus')}}",
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
                    url: "{{url('/Vendor')}}",
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
                    url: "{{url('/Vendor/ubah')}}",
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