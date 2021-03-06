@extends('layouts.web')
@push('style')
	
@endpush
@section('conten')   
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
            <li class="breadcrumb-item active">Page with Light Sidebar</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Page with Light Sidebar <small>{{name()}}</small></h1>
        <!-- end page-header -->
        <div class="col-lg-12 col-xl-12">
			<div class="m-b-10 m-t-10 f-s-10">
                <a href="#modal-widget-stat" class="pull-right text-grey-darker m-r-3 f-w-700" data-toggle="modal">source code</a>
                <b class="text-inverse">WIDGET STAT</b>
            </div>
            <!-- begin row -->
            <div class="row row-space-10 m-b-20">
                <!-- begin col-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-stats bg-gradient-teal m-b-10">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TODAY'S VISITS</div>
                            <div class="stats-number">7,842,900</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 70.1%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (70.1%)</div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-stats bg-gradient-blue m-b-10">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">TODAY'S PROFIT</div>
                            <div class="stats-number">180,200</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 40.5%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (40.5%)</div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-stats bg-gradient-purple m-b-10">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">NEW ORDERS</div>
                            <div class="stats-number">38,900</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 76.3%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (76.3%)</div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-stats bg-gradient-black m-b-10">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">NEW COMMENTS</div>
                            <div class="stats-number">3,988</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 54.9%;"></div>
                            </div>
                            <div class="stats-desc">Better than last week (54.9%)</div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-stats bg-gradient-orange m-b-10">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-file-alt fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">PENDING INVOICE</div>
                            <div class="stats-number">20</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 23.5%;"></div>
                            </div>
                            <div class="stats-desc">More than last week (23.5%)</div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-stats bg-pink m-b-10">
                        <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-triangle fa-fw"></i></div>
                        <div class="stats-content">
                            <div class="stats-title">ERROR LOG</div>
                            <div class="stats-number">5</div>
                            <div class="stats-progress progress">
                                <div class="progress-bar" style="width: 10.5%;"></div>
                            </div>
                            <div class="stats-desc">More than last week (10.5%)</div>
                        </div>
                    </div>
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
            
            
        </div>
        <!-- begin panel -->
        
    </div>
@endsection
@push('ajax')


@endpush