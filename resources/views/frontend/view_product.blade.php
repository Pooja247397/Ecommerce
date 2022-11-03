@extends('layouts.master_frontend')
<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>View Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			

			<div class="row">				
				<div class="col-md-5">
					<div class="single-product-img">
						
						<a href="#"><img src="{{asset('/storage/product_images/'.$data->product_image)}}"></a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$data->title}}</h3>
						<p class="single-product-pricing"><span>Per Kg</span>  {{$data->price}}</p>
						<p>{{$data->description}}</p>
						<div class="single-product-form">
						
							<form action="{{url('addquantity')}}" method="post">
								@csrf
								<input type="hidden" name="product_id" value="{{$data->id}}">

								<input type="number"  name="quantity" value="1">
							<br>
								<button type="submit" class="cart-btn" ><i class="fas fa-shopping-cart"></i> Add to Cart</button>	
							</form>
							<!-- <a href="{{ url('cartlist')}}" class="cart-btn"> View Cart</a> -->
							<p><strong>Categories: </strong>
							<?php
							$all_catename = "";
							if($category){
								foreach($category as $cat_data){
									$all_catename.= $cat_data->name.',';
								}
							
							$categories = rtrim($all_catename, ", ");
							echo $categories;
						}
							 ?>
							</p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<!-- <div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- end more products -->