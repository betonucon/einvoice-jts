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
        <div id="content" class="content">
			<h1 class="page-header">Dashboard <small> {{name()}}</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				
				<!-- begin col-6 -->
				<div class="col-xl-8 ui-sortable">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="chart-js-2">
						<div class="panel-heading ui-sortable-handle">
							<h4 class="panel-title">Grafik</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<p>
								Grafik transaksi {{name()}} {{$tahun}}
							</p>
							<div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
								<canvas id="bar-chart" data-render="chart-js" width="495" height="247" style="display: block; width: 495px; height: 247px;" class="chartjs-render-monitor"></canvas>
							</div>
						</div>
					</div>
					<!-- end panel -->
				</div>
				<div class="col-xl-4 ui-sortable">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="chart-js-2">
						<div class="panel-heading ui-sortable-handle">
							<h4 class="panel-title">Detail Transaksi</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							
                            <div class="widget-todolist widget-todolist-rounded m-b-30" data-id="widget">
								<!-- begin widget-todolist-header -->
								<div class="widget-todolist-header">
									<div class="widget-todolist-header-left">
										<h4 class="widget-todolist-header-title">Todolist</h4>
									</div>
									<div class="widget-todolist-header-right">
										<div class="widget-todolist-header-total"><span>0</span><small>Done</small></div>
									</div>
								</div>
								<!-- end widget-todolist-header -->
								<!-- begin widget-todolist-body -->
								<div class="widget-todolist-body" style="height: 300px;overflow-y: scroll;">
									<!-- begin widget-todolist-item -->
                                    @for($x=1;$x<13;$x++)
                                    
                                    
                                        <div class="widget-todolist-item">
                                            <div class="widget-todolist-content">
                                                <h4 class="widget-todolist-title">{{bulan(ubah_bulan($x))}}</h4>
                                                <p class="widget-todolist-desc"><b>Masuk :</b> {{uang(dasbor_invoice(ubah_bulan($x),$tahun))}},</p>
                                                <p class="widget-todolist-desc"><b>Keluar :</b> {{uang(dasbor_tagihan(ubah_bulan($x),$tahun))}}</p>
                                            </div>
                                            <div class="widget-todolist-icon">
                                                <a href="#"><i class="fa fa-question-circle"></i></a>
                                            </div>
                                        </div>
									@endfor
								</div>
								<!-- end widget-todolist-body -->
							</div>
							
						</div>
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-6 -->
			</div>
			<!-- end row -->
			
		</div>    
        
@endsection
@push('ajax')
<script src="{{url('assets/assets/plugins/chart.js/dist/Chart.min.js')}}"></script>  
<script>
    /*
    Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
    Version: 4.6.0
    Author: Sean Ngu
    Website: http://www.seantheme.com/color-admin/admin/
    */

    Chart.defaults.global.defaultFontColor = COLOR_DARK;
    Chart.defaults.global.defaultFontFamily = FONT_FAMILY;
    Chart.defaults.global.defaultFontStyle = FONT_WEIGHT;

    var randomScalingFactor = function() { 
        return Math.round(Math.random()*100)
    };

    var barChartData = {
        labels: [
            @for($x=1;$x<13;$x++)
             '{{bulan(ubah_bulan($x))}}',
            @endfor
        ],
        datasets: [{
            label: 'Pemasukan',
            borderWidth: 2,
            borderColor: "white",
            backgroundColor: "blue",
            data: [
                @for($x=1;$x<13;$x++)
                    {{dasbor_invoice(ubah_bulan($x),$tahun)}},
                @endfor
            ]
        }, {
            label: 'Pengluaran',
            borderWidth: 2,
            borderColor: "white",
            backgroundColor: "red",
            data: [
                @for($x=1;$x<13;$x++)
                    {{dasbor_tagihan(ubah_bulan($x),$tahun)}},
                @endfor
            ]
        }]
    };


    var handleChartJs = function() {
        

        var ctx2 = document.getElementById('bar-chart').getContext('2d');
        var barChart = new Chart(ctx2, {
            type: 'bar',
            data: barChartData
        });

    };

    var ChartJs = function () {
        "use strict";
        return {
            //main function
            init: function () {
                handleChartJs();
            }
        };
    }();

    $(document).ready(function() {
        ChartJs.init();
    });
</script>
@endpush