				<ul class="nav"><li class="nav-header">Navigation</li>
					
					<li class="lilinya">
						<a href="{{url('/home')}}">
							<i class="fas fa-home"></i>
							<span>Home</span> 
						</a>
					</li>
					@if(Auth::user()->role_id==1)
					<li class="has-sub lilinya">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-clipboard"></i>
							<span>Master Data</span>
						</a>
						<ul class="sub-menu" style="display: @if($page=='master') block @endif;">
							<li><a href="{{url('Customer')}}">Customer</a></li>
							<li><a href="{{url('Vendor')}}">Vendor</a></li>
							<li><a href="{{url('Gudang')}}">Gudang</a></li>
						</ul>
					</li>	
					@endif


					@if(Auth::user()->role_id==2)
						<li class="has-sub lilinya">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-clipboard"></i>
								<span>Transaksi Tagihan</span>
							</a>
							<ul class="sub-menu" style="display: @if($page=='tagihan') block @endif;">
								<li><a href="{{url('Tagihan/Create')}}">Buat Tagihan</a></li>
								<li><a href="{{url('Tagihan')}}">Daftar Tagihan</a></li>
							</ul>
						</li>	
						<li class="has-sub lilinya">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-clipboard"></i>
								<span>Invoice Sewa Gudang</span>
							</a>
							<ul class="sub-menu" style="display: @if($page=='invoice') block @endif;">
								<li><a onclick="create_sewa()" href="javascript:;">Buat Invoice</a></li>
								<li><a href="{{url('Invoice')}}">Daftar Invoice</a></li>
							</ul>
						</li>	
						<li><a href="{{url('Transaksigudang')}}"><i class="fa fa-calculator"></i> Stok Gudang</a></li>	
							
					@endif

					@if(Auth::user()->role_id==3)
						<li class="has-sub lilinya">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-clipboard"></i>
								<span>Transaksi Tagihan</span>
							</a>
							<ul class="sub-menu" style="display: @if($page=='tagihan') block @endif;">
								<li><a href="{{url('Tagihan/Create')}}">Buat Tagihan</a></li>
								<li><a href="{{url('Tagihan')}}">Daftar Tagihan</a></li>
							</ul>
						</li>
						<li class="has-sub lilinya">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-clipboard"></i>
								<span>Invoice Angkutan</span>
							</a>
							<ul class="sub-menu" style="display: @if($page=='angkutan') block @endif;">
								<li><a href="javascript:;" onclick="create_sewa_angkutan()">Buat Invoice</a></li>
								<li><a href="{{url('Angkutan')}}">Daftar Invoice</a></li>
							</ul>
						</li>	
					@endif

					@if(Auth::user()->role_id==4)
						<li class="has-sub lilinya">
							<a href="javascript:;">
								<!-- @if(all_notif()>0)
									<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{all_notif()}}</span>
								@endif -->
								<b class="caret"></b>
								<i class="fa fa-clipboard"></i>
								<span>Persetujuan</span>
							</a>
							<ul class="sub-menu" style="display: block ">
								<li>
									<a href="{{url('TagihanAcc')}}">
									@if(tagihan_notif()>0)
										<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{tagihan_notif()}}</span>
									@endif
									     Tagihan Operasional
									</a>
								</li>	
								<li>
									<a href="{{url('InvoiceAcc')}}">
										@if(invoice_notif()>0)
											<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{invoice_notif()}}</span>
										@endif
										   Invoice Sewa Gudang
									</a>
								</li>	
								<li>
									<a href="{{url('AngkutanAcc')}}">
										@if(invoice_angkutan_notif()>0)
											<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{invoice_angkutan_notif()}}</span>
										@endif
										   Invoice Sewa Angkutan
									</a>
								</li>	
							</ul>
						</li>
						<li><a href="{{url('Transaksigudang')}}"><i class="fa fa-calculator"></i> Stok Gudang</a></li>	
						<li><a href="{{url('Transaksialat')}}"><i class="fa fa-truck"></i> Transaksi Angkutan</a></li>	
						
					@endif

					@if(Auth::user()->role_id==5)
						<li>
							<a href="{{url('TagihanBayar')}}">
								@if(tagihan_bayar_notif()>0)
									<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{tagihan_bayar_notif()}}</span>
								@endif
								<i class="fa fa-clipboard"></i> 
								Pembayaran Tagihan
							</a>
						</li>	
						<li>
							<a href="{{url('InvoiceBayar')}}">
								@if(invoice_bayar_notif()>0)
									<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{invoice_bayar_notif()}}</span>
								@endif
								<i class="fa fa-clipboard"></i> 
								Invoice Sewa Gudang
							</a>
						</li>	
						<li>
							<a href="{{url('AngkutanBayar')}}">
								@if(invoice_bayarangkutan_notif()>0)
									<span class="badge pull-right" style="background: #f5e30b;color: #000;font-weight: bold;">{{invoice_bayarangkutan_notif()}}</span>
								@endif
								<i class="fa fa-clipboard"></i> 
								Invoice Sewa Angkutan
							</a>
						</li>	
						<!-- <li><a href="{{url('PengajuanAcc')}}"><i class="fa fa-clipboard"></i> Persetujuan Invoice</a></li>	 -->
						
					@endif
					
					
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>