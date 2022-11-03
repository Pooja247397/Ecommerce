<?php   
   $user = Session::get('user');
    // echo $user->id;
   ?>
<?php use App\Http\Controllers\ProductController;
$total = ProductController::cartitem(); ?>
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{ url('home') }}">Home</a>
								<!-- 	<ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> -->
								</li>
								<li><a href="about.html">About</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li>
								<li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="{{ url('shop') }}">Shop</a>
									<ul class="sub-menu">
										<li><a href="{{ url('shop') }}">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
									<!-- 	<li><a href="{{ url('viewproduct') }}">View Product</a></li> -->
										<li><a href="cart.html">Cart</a></li>
									</ul>									
								</li>
								<?php 
							
								if(!empty($user['id']))

								{
								?>  
								<li><a href="{{ url('userlogout')}}">Logout</a></li>
                                  <li>
								<div class="header-icons">
									<a class="shopping-cart" href="{{ url('cartlist')}}">{{$total}}<i class="fas fa-shopping-cart"></i></a>
								</div>
								</li>			
								<?php
								 }
								else{ ?>
								  		<li><a href="{{ url('loginsignup') }}">Log-In/Sign-Up</a>						</li>			
								
								<?php } ?>								
							</ul>
						</nav>
						@if(session('error'))
  <div class="alert alert-success" role="alert">
       {{session('error')}}
     </div>
     @endif
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header