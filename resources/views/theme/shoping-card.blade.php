@extends('theme.layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 m-auto bg-light">
				<div class="cart display-single-price"> 
				<div class="page-title p-3 text-center">
					<h1>Shopping Cart</h1>
				</div> 
				<div class="row align-items-center justify-content-center mb-5 mt-md-5">
					<div class="col-sm-4 mb-3 mb-sm-0">
						<button type="button" title="Continue Shopping" class="btn btn-light btn-lg bg-warning text-white btn-block btn-continue" onclick=""><span><span>Continue Shopping</span></span></button>
					</div>
					<div class="col-sm-4">
						<ul class="checkout-types top list-unstyled"> 
							<li>    
								<button type="button" title="Proceed to Checkout" class="button btn bg-danger btn-proceed-checkout btn-block btn-lg text-white" onclick=""><span><span>Proceed to Checkout</span></span></button>
							</li>
						</ul>
					</div>
				</div> 
				<form action="https://www.woodlandmanufacturing.com/checkout/cart/updatePost/" method="post" class="mb-6">
					<input name="form_key" type="hidden" value="xaUthRZKmRM4n14I"> 
						<div class="card mb-3">  
							<div class="row">
							  <div class="col-md-12 col-lg-3 d-none d-sm-block">
								<div class="card-body">
									  <a href="https://www.woodlandmanufacturing.com/aluminum-letter.html" title="Aluminum Letters - Natural Satin" class="product-image">
									<img class="img-fluid rounded" src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_360,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letters.jpg" alt="Aluminum Letters - Natural Satin">
									  </a>
								</div>
							  </div>
							  <div class="col-sm-12 col-lg-9">
								<div class="card-body">

								  <div class="row align-items-center">
									<div class="col-md-12 d-sm-none">
									  <div>
										  <a href="https://www.woodlandmanufacturing.com/aluminum-letter.html" title="Aluminum Letters - Natural Satin" class="product-image">
										<img class="img-fluid rounded" src="https://res.cloudinary.com/woodland/image/upload/ar_1,c_crop/f_auto,h_360,q_auto,w_360/d_ni.png/v1/woodland_media/media/catalog/product/b/r/brushed-metal-letters.jpg" alt="Aluminum Letters - Natural Satin">
										  </a>
									  </div>
									</div>
									<div class="col-md-12">
									  <div class="row align-items-center">
										<div class="col">
										  <div>
											<h4 class="my-2 product-name">
											  <a href="https://www.woodlandmanufacturing.com/aluminum-letter.html">Aluminum Letters - Natural Satin</a>
											</h4> 
										  </div>
										</div>
										<div class="col-12 col-sm-auto"> 
											  <a href="" rel="nofollow" title="Edit item parameters" class="text-warning">Edit</a> | <a href="" title="Remove Item" class="text-danger">Remove</a>  
										</div>
									  </div>
									</div>
								  </div>
								</div>
								  <div class="row">
									<div class="col">
									  <div>
										<table class="table table-shopping-cart">
										  <tbody><tr class="item-price-row">
												<td class="cart-details">
													<a data-toggle="collapse" class="collapse-link collapsed text-warning" href="#collapse-817112">Details</a>
												</td>
											<th class="text-right cart-header">
											  Item Price
											</th>
											<td class="text-right cart-values"> 
												<div class="product-cart-price" data-rwd-label="Price" data-rwd-tax-label="Excl. Tax">
													<span class="cart-price">
													<span class="price">$206.00</span>              </span>
											  </div>
											</td>
										  </tr>
											<tr class="collapse" id="collapse-817112">
												<td colspan="3">
													<dl class="item-options">
													<dt>Enter Text</dt>
													<dd><strong>Text:</strong> asda<br><strong>Font:</strong> Basic Serif<br><strong>Height:</strong> 7 inch<br><strong>Thickness:</strong> 3/8 inch<br><strong>Letter Count:</strong> 4 @ $47.00 each<br><strong>Mounting Hardware:</strong> Projected Jam Nut Stud Mount ($4.50 per letter)<br><strong>Approximate Width:</strong> 19.3"<br>                                          </dd>
													<dt>My Text</dt>
													<dd><div class="vtImage"><div class="vtLine"><img src="https://sx9kah-rk5vu5tke0is.cloudmaestro.com/hN-j71tya/viewerTool/includes/tmp_images/68xNa019c86aa8a762d4a431bca5edca86264.gif.pagespeed.ic.Yf9NN9bWPk.webp" width="67.5" class="img1"></div></div>                                          </dd>
													</dl>
												</td>
											</tr> 
											  <tr class="item-quantities-row">
												<td class="">
												  &nbsp;
												</td>
												<th class="text-right">
												  Quantity
												</th>
												<td class="text-right">  
												  <div class="input-group input-group-sm ml-auto" style="max-width: 146px !important;">
													<input type="text" pattern="\d*(\.\d+)?" name="cart[817112][qty]" value="1" size="4" data-cart-item-id="wdm_metal_natural_satin_aluminum_letters" title="Qty" class="input-text qty form-control" maxlength="12" style="margin-left: auto;">
													<div class="input-group-append">
													  <button type="submit" name="update_cart_action" data-cart-item-update="" value="update_qty" title="Update" class="btn bg-warning text-white border">Update</button>
													</div>
												  </div>

												</td>
											  </tr>
											  <tr class="item-totals-row">
												<td class="">
												  &nbsp;
												</td>
												<th class="text-right">
												  Item Total
												</th>
												<td class="text-right"> 
														<span class="cart-price"> 
															<span class="price">$206.00</span>              
														</span> 
												</td>
											  </tr>
											</tbody>
										</table>
									  </div>
									</div>
								  </div> 
							  </div>
							</div> 
						</div> 
					<script type="text/javascript">decorateTable('shopping-cart-table')</script>
				</form>

				<div class="row justify-content-end">
					<div class="col-sm-6 col-md-12 col-lg-4 order-last">
						<div class="cart-forms">
							<div class="shipping mb-4">
								<h4>Estimate Shipping</h4>
								<div class="shipping-form" id="shipping-form">
					
								<form id="co-shipping-method-form" action="https://www.woodlandmanufacturing.com/checkout/cart/estimateUpdatePost/">
									<dl class="sp-methods"> 
										<ul class="list-unstyled">
											<li>
												<div class="form-group form-check small-radio">  
												<input name="estimate_method" type="radio" value="matrixrate_matrixrate_448" id="s1_method_matrixrate_matrixrate_448" class="form-check-input radio">
												<label class="form-check-label" for="s1_method_matrixrate_matrixrate_448">
												<span class="price">$19.99</span>  - Standard (3-6 Business Days + Manufacturing) </label>
												</div>
											</li>
											<li>
												<div class="form-group form-check small-radio"> 
													<input name="estimate_method" type="radio" value="matrixrate_matrixrate_455" id="s1_method_matrixrate_matrixrate_455" class="form-check-input radio">
													<label class="form-check-label" for="s1_method_matrixrate_matrixrate_455">
														<span class="price">$36.99</span>- 3Day + Manufacturing
													</label>
												</div>
										   </li>
											<li>
											<div class="form-group form-check small-radio">  
												<input name="estimate_method" type="radio" value="matrixrate_matrixrate_462" id="s1_method_matrixrate_matrixrate_462" class="form-check-input radio">
												<label class="form-check-label" for="s1_method_matrixrate_matrixrate_462">
												<span class="price">$44.99</span> - 2Day + Manufacturing </label>
											</div>
											</li>
											<li>
											<div class="form-group form-check small-radio">
												<input name="estimate_method" type="radio" value="matrixrate_matrixrate_469" id="s1_method_matrixrate_matrixrate_469" class="form-check-input radio">
												<label class="form-check-label" for="s1_method_matrixrate_matrixrate_469">
												<span class="price">$51.99</span>- Overnight + Manufacturing</label>
											</div>
											</li>
										</ul>
									</dl>
									<div class="buttons-set">
										<button type="submit" title="Update Total" class="btn btn-light" name="do" value="Update Total">
											<span><span>Update Shipping Method</span></span>
										</button>
									</div>
									<input name="form_key" type="hidden" value="xaUthRZKmRM4n14I">
								</form>
								<script type="text/javascript">//<![CDATA[
									var coShippingMethodForm=new VarienForm('shipping-zip-form');
									var countriesWithOptionalZip=["HK","IE","MO","PA"];
									coShippingMethodForm.submit=function()
									{
										var country=$F('country');
										var optionalZip=false;
										for(i=0;i<countriesWithOptionalZip.length;i++){
											if(countriesWithOptionalZip[i]==country){optionalZip=true;}
										}
										if(optionalZip)
										{$('postcode').removeClassName('required-entry');}
										else{$('postcode').addClassName('required-entry');}
										return VarienForm.prototype.submit.bind(coShippingMethodForm)();
									}
								//]]>
								</script>
							</div>
						</div>
						<div class="deals deals-coupon">
						<form id="discount-coupon-form" action="https://www.woodlandmanufacturing.com/checkout/cart/couponPost/" method="post">

						  <div class="discount">
							<a href="#coupon-collapse" class="collapse-link collapsed link-body" data-toggle="collapse">Add Coupon Code</a>
							<div id="coupon-collapse" class="collapse discount-form">
							  <input type="hidden" name="remove" id="remove-coupone" value="0">
							  <div class="input-group my-3">
								<input class="form-control" type="text" id="coupon_code" name="coupon_code" value="">
								<div class="input-group-append">
											<button type="button" title="Apply" class="btn btn-light" onclick="discountForm.submit(false)" value="Apply">Apply</button>
								  
								</div>
							  </div>
							</div>
						  </div>
						</form>
						<script type="text/javascript">//<![CDATA[
						var discountForm=new VarienForm('discount-coupon-form');discountForm.submit=function(isRemove){if(isRemove){$('coupon_code').removeClassName('required-entry');$('remove-coupone').value="1";}else{$('coupon_code').addClassName('required-entry');$('remove-coupone').value="0";}return VarienForm.prototype.submit.bind(discountForm)();}
						//]]></script>
						</div>
					</div>
					<div class="cart-totals-wrapper">
						<div class="cart-totals">
							<table id="shopping-cart-totals-table" class="table">
								<colgroup><col>
								<col width="1">
								</colgroup><tfoot>
										<tr class="grand-total item-totals-row">
								<th style="" class="a-right" colspan="1">
									Grand Total        </th>
								<td style="" id="checkout_grand_total_parent" class="a-right value">
									<span class="price">$206.00</span>        </td>
									</tr>
										</tfoot>
										<tbody>
											<tr class="item-totals-row">
									<th style="" class="a-right" colspan="1">
										Subtotal    </th>
									<td style="" class="a-right">
								<span class="price">$206.00</span>    </td>
								</tr>
								</tbody>
							</table>
							<ul class="checkout-types bottom  list-unstyled"> 
								<li class="method-checkout-cart-methods-onepage-bottom&quot;">
									<button type="button" title="Proceed to Checkout" class="button btn btn-proceed-checkout btn-block btn-lg bg-warning text-white" onclick="window.location='https://www.woodlandmanufacturing.com/onestepcheckout/';"><span><span>Proceed to Checkout</span></span></button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> 
		</div> 
        <script type="text/javascript">if(typeof dataLayer!=='undefined'){dataLayer.push({'event':'removeFromCart','ecommerce':{'remove':{'products':[{'name':'Painted Metal Letters','id':'114947','price':'487.65','quantity':1}]}}});}</script>
	</div>
</div>
</div><br>
@endsection