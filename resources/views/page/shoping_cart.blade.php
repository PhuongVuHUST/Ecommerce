@extends('page.layout.master')
@section('header.css')
@endsection
@section('content')
			<!-- breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="index.html" class="icon icon-home"></a></li>					
					<li><a href="#">Women’s</a></li>
					<li class="active">Dresses</li>
				</ol>
			</div>
		</div>
		<!-- /breadcrumbs --> 
		<!-- CONTENT section -->
		<div id="pageContent">
			<div class="container">				
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center text-uppercase title-under">SHOPPING CART</h1>
				</div>
				<!-- /title -->
				<div class="row">
					<section class="col-md-8 col-lg-8">
						<!-- Shopping cart table -->
						<div class="container-widget">
							<table class="shopping-cart-table">
								<thead>
									<tr>
										<th>Product</th>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th>Unit Price</th>
										<th>Qty</th>
										<th>Subtotal</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="shopping-cart-table__product-image">
												<a href="product.html">
													<img class="img-responsive" src="images/product/product-4.jpg" alt="">
												</a>
											</div>
										</td>
										<td>
											<h5 class="shopping-cart-table__product-name text-left text-uppercase">
												<a href="product.html">Mauris lacinia lectus</a>
											</h5>
											<ul class="shopping-cart-table__list-parameters">
												<li>
													<span>Color:</span> Purple
												</li>
												<li>
													<span>Quantity:</span> 200
												</li>
												<li>
													<span>Image:</span> No
												</li>
												<li>
													<span>Paper:</span> Type Linen 
												</li>
												<li>
													<span>Size:</span> 4"x3.5"
												</li>
												<li class="visible-xs">
													<span>Price:</span>
													<span class="price-mobile">$28.00</span>
												</li>
												<li class="visible-xs">
													<span>Qty:</span>
													<!--  -->
													<div class="number input-counter">
													    <span class="minus-btn"></span>
													    <input type="text" value="1" size="5"/>
													    <span class="plus-btn"></span>
													</div>
													<!-- / -->
												</li>
											</ul>																				
										</td>
										<td>
											<a class="shopping-cart-table__create icon icon-create " href="#"></a>
											<a class="shopping-cart-table__delete icon icon-delete visible-xs" href="#"></a>
										</td>
										<td>
											<div class="shopping-cart-table__product-price unit-price">
												$1000
											</div>
										</td>
										<td>
											<div class="shopping-cart-table__input">
												<!--  -->
												<div class="number input-counter">
												    <span class="minus-btn"></span>
												    <input type="text" value="1" size="5"/>
												    <span class="plus-btn"></span>
												</div>
												<!-- / -->
											</div>								
										</td>
										<td>
											<div class="shopping-cart-table__product-price subtotal">
												$1000
											</div>
										</td>
										<td>
											<a class="shopping-cart-table__delete icon icon-clear" href="#"></a>
										</td>
									</tr>								
									<tr>
										<td>
											<div class="shopping-cart-table__product-image">
												<a href="product.html">
													<img class="img-responsive" src="images/product/product-4.jpg" alt="">
												</a>
											</div>
										</td>
										<td>
											<h5 class="shopping-cart-table__product-name text-left text-uppercase">
												<a href="product.html">Mauris lacinia lectus</a>
											</h5>
											<ul class="shopping-cart-table__list-parameters">
												<li>
													<span>Color:</span> Purple
												</li>
												<li>
													<span>Quantity:</span> 200
												</li>
												<li>
													<span>Image:</span> No
												</li>
												<li>
													<span>Paper:</span> Type Linen 
												</li>
												<li>
													<span>Size:</span> 4"x3.5"
												</li>
												<li class="visible-xs">
													<span>Price:</span>
													<span class="price-mobile">$28.00</span>
												</li>
												<li class="visible-xs">
													<span>Qty:</span>
													<!--  -->
													<div class="number input-counter">
													    <span class="minus-btn"></span>
													    <input type="text" value="1" size="5"/>
													    <span class="plus-btn"></span>
													</div>
													<!-- / -->
												</li>
											</ul>																				
										</td>
										<td>
											<a class="shopping-cart-table__create icon icon-create " href="#"></a>
											<a class="shopping-cart-table__delete icon icon-delete visible-xs" href="#"></a>
										</td>
										<td>
											<div class="shopping-cart-table__product-price unit-price">
												$28.00
											</div>
										</td>
										<td>
											<div class="shopping-cart-table__input">
												<!--  -->
												<div class="number input-counter">
												    <span class="minus-btn"></span>
												    <input type="text" value="1" size="5"/>
												    <span class="plus-btn"></span>
												</div>
												<!-- / -->
											</div>								
										</td>
										<td>
											<div class="shopping-cart-table__product-price subtotal">
												$28.00
											</div>
										</td>
										<td>
											<a class="shopping-cart-table__delete icon icon-clear" href="#"></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- /Shopping cart table -->						
						<!-- button -->
						<div class="divider divider--xs"></div>
						<div class="row shopping-cart-btns">
							<div class="col-xs-12 col-sm-8 col-md-8">
				              <a class="btn btn--ys btn--light pull-left btn-right" href="#"><span class="icon icon-keyboard_arrow_left"></span>CONTINUE SHOPPING </a>         
				              <div class="divider divider--xs visible-xs"></div>
				              <a class="btn btn--ys btn--light" href="#"><span class="icon icon-delete"></span>CLEAR SHOPPING CART</a>
				                           
				            </div>		           
				            <div class="divider divider--xs visible-xs"></div>
		 					<div class="col-xs-12 col-sm-4 col-md-4 pull-left">
				            	<a class="btn btn--ys btn--light pull-right" href="#"><span class="icon icon-autorenew"></span>UPDATE SHOPPING CART</a>
				            </div>
				        </div>	
						<!-- /button -->
						<div class="divider visible-sm visible-xs"></div>
					</section>
					<aside class="col-md-4 col-lg-4 shopping_cart-aside">
						<!--  -->
						<div class="collapse-block open card card--padding fill-bg">
							<h4 class="collapse-block__title">ESTIMATE SHIPPING AND TAX</h4>
							<div class="collapse-block__content">
								<p>Enter your destination to get a shipping estimate.</p>
								<form>
								<div class="form-group">
									<label  for="selectCountry">Country <sup>*</sup></label>
									<select  id="selectCountry" class="form-control selectpicker "  data-style="select--ys"  data-width="100%">					                   
										<option>Austria </option>
					                    <option>Belgium</option>
					                    <option>Cyprus </option>
					                    <option>Croatia </option>
					                    <option>Czech Republic </option>
					                    <option>Denmark </option>
					                    <option>Finland </option>
					                    <option>France </option>
					                    <option>Germany </option>
					                    <option>Greece </option>
					                    <option>Hungary </option>
					                    <option>Ireland </option>
					                    <option>France </option>
					                    <option>Italy </option>
					                    <option>Luxembourg </option>
					                    <option>Netherlands </option>
					                    <option>Poland </option>
					                    <option>Portugal </option>
					                    <option>Slovakia </option>
					                    <option>Slovenia </option>
					                    <option>Spain </option>
					                    <option>United Kingdom </option>
					                </select>									
								</div>									
								<div class="form-group">
									<label  for="selectState">State/Province <sup>*</sup></label>
									<select  id="selectState" class="form-control selectpicker "  data-style="select--ys"  data-width="100%">										
										<option>State/Province </option>
					                    <option>Austria </option>
					                    <option>Belgium</option>
					                    <option>Cyprus </option>
					                    <option>Croatia </option>
					                    <option>Czech Republic </option>
					                    <option>Denmark </option>
					                    <option>Finland </option>
					                    <option>France </option>
					                    <option>Germany </option>
					                    <option>Greece </option>
					                    <option>Hungary </option>
					                    <option>Ireland </option>
					                    <option>France </option>
					                    <option>Italy </option>
					                    <option>Luxembourg </option>
					                    <option>Netherlands </option>
					                    <option>Poland </option>
					                    <option>Portugal </option>
					                    <option>Slovakia </option>
					                    <option>Slovenia </option>
					                    <option>Spain </option>
					                    <option>United Kingdom </option>
									</select>
								</div>
								<div class="form-group">
							      <label for="inputCity">City</label>
							      <input type="text" class="form-control" id="inputCity">
							    </div>
							    <div class="form-group">
							      <label for="inputZip">Zip/Postal Code</label>
							      <input type="text" class="form-control" id="inputZip">
							    </div>
							    <button type="submit" class="btn btn-top btn--ys">Get a quote</button>
							</form>
							</div>
						</div>
						<!-- / -->						
						<div class="divider--md"></div>
						<!-- DISCOUNT CODES -->
						<div class="collapse-block card card--padding fill-bg">
							<h4 class="collapse-block__title">DISCOUNT CODES</h4>
							<div class="collapse-block__content">
								<form>
									<div class="form-group">
								      <label for="inputDiscountCodes">Enter your coupon code if you have one.</label>
								      <input type="text" class="form-control" id="inputDiscountCodes">
								    </div>
									<button type="submit" class="btn btn--ys btn-top">apply coupon</button>
								</form>	
							</div>
						</div>						
						<!-- /DISCOUNT CODES -->
						<div class="divider--md"></div>
						<!-- GRAND TOTAL -->
						<div class="card card--padding fill-bg">
							<table class="table-total">
								<tbody>
									<tr>
										<th class="text-left">Subtotal:</th>
										<td class="text-right">$28.00</td>
									</tr>
									<tr>
										<th class="text-left">Tax:</th>
										<td class="text-right">$28.00</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>GRAND TOTAL:</th>
										<td>$56.00</td>
									</tr>
								</tfoot>
							</table>
							<a href="#" class="btn btn--ys btn--full btn--xl">PROCEED TO CHECKOUT <span class="icon icon-reply icon--flippedX"></span></a>
							<div class="text-right link-top">
								<a class="link-underline" href="#">Checkout with Multiple Addresses</a>
							</div>
						</div>
						<!-- /GRAND TOTAL -->
					</aside>
				</div>		
				
				
				
							
			</div>
		</div>
		<!-- End CONTENT section --> 
@endsection
