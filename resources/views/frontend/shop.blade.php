@extends('layouts.master_frontend')

<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				 
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
@if(session('success'))
               <div class="alert alert-success" role="alert">
                  {{session('success')}}
               </div>
 @endif
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                        	
                            <li class="active" data-filter="*">All</li>
                             @foreach($category as $cat)
                            <li data-filter=".{{$cat->name}}">{{$cat->name}}</li>
                             @endforeach
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
					 @foreach($product as $products)
		
				<div class="col-lg-4 col-md-6 text-center {{$products->categorie->name}}">
					<div class="single-product-item">
						
						<div class="product-image">
							<a href="viewproduct/{{$products->id}}"><img width = "100px"height="200px"src="{{asset('/storage/product_images/'.$products->product_image)}}"></a>
						</div>
						<h3>{{$products->title}}</h3>
						<p class="product-price"><span>Per Kg</span> {{$products->price}}</p>
						<form action="{{url('addtocart')}}" method = "POST">
							<input type="hidden" name="product_id" value="{{$products->id}}">
							<input type="hidden" name="quantity">
							@csrf
							<button class="cart-btn" ><i class="fas fa-shopping-cart"></i> Add to Cart</button>	
										
					</form>
					</div>
				</div>			
				 @endforeach
				</div>			
		</div>
	</div>
	<!-- end products -->
