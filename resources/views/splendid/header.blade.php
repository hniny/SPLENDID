<!DOCTYPE html>

<html>
	<head>
		<title>Splendid</title>
	<link rel="shortcut icon" href="{{ asset('images/BG_(Black).png') }}" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css"
		href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic|Oswald:400,700" media="screen">
		<link rel="stylesheet" href="{{ asset('../css/style.css') }}">
		@stack('css')
		<link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
		<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.carousel.min.css" />
		<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.default.min.css" />
</head>

<body>
		<div class="splendid">
		<div class="fixed-top">
			<header>
				<nav class="navbar splenav navbar-expand-lg justify-content-center">
					<div class="container">
						<a class="mobilelogo" href="/" style="display: none;">
							<img src="{{ asset('images/BG_(Red).png') }}" width="80px" alt="logo" class="logo" />
						</a>
						<button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse"
						data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
						aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarText">
							<ul class="nav navbar-nav">
								<li class="nav-item menu"><a href="/" class="but">HOME</a></li>
								<li class="dropdown nav-item menu sub">
									<a href="#" class="dropdown-toggle but" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="true"> <span
									class="nav-label">PRODUCTS</span></a>
									<ul class="dropdown-menu">
									{{-- {{ dd($category) }} --}}
									@foreach ($menu_categories as $item)
									{{-- {{ dd($item) }} --}}
									@if ($item->parent==NULL)
									<li class="dropdown-submenu">
										<a href="#" class="but" data-toggle="dropdown" role="button" aria-haspopup="true"
										aria-expanded="false">{{ $item->name }}</a>
										<ul class="dropdown-menu sub-menu">
											
											<!-- <li><a href="/products" class="menu-title">Gaming</a></li> -->
											@foreach ( $item->submenu as $submenu)
												
											<li><a href="/products/{{ $submenu->id }}" class="but">{{ $submenu->name}}</a></li>
											@endforeach
										</ul>
										
									</li>
									@endif
									@endforeach
									</ul>

								</li>
								<li class="dropdown nav-item menu">
									<a href="#" class="dropdown-toggle but" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="true"> <span class="nav-label">WHAT'S
										NEW?</span></a>
									<ul class="dropdown-menu">
										<li class="dropdown-submenu"><a href="/promotions" class="but">Promotion Items</a></li>
											
										<li class="dropdown-submenu"><a href="/game_update" class="but">Game update</a></li>
										
										<li class="dropdown-submenu"><a href="/latest_gaming" class="but">Latest and upcoming gaming gadgets</a></li>
											
										</ul>
										
									</li>
									<!-- <li class="nav-item menu"><a href="./softwares.html">SOFTWARES</a></li> -->
									<li class="dropdown nav-item menu">
										<a href="#" class="dropdown-toggle but" data-toggle="dropdown" role="button"
										aria-haspopup="true" aria-expanded="true"><span
										class="nav-label">SOFTWARES</span></a>
										<ul class="dropdown-menu">
											
											<li class="dropdown-submenu"><a href="#" class="but">Splendid all in one app</a>
												
											</li>

											<li class="dropdown-submenu"><a href="/buid_pc" class="but">Buid Your Own PC</a>
												
											</li>
											
										</ul>
										
									</a>
									
								</li>
								<!-- <li class="nav-item menu"><a href="./community.html">COMMUNITY</a></li> -->
								<li class="nav-item">
									<a class="navbar-brand brand-centered but" href="/">
										<img src="/images/BG_(Red).png" width="80px" alt="logo" class="logo" />
										
									</a>
									
								</li>
								<li class="dropdown nav-item menu">
									<a href="#" class="dropdown-toggle but" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="true"> <span
									class="nav-label">COMMUNITY</span></a>
									<ul class="dropdown-menu">
										<li class="dropdown-submenu"><a href="/video" class="but">Video</a></li>
										<li class="dropdown-submenu"><a href="/product_content" class="but">Product Content</a></li>
										<li class="dropdown-submenu"><a href="/partnership" class="but">Partnership</a></li>
										<li class="dropdown-submenu"><a href="/event" class="but">Event</a></li>
										<li class="dropdown-submenu"><a href="/benifit" class="but">Benefit</a></li>
										<li class="dropdown-submenu"><a href="#" class="but">Splendid Reward Program</a></li>
									</ul>
									
								</li>
								<!-- <li class="nav-item menu"><a href="./store.html">FIND US</a></li> -->
								<li class="dropdown nav-item menu">
									<a href="#" class="dropdown-toggle but" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="true"> <span class="nav-label">FIND
										US</span></a>
									<ul class="dropdown-menu">
											
											<li class="dropdown-submenu"><a href="/outlets" class="but">Outlets</a></li>
											
											<li class="dropdown-submenu"><a href="/contact" class="but">Contact</a></li>
											
										</ul>
										
									</li>
									<li class="dropdown nav-item menu">
										<a href="#" class="dropdown-toggle but" data-toggle="dropdown" role="button"
										aria-haspopup="true" aria-expanded="true"> <span
										class="nav-label">SUPPORT</span></a>
										<ul class="dropdown-menu">

											<!-- <li class="dropdown-submenu"><a href="#" class="but">Service</a></li> -->
											
											<li class="dropdown-submenu"><a href="/error_qa" class="but">Error Q&A</a></li>
											
											<li class="dropdown-submenu"><a href="/warranty" class="but">Warranty information</a></li>
											
											<li class="dropdown-submenu"><a href="/driver" class="but">Driver Download</a></li>
											
										</ul>
										
									</li>
									<!-- <li class="nav-item menu"><a href="#">WHAT'S NEW?</a></li> -->
									<li class="nav-item menu icon">
										<form class="form-inline my-2 my-lg-0">
											
											<img src="{{ asset('/images/searchicon.png') }}" alt="searchicon" class="searchicon"
											
											width="20px" />
											
											<div class="search-box">
												
												<input type="text" class="search" placeholder="Search" />
												
												<input type="button" value="Search" />
												
											</div>
											
										</form>
										
									</li>
									<li class="nav-item menu icon">
										<a href="/showShoppingCartview" class="but"><img src="{{ asset('/images/shopping-cart.png') }}" alt="shooping-cart"
											width="24px" /><span class="count lbcount">
												<span id="show-count"></span></span></a>
											
										</li>
										
									</ul>
									
								</div>
								
							</div>
						</nav>
					</header>
				</div> 	