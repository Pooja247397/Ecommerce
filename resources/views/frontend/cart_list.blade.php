@extends('layouts.master_frontend')

<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 0; ?>
								@foreach($product as $item)
								<?php $i++; ?>
								<tr class="table-body-row">
									<td class="product-remove"><a href="removecart/{{$item->id}}"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{asset('/storage/product_images/'.$item->product_image)}}" ></td>
									<td class="product-name">{{$item->title}}</td>
									<td class="product-price">${{$item->price}}</td>
									<td class="product-quantity"><input type="number" min="1" onchange="updateQty('<?php echo $item->id; ?>','<?php echo '_'.$i; ?>')" id="qty_<?php echo $i; ?>" value="{{$item->quantity}}" ></td>

									<td class="product-total"><?php
									$total = $item->price * $item->quantity;
									echo $total;?></td>
								</tr>
								@endforeach
								<script type="text/javascript">
									// product_id=$item->id , id='_'.$i
									function updateQty(cart_id,id){

										// alert(product_id);
										// + is equal to concancenate
										var qty =parseInt($('#qty'+id).val());
										// alert(qty);
										 // $.ajaxSetup({
							    //               headers: {
							    //                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							    //               }
							    //           });
							               jQuery.ajax({
							                  url: "{{ url('updateQty') }}",
							                  method: 'post',
							                  data: {
							                  	"_token": "{{ csrf_token() }}",
							                     qty: qty,
							                     cart_id: cart_id,
							                   
							                  },
							                  success: function(result){
							                   window.location.reload();   console.log(result.status);
							                  }});

									}
								</script>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<?php $subtotal=0; ?>
									<td>
									@foreach($product as $item)
									<?php 
                                    $total=0;
                                    
									$total = $item->price * $item->quantity;
									$subtotal += $total;
									 
									?>
									@endforeach
                              
									<?php $curr = '$'; echo  $curr.''.$subtotal;?>
									</td>
								</tr>
							<tr class="total-data">
									<td><strong>Taxes(10%) : </strong></td>
									<td><?php $tax =  $subtotal*10/100; echo $curr."".$tax;?></td>
								</tr>
								<tr class="total-data">
									<td><strong> Grand Total: </strong></td>
								
									<td><?php $gtotal=0; 
									$gtotal = (float)$subtotal + (float)$tax;  ?><?php echo $curr."".(float)$gtotal; ?></td>
								</tr>
							
							</tbody>
						</table>
						<div class="cart-buttons">
							<!-- <a href="cart.html" class="boxed-btn">Update Cart</a> -->
							<a href="{{ url('checkout') }}" class="boxed-btn black">Check Out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
