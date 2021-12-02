
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>{{name()}}</title>
	<link rel="icon" href="{{url('img/fav.png')}}">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{url('assets/css/one-page-parallax/app.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body data-spy="scroll" data-target="#header" data-offset="51">
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin #header -->
		<div id="header" style="background: #141414;" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">
			<!-- begin container -->
			<div class="container">
				<!-- begin navbar-brand -->
				<a href="index.html" class="navbar-brand">
					<img src="{{url('img/pt2.png')}}">
				</a>
				<!-- end navbar-brand -->
				<!-- begin navbar-toggle -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- end navbar-header -->
				<!-- begin navbar-collapse -->
				<div class="collapse navbar-collapse" id="header-navbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a class="nav-link" href="#about" data-click="scroll-to-target">TENTANG KAMI</a></li>
						<li class="nav-item"><a class="nav-link" href="#team" data-click="scroll-to-target">TIM KERJA</a></li>
						<li class="nav-item"><a class="nav-link" href="#service" data-click="scroll-to-target">PELAYANAN</a></li>
						<li class="nav-item"><a class="nav-link" href="#work" data-click="scroll-to-target">WORK</a></li>
						<li class="nav-item"><a class="nav-link" href="#client" data-click="scroll-to-target">CLIENT</a></li>
						<li class="nav-item"><a class="nav-link" href="#pricing" data-click="scroll-to-target">PRICING</a></li>
						<li class="nav-item"><a class="nav-link" href="#contact" data-click="scroll-to-target">KONTAK</a></li>
					</ul>
				</div>
				<!-- end navbar-collapse -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #header -->
		
		<!-- begin #home -->
		<div id="home" class="content has-bg home">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(https://www.kitasrl.com/upload/750_500/9834204Allungabile-SERIN.jpg);" 
				data-paroller="true" 
				data-paroller-factor="0.5"
				data-paroller-factor-xs="0.25">
			</div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container home-content">
				<h3>Selamat datang {{name()}}</h3>
				<p>
					We have created a multi-purpose theme that take the form of One-Page or Multi-Page Version.<br />
					Use our <a href="#">theme panel</a> to select your favorite theme color.
				</p>
				<a href="{{route('login')}}" class="btn btn-theme btn-primary">Login Sistem</a> <br />
				or <a href="#">subscribe</a> newsletter
			</div>
			<!-- end container -->
		</div>
		<!-- end #home -->
		
		<!-- begin #about -->
		<div id="about" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInDown">
				<h2 class="content-title">Tentang Kami</h2>
				<p class="content-desc">
					Jaya Tatara Sejahtera terdaftar di Cilegon Indonesia.<br> Itu diterbitkan dalam Berita Negara pada 2013 dengan BN 46 TBN 70174.<br> Alamat perusahaan yang terdaftar: BUKIT BAJA SEJAHTERA III BLOK A3 NO 2 RT 17 RW 9 KEL CIWADUK.
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin about -->
						<div class="about">
							<h3 class="mb-3">Pelayanan</h3>
							<p>
								Jaya Tatara Sejahtera Melayani jasa pengiriman barang sistem konsul. 
								Yaitu jenis layanan pengiriman barang yang diangkut dan dikirim 
								bersamaan dengan barang-barang dari shipment lain dalam satu armada yang sama.
								Layanan ini memungkinkan biaya pengiriman barang cenderung lebih murah karena bersifat kolektif. 
							</p>
							<p>
								Jaya Tatara Sejahtera Melayani jasa pengiriman barang sistem konsul. 
								Yaitu jenis layanan pengiriman barang yang diangkut dan dikirim 
								bersamaan dengan barang-barang dari shipment lain dalam satu armada yang sama.
								Layanan ini memungkinkan biaya pengiriman barang cenderung lebih murah karena bersifat kolektif. 
							</p>
						</div>
						<!-- end about -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<h3 class="mb-3">Pesan</h3>
						<!-- begin about-author -->
						<div class="about-author">
							<div class="quote">
								<i class="fa fa-quote-left"></i>
								<h3>We work harder,<br /><span>to let our user keep simple</span></h3>
								<i class="fa fa-quote-right"></i>
							</div>
							<div class="author">
								<div class="image">
									<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Sean Ngu" />
								</div>
								<div class="info">
									Sean Ngu
									<small>Front End Developer</small>
								</div>
							</div>
						</div>
						<!-- end about-author -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<h3 class="mb-3">Pengalaman Kami</h3>
						<!-- begin skills -->
						<div class="skills">
							<div class="skills-name">Pelayanan Angkutan</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 95%">
									<span class="progress-number">95%</span>
								</div>
							</div>
							<div class="skills-name">Pergudangan</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 90%">
									<span class="progress-number">90%</span>
								</div>
							</div>
							<div class="skills-name">Database Design</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 85%">
									<span class="progress-number">85%</span>
								</div>
							</div>
							
						</div>
						<!-- end skills -->
					</div>
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #about -->
		
		<!-- begin #milestone -->
		<div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(../assets/img/bg/bg-milestone.jpg)"
				data-paroller="true" 
				data-paroller-factor="0.5"
				data-paroller-factor-md="0.01"
				data-paroller-factor-xs="0.01"></div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container">
				<!-- begin row -->
				<div class="row">
					<!-- begin col-3 -->
					<div class="col-md-3 milestone-col">
						<div class="milestone">
							<div class="number" data-animation="true" data-animation-type="number" data-final-number="1292">1,292</div>
							<div class="title">Themes & Template</div>
						</div>
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 milestone-col">
						<div class="milestone">
							<div class="number" data-animation="true" data-animation-type="number" data-final-number="9039">9,039</div>
							<div class="title">Registered Members</div>
						</div>
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 milestone-col">
						<div class="milestone">
							<div class="number" data-animation="true" data-animation-type="number" data-final-number="89291">89,291</div>
							<div class="title">Items Sold</div>
						</div>
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 milestone-col">
						<div class="milestone">
							<div class="number" data-animation="true" data-animation-type="number" data-final-number="129">129</div>
							<div class="title">Theme Authors</div>
						</div>
					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #milestone -->
		
		<!-- begin #team -->
		<div id="team" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">Tim Kami</h2>
				<p class="content-desc">
					Phasellus suscipit nisi hendrerit metus pharetra dignissim. Nullam nunc ante, viverra quis<br /> 
					ex non, porttitor iaculis nisi.
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin team -->
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="flipInX">
								<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">None</h3>
								<div class="title text-primary">{{name()}}</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
								
							</div>
						</div>
						<!-- end team -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin team -->
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="flipInX">
								<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">None</h3>
								<div class="title text-primary">{{name()}}</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
								
							</div>
						</div>
						<!-- end team -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin team -->
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="flipInX">
								<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">None</h3>
								<div class="title text-primary">{{name()}}</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
								
							</div>
						</div>
						<!-- end team -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin team -->
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="flipInX">
								<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">None</h3>
								<div class="title text-primary">{{name()}}</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
								
							</div>
						</div>
						<!-- end team -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin team -->
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="flipInX">
								<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">None</h3>
								<div class="title text-primary">{{name()}}</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
								
							</div>
						</div>
						<!-- end team -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<!-- begin team -->
						<div class="team">
							<div class="image" data-animation="true" data-animation-type="flipInX">
								<img src="{{url('assets/img/user/user-1.jpg')}}" alt="Ryan Teller" />
							</div>
							<div class="info">
								<h3 class="name">None</h3>
								<div class="title text-primary">{{name()}}</div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
								
							</div>
						</div>
						<!-- end team -->
					</div>
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #team -->
		
		<!-- begin #quote -->
		<div id="quote" class="content bg-black-darker has-bg" data-scrollview="true">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(../assets/img/bg/bg-quote.jpg)"
				data-paroller-factor="0.5"
				data-paroller-factor-md="0.01"
				data-paroller-factor-xs="0.01">
			</div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInLeft">
				<!-- begin row -->
				<div class="row">
					<!-- begin col-12 -->
					<div class="col-md-12 quote">
						"
						Tahapan untuk meraih kesuksesan itu panjang. Dari persiapan, percobaan, ujian dan kemenangan
						"
						
					</div>
					<!-- end col-12 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #quote -->
		
		<!-- beign #service -->
		<div id="service" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">Pelayanan Kami</h2>
				<p class="content-desc">
					Jaya Tatara Sejahtera Melayani jasa pengiriman barang sistem konsul. 
					Yaitu jenis layanan pengiriman barang yang diangkut dan dikirim 
					bersamaan dengan barang-barang dari shipment lain dalam satu armada yang sama.
					Layanan ini memungkinkan biaya pengiriman barang cenderung lebih murah karena bersifat kolektif.
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-cog"></i></div>
							<div class="info">
								<h4 class="title">Easy to Customize</h4>
								<p class="desc">Duis in lorem placerat, iaculis nisi vitae, ultrices tortor. Vestibulum molestie ipsum nulla. Maecenas nec hendrerit eros, sit amet maximus leo.</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-paint-brush"></i></div>
							<div class="info">
								<h4 class="title">Clean & Careful Design</h4>
								<p class="desc">Etiam nulla turpis, gravida et orci ac, viverra commodo ipsum. Donec nec mauris faucibus, congue nisi sit amet, lobortis arcu.</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-file"></i></div>
							<div class="info">
								<h4 class="title">Well Documented</h4>
								<p class="desc">Ut vel laoreet tortor. Donec venenatis ex velit, eget bibendum purus accumsan cursus. Curabitur pulvinar iaculis diam.</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
				</div>
				<!-- end row -->
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-code"></i></div>
							<div class="info">
								<h4 class="title">Re-usable Code</h4>
								<p class="desc">Aenean et elementum dui. Aenean massa enim, suscipit ut molestie quis, pretium sed orci. Ut faucibus egestas mattis.</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-shopping-cart"></i></div>
							<div class="info">
								<h4 class="title">Online Shop</h4>
								<p class="desc">Quisque gravida metus in sollicitudin feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-md-4 col-sm-12">
						<div class="service">
							<div class="icon" data-animation="true" data-animation-type="bounceIn"><i class="fa fa-heart"></i></div>
							<div class="info">
								<h4 class="title">Free Support</h4>
								<p class="desc">Integer consectetur, massa id mattis tincidunt, sapien erat malesuada turpis, nec vehicula lacus felis nec libero. Fusce non lorem nisl.</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #about -->
		
		<!-- beign #action-box -->
		<div id="action-box" class="content has-bg" data-scrollview="true">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(../assets/img/bg/bg-action.jpg)"
				data-paroller-factor="0.5"
				data-paroller-factor-md="0.01"
				data-paroller-factor-xs="0.01">
			</div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInRight">
				<!-- begin row -->
				<div class="row action-box">
					<!-- begin col-9 -->
					<div class="col-md-9 col-sm-9">
						<div class="icon-large text-primary">
							<i class="fa fa-binoculars"></i>
						</div>
						<h3>Masuk Sistem</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus faucibus magna eu lacinia eleifend.
						</p>
					</div>
					<!-- end col-9 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-3">
						<a href="{{route('login')}}" class="btn btn-outline-white btn-theme btn-block">Login</a>
					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #action-box -->
		
		<!-- begin #work -->
		<div id="work" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInDown">
				<h2 class="content-title">Our Latest Work</h2>
				<p class="content-desc">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
					sed bibendum turpis luctus eget
				</p>
				<!-- begin row -->
				<div class="row row-space-10">
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-1.jpg')}}" alt="Work 1" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Aliquam molestie</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-2.jpg')}}" alt="Work 2" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Quisque at pulvinar lacus</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-3.jpg')}}" alt="Work 3" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Vestibulum et erat ornare</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-4.jpg')}}" alt="Work 4" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Sed vitae mollis magna</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
				<!-- begin row -->
				<div class="row row-space-10">
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-5.jpg')}}" alt="Work 5" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Suspendisse at mattis odio</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-6.jpg')}}" alt="Work 6" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Aliquam vitae commodo diam</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-7.jpg')}}" alt="Work 7" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Phasellus eu vehicula lorem</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<!-- begin col-3 -->
					<div class="col-md-3 col-sm-6">
						<!-- begin work -->
						<div class="work">
							<div class="image">
								<a href="#"><img src="{{url('assets/img/work/work-img-8.jpg')}}" alt="Work 8" /></a>
							</div>
							<div class="desc">
								<span class="desc-title">Morbi bibendum pellentesque</span>
								<span class="desc-text">Lorem ipsum dolor sit amet</span>
							</div>
						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #work -->
		
		<!-- begin #client -->
		<div id="client" class="content has-bg bg-green" data-scrollview="true">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(../assets/img/bg/bg-client.jpg)"
				data-paroller-factor="0.5"
				data-paroller-factor-md="0.01"
				data-paroller-factor-xs="0.01">
			</div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="fadeInUp">
				<h2 class="content-title">Our Client Testimonials</h2>
				<!-- begin carousel -->
				<div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
					<!-- begin carousel-inner -->
					<div class="carousel-inner text-center">
						<!-- begin item -->
						<div class="carousel-item active">
							<blockquote>
								<i class="fa fa-quote-left"></i>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra, nulla ut interdum fringilla,<br />
								urna massa cursus lectus, eget rutrum lectus neque non ex.
								<i class="fa fa-quote-right"></i>
							</blockquote>
							<div class="name"> — <span class="text-primary">Mark Doe</span>, Designer</div>
						</div>
						<!-- end item -->
						<!-- begin item -->
						<div class="carousel-item">
							<blockquote>
								<i class="fa fa-quote-left"></i>
								Donec cursus ligula at ante vulputate laoreet. Nulla egestas sit amet lorem non bibendum.<br />
								Nulla eget risus velit. Pellentesque tincidunt velit vitae tincidunt finibus.
								<i class="fa fa-quote-right"></i>
							</blockquote>
							<div class="name"> — <span class="text-primary">Joe Smith</span>, Developer</div>
						</div>
						<!-- end item -->
						<!-- begin item -->
						<div class="carousel-item">
							<blockquote>
								<i class="fa fa-quote-left"></i>
								Sed tincidunt quis est sed ultrices. Sed feugiat auctor ipsum, sit amet accumsan elit vestibulum<br />
								fringilla. In sollicitudin ac ligula eget vestibulum.
								<i class="fa fa-quote-right"></i>
							</blockquote>
							<div class="name"> — <span class="text-primary">Linda Adams</span>, Programmer</div>
						</div>
						<!-- end item -->
					</div>
					<!-- end carousel-inner -->
					<!-- begin carousel-indicators -->
					<ol class="carousel-indicators m-b-0">
						<li data-target="#testimonials" data-slide-to="0" class="active"></li>
						<li data-target="#testimonials" data-slide-to="1" class=""></li>
						<li data-target="#testimonials" data-slide-to="2" class=""></li>
					</ol>
					<!-- end carousel-indicators -->
				</div>
				<!-- end carousel -->
			</div>
			<!-- end containter -->
		</div>
		<!-- end #client -->
		
		<!-- begin #pricing -->
		<div id="pricing" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">Our Price</h2>
				<p class="content-desc">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
					sed bibendum turpis luctus eget
				</p>
				
			</div>
			<!-- end container -->
		</div>
		<!-- end #pricing -->
		
		<!-- begin #contact -->
		<div id="contact" class="content bg-silver-lighter" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">Contact Us</h2>
				<p class="content-desc">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
					sed bibendum turpis luctus eget
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-6 -->
					<div class="col-lg-6" data-animation="true" data-animation-type="fadeInLeft">
						<h3>If you have a project you would like to discuss, get in touch with us.</h3>
						<p>
							Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus.
						</p>
						<p>
							<strong>{{name()}}</strong><br />
							{!!alamat_utama()!!}
						</p>
						<p>
							<!-- <span class="phone">+11 (0) 123 456 78</span><br /> -->
							<a href="#" class="text-primary">{{email()}}</a>
						</p>
					</div>
					<!-- end col-6 -->
					<!-- begin col-6 -->
					<div class="col-lg-6 form-col" data-animation="true" data-animation-type="fadeInRight">
						<form class="form-horizontal">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3 text-md-right">Name <span class="text-primary">*</span></label>
								<div class="col-md-9">
									<input type="text" class="form-control" />
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3 text-md-right">Email <span class="text-primary">*</span></label>
								<div class="col-md-9">
									<input type="text" class="form-control" />
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3 text-md-right">Message <span class="text-primary">*</span></label>
								<div class="col-md-9">
									<textarea class="form-control" rows="10"></textarea>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3 text-md-right"></label>
								<div class="col-md-9 text-left">
									<button type="submit" class="btn btn-theme btn-primary btn-block">Send Message</button>
								</div>
							</div>
						</form>
					</div>
					<!-- end col-6 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #contact -->
		
		<!-- begin #footer -->
		<div id="footer" class="footer">
			<div class="container">
				<div class="footer-brand">
					<img src="{{url('img/pt2.png')}}" style="width:60%">
				
				</div>
				<p>
					&copy; Copyright {{domain()}} 2021 <br />
					An admin & front end theme with serious impact. Created by <a href="#">uconbeton</a>
				</p>
				<p class="social-list">
					<a href="#"><i class="fas fa-facebook-f fa-fw"></i></a>
					<a href="#"><i class="fab fa-instagram fa-fw"></i></a>
					<a href="#"><i class="fab fa-twitter fa-fw"></i></a>
					<a href="#"><i class="fab fa-google-plus-g fa-fw"></i></a>
					<a href="#"><i class="fab fa-dribbble fa-fw"></i></a>
				</p>
			</div>
		</div>
		<!-- end #footer -->
		
		<!-- begin theme-panel -->
		<div class="theme-panel">
			<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
			<div class="theme-panel-content">
				<ul class="theme-list clearfix">
					<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/one-page-parallax/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="../assets/css/one-page-parallax/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/one-page-parallax/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="../assets/css/one-page-parallax/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="../assets/css/one-page-parallax/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="../assets/css/one-page-parallax/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green" data-original-title="" title="">&nbsp;</a></li>
					<li class="active"><a href="javascript:;" class="bg-teal" data-theme-file="../assets/css/one-page-parallax/theme/teal.min.css" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="../assets/css/one-page-parallax/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/one-page-parallax/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/one-page-parallax/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="../assets/css/one-page-parallax/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo" data-original-title="" title="">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/one-page-parallax/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black" data-original-title="" title="">&nbsp;</a></li>
				</ul>
			</div>
		</div>
		<!-- end theme-panel -->
	</div>
	<!-- end #page-container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url('assets/js/one-page-parallax/app.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>
