@extends('layouts.frontend')
@section('title','Salwar Kameez')
@section('content')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form id="checkout-form" class="clearfix">
				<div class="col-md-6">
					<div class="billing-details">
						<p>Already a customer ? <a href="#">Login</a></p>
						<div class="section-title">
							<h3 class="title">Billing Details</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="first-name" placeholder="First Name">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="last-name" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="city" placeholder="City">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="country" placeholder="Country">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone">
						</div>
						<div class="form-group">
							<div class="input-checkbox">
								<input type="checkbox" id="register">
								<label class="font-weak" for="register">Create Account?</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt.
										<p>
											<input class="input" type="password" name="password"
												placeholder="Enter Your Password">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">

					<div class="payments-methods">
						<div class="section-title">
							<h4 class="title">Payments Methods</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-1" checked>
							<label for="payments-1">Cash on Delivery</label>
							<div class="caption">
								<p>Please provide cash on receiving your produce. Thank you.
									<p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Cart Review</h3>
						</div>
						@if (count($carts)>0)
						<table id="cart_table" class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Image</th>
									<th> Name </th>
									<th class="text-center">Price</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Total</th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody>
								@php
								$total = 0;
								@endphp
								@foreach ($carts as $cart)

								<tr class="rows">
									<td class="thumb"><img
											src="{{asset('thumb_product_images/'.$cart->product->displayImage->image)}}"
											alt=""></td>
									<td class="details">
										<a href="#">{{$cart->product->title}}</a>
									</td>
									<td class="text-center product_price"><strong>{{$cart->product->price}} <img
												style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

									{{-- Quantity --}}
									<td class="qty text-center"><input min="1" class="input quantity" type="number"
											disabled data-value="{{$cart->id}}" value="{{$cart->quantity}}">
									</td>
									{{-- price --}}
									<td class="total1 text-center"><strong class="primary-color">
											@php
											$total += $cart->product->price * $cart->quantity;
											@endphp
											<div style="display:inline" class="view">
												{{$cart->product->price * $cart->quantity}}
											</div>
											<img style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

								</tr>
								@endforeach

							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>SUBTOTAL</th>
									<th colspan="2" id="" class="sub-total">
										<div style="display:inline" id="sub_total">{{$total}}</div><img
											style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt="">
									</th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>SHIPING</th>
									<th colspan="2" class="sub-total">50<img style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt=""></th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" class="total">
										<div style="display:inline" id="total">{{$total+50}}</div>
										<img style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt="">
									</th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<button id="checkout" class="primary-btn">Place Order</button>
						</div>
						@else
						<h1>Nothing has added to cart.</h1>
						@endif
					</div>

				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection