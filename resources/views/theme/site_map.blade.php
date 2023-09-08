@extends('theme.layouts.master') 
	@section('content') 
	<div class="container-fluid bg-white">
		<div class="">  
			<div class="" style=""> 
				<div class="jumbotron jumbotron_services_banner d-flex justify-content-sm-center">
					<div class="align-self-lg-end align-self-sm-center w-lg-25 ml-lg-auto text-center">   
						<h4 class="text-warning"> 
							SHIPPING INFORMATION 
						</h4>  
						<p class="lead text-white"> 
							Custom Made Signs - Fast Turnaround
						</p> 
					</div>
				</div> 
			</div> 
		</div> 
	</div> 
	<div class="container bg-white">
		<div class="row">
			<div class="col-md-12"> 
				<div class="page-head">  
					<p class="p-2">
						We customize all the ordered products which may cause it to take a little time. These are products made especially for you and it's all made according to your liking. Once you order and pay for your customized product, that's when the whole shipping process begins.
					</p>
					<h5 class="p-1">United States Shipping</h5>  
					<p class="p-2">
						If you order within the United States then you shall receive the parcel in 2-5 business days.
						However, orders from Alaska and Hawaii shall receive their parcel in 3-5 business days.

					</p>
					<h5 class="p-1">United States Shipping Rates</h5>  
					<p class="p-2 text-info">
						<a href="#" class="toggle text-warning" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Click here to show rates</a>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
							<table class="shipping-rate-table table border table-responsive" style="margin-top: 8px;">
								<tbody>
									<tr class="shiptoprow"><th>Order Size</th><th>Standard (3-6 Business Days + Manufacturing)</th><th>3Day + Manufacturing</th><th>2Day + Manufacturing</th><th>Overnight + Manufacturing</th></tr>
									<tr>
										<th>Up to $24.99</th>
										<td>$6.99</td>
										<td>$18.99</td>
										<td>$32.99</td>
										<td>$42.99</td>
									</tr>
									<tr>
										<th>$25.00 - $49.99</th>
										<td>$7.99</td>
										<td>$20.99</td>
										<td>$36.99</td>
										<td>$44.99</td>
									</tr>
									<tr><th>$50.00 - $74.99</th><td>$8.99</td><td>$21.99</td><td>$38.99</td><td>$46.99</td></tr>
									<tr><th>$75.00 - $99.99</th><td>$9.99</td><td>$22.99</td><td>$41.99</td><td>$48.99</td></tr>
									<tr><th>$100.00 - $199.99</th><td>$12.99</td><td>$29.99</td><td>$42.99</td><td>$50.99</td></tr>
									<tr><th>$200.00 - $499.99</th><td>$19.99</td><td>$36.99</td><td>$44.99</td><td>$51.99</td></tr>
									<tr><th>$500.00+</th><td>$32.99</td><td>$46.99</td><td>$52.99</td><td>$62.99</td></tr>
								</tbody>
							</table>
						</div>
					</p>
					<h5 class="p-1">Oversized Shipping</h5>  
					<p class="p-2">
						If you have ordered a product that requires large packaging, then it is obvious that you will have to pay more for the shipping cost. For domestic packages that are 24 inches or larger, you will be required to pay an oversized shipping fee for it. For international packages that are over 12 inches or weigh 5 pounds or more, you will be charged an extra fee.
						
					</p>
					<h5 class="p-1">Oversized Shipping Rates</h5>  
					<p class="p-2">
						<a class="text-warning" data-toggle="collapse" href="#toggle-oversized" style="margin-top: 6px;" aria-expanded="true">Click here to show rates</a>
						<div class="collapse" id="toggle-oversized" style="">
							<table class="shipping-rate-table table border table-responsive" style="margin-top: 8px;">
								<tbody>
									<tr class="shiptoprow"><th>Order Size</th><th>Height</th>
										<th>Standard (3-6 Business Days + Manufacturing)</th>
										<th>3Day + Manufacturing</th><th>2Day + Manufacturing</th>
										<th>Overnight + Manufacturing</th>
										<th>FedEx Canada</th>
										<th>FedEx International</th>
										<th>USPS Canada</th>
									</tr>
									<tr>
									<th>
										<strong>23"</strong>
									</th>
									<th>
										<strong>12"</strong>
									</th>
									<td> --</td><td> --</td><td> --</td><td> --</td><td> $15.00</td><td> $25.00</td><td> $100.00</td></tr>
									<tr>
										<th><strong>31"</strong></th><th><strong>18"</strong></th>
										<td> --</td>
										<td> --</td><td> --</td><td> --</td><td> $30.00</td><td> $45.00</td><td> $120.00</td>
									</tr>
									<tr><th><strong>35"</strong></th><th><strong>24"</strong></th><td> $18.99</td>
										<td> $49.99</td><td> $69.99</td><td> $99.99</td><td> $65.00</td><td> $95.00</td><td> $140.00</td>
									</tr>
									<tr>
										<th><strong>40"</strong></th><th><strong>30"</strong></th><td> $28.99</td><td> $59.99</td><td> $79.99</td>
										<td> $149.99</td><td> $95.00</td><td> $125.00</td><td> $150.00</td>
									</tr><tr><th><strong>45"</strong></th><th><strong>36"</strong></th><td> $44.99</td><td> $69.99</td><td> $89.99</td>
									<td> $199.99</td><td> $150.00</td><td> $165.00</td><td> $200.00</td></tr><tr><th><strong>50"</strong></th>
									<th><strong>42"</strong></th><td> $88.99</td><td> $99.99</td><td> $129.99</td><td> $299.99</td><td> $195.00</td>
									<td> $225.00</td><td> $250.00</td></tr><tr><th><strong>55"</strong></th><th><strong>46"</strong></th>
									<td> $125.99</td><td> $169.99</td><td> $299.99</td><td> $399.99</td><td> $255.00</td><td> $285.00</td>
									<td> $350.00</td></tr><tr><th><strong>60"</strong></th><th><strong>52"</strong></th><td> $149.99</td>
									<td> $249.99</td><td> $399.99</td><td> $499.99</td><td> $295.00</td><td> $350.00</td><td> $400.00</td>
									</tr><tr><th><strong>"</strong></th><th><strong>"</strong></th><td> --</td><td> --</td><td> --</td><td> --</td>
									<td> --</td><td> --</td><td> --</td></tr><tr><th><strong>"</strong></th><th><strong>"</strong></th><td> --</td>
									<td> --</td><td> --</td><td> --</td><td> --</td><td> --</td><td> --</td></tr>
								</tbody>
							</table>
						</div>
					</p>
					<h5 class="p-1">Canadian Shipping</h5>  
					<p class="p-2">
					Orders of customized products from Canada require the customers to pay customs taxes. These taxes depend on the type of products being shipped and it's the total value. We do not add the extra fees to the total order cost. You are required to pay shipping fees for items that are larger than 12 inches or weigh more than 5 pounds.
					<br>
					<br>
					It is recommended that customers from Canada should ship their packages via UPS. No tracking information shall be provided in case of USPS shipping. We also do not guarantee that the order won't be harmed or lost during shipping via USPS. 
					<br> 
					You will receive your order via UPS in 3-4 business days.
					<br> 
					USPS to Canada transit time is 1-3 weeks. 
					</p>
					<h5 class="p-1">Canada Shipping Rates</h5>  
					<p class="p-2">
						<a class="text-warning" data-toggle="collapse" href="#toggle-canada" style="margin-top: 6px;">Click here to show rates</a>
						<div class="collapse " id="toggle-canada">
							<table class="shipping-rate-table table border table-responsive" style="margin-top: 8px;"><tbody><tr class="shiptoprow"><th>Order Size</th><th>UPS Canada</th><th>USPS Canada</th></tr><tr><th>Up to $9.99</th><td>$21.95</td><td>$14.95</td></tr><tr><th>$10.00 - $24.99</th><td>$24.95</td><td>$18.95</td></tr><tr><th>$25.00 - $49.99</th><td>$27.95</td><td>$21.95</td></tr><tr><th>$50.00 - $74.99</th><td>$29.95</td><td>$23.95</td></tr><tr><th>$75.00 - $99.99</th><td>$32.95</td><td>$29.95</td></tr><tr><th>$100.00 - $124.99</th><td>$37.95</td><td>$35.95</td></tr><tr><th>$125.00 - $149.99</th><td>$42.95</td><td>$35.95</td></tr><tr><th>$150.00 - $174.99</th><td>$52.95</td><td>$35.95</td></tr><tr><th>$175.00 - $199.99</th><td>$67.95</td><td>$35.95</td></tr><tr><th>$200.00 - $249.99</th><td>$87.95</td><td>$35.95</td></tr><tr><th>$250.00 - $299.99</th><td>$99.95</td><td>$35.95</td></tr><tr><th>$300.00 - $399.99</th><td>$114.95</td><td>$35.95</td></tr><tr><th>$400.00 - $499.99</th><td>$124.95</td><td>$35.95</td></tr><tr><th>$500.00+</th><td>$149.95</td><td>$35.95</td></tr></tbody></table>
						</div>
					</p>
					<h5 class="p-1">International Shipping</h5>  
					<p class="p-2">
						All international orders have to go through import duties. Also, custom taxes are mandatory for it. The taxes and import duties depend on what type of product is being shipped and also the country’s laws and requirements are taken into account. We do not add the extra fees to the total order cost. 
						<br>
						When you pay with a credit card, make sure you provide your billing and shipping address. PayPal payments are accepted in case your billing and shipping address do not match each other. Packages that are over 12 inches or weigh 5 pounds or more, you will be charged an extra fee. 
						<br>
						FedEx International transit time is 3-4 business days
						<br>
						USPS transit time is 1-3 weeks 
					</p> 
					<h5 class="p-1">International Shipping Rates</h5>  
					<p class="p-2"> 
						<a  class="text-warning" data-toggle="collapse" href="#toggle-international" style="margin-top: 6px;">Click here to show rates</a>
						<div class="collapse " id="toggle-international">
							<table class="shipping-rate-table table border" style="margin-top: 8px;"><tbody><tr class="shiptoprow"><th>Order Size</th><th>UPS International</th></tr><tr><th>Up to $9.99</th><td>$42.95</td></tr><tr><th>$10.00 - $24.99</th><td>$47.95</td></tr><tr><th>$25.00 - $49.99</th><td>$52.95</td></tr><tr><th>$50.00 - $74.99</th><td>$62.95</td></tr><tr><th>$75.00 - $99.99</th><td>$64.95</td></tr><tr><th>$100.00 - $124.99</th><td>$66.95</td></tr><tr><th>$125.00 - $149.99</th><td>$72.95</td></tr><tr><th>$150.00 - $174.99</th><td>$76.95</td></tr><tr><th>$175.00 - $199.99</th><td>$91.95</td></tr><tr><th>$200.00 - $249.99</th><td>$94.95</td></tr><tr><th>$250.00 - $299.99</th><td>$96.95</td></tr><tr><th>$300.00 - $399.99</th><td>$99.95</td></tr><tr><th>$400.00 - $499.99</th><td>$109.95</td></tr><tr><th>$500.00+</th><td>$124.95</td></tr></tbody></table>
						</div>
					</p>
				</div>
			</div> 
		</div> 
	</div> 
@endsection