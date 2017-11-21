<?php $__env->startSection('title','Checkout'); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1">
			<li><a href="<?php echo e(route('shop.index')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li class="active">Checkout Page</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
	<div class="container">
		<h2>Your shopping cart contains: <span>3 Products</span></h2>
		<div class="checkout-right">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>SL No.</th>	
						<th>Product</th>
						<th>Quality</th>
						<th>Product Name</th>
						
						<th>Price</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tr class="rem1">
					<td class="invert">1</td>
					<td class="invert-image"><a href="single.html"><img src="images/1.png" alt=" " class="img-responsive" /></a></td>
					<td class="invert">
						<div class="quantity"> 
							<div class="quantity-select">                           
								<div class="entry value-minus">&nbsp;</div>
								<div class="entry value"><span>1</span></div>
								<div class="entry value-plus active">&nbsp;</div>
							</div>
						</div>
					</td>
					<td class="invert">Tata Salt</td>

					<td class="invert">$290.00</td>
					<td class="invert">
						<div class="rem">
							<div class="close1"> </div>
						</div>
						<script>$(document).ready(function(c) {
							$('.close1').on('click', function(c){
								$('.rem1').fadeOut('slow', function(c){
									$('.rem1').remove();
								});
							});	  
						});
					</script>
				</td>
			</tr>
			<tr class="rem2">
				<td class="invert">2</td>
				<td class="invert-image"><a href="single.html"><img src="images/2.png" alt=" " class="img-responsive" /></a></td>
				<td class="invert">
					<div class="quantity"> 
						<div class="quantity-select">                           
							<div class="entry value-minus">&nbsp;</div>
							<div class="entry value"><span>1</span></div>
							<div class="entry value-plus active">&nbsp;</div>
						</div>
					</div>
				</td>
				<td class="invert">Fortune oil</td>

				<td class="invert">$250.00</td>
				<td class="invert">
					<div class="rem">
						<div class="close2"> </div>
					</div>
					<script>$(document).ready(function(c) {
						$('.close2').on('click', function(c){
							$('.rem2').fadeOut('slow', function(c){
								$('.rem2').remove();
							});
						});	  
					});
				</script>
			</td>
		</tr>
		<tr class="rem3">
			<td class="invert">3</td>
			<td class="invert-image"><a href="single.html"><img src="images/3.png" alt=" " class="img-responsive" /></a></td>
			<td class="invert">
				<div class="quantity"> 
					<div class="quantity-select">                           
						<div class="entry value-minus">&nbsp;</div>
						<div class="entry value"><span>1</span></div>
						<div class="entry value-plus active">&nbsp;</div>
					</div>
				</div>
			</td>
			<td class="invert">Aashirvaad atta</td>

			<td class="invert">$15.00</td>
			<td class="invert">
				<div class="rem">
					<div class="close3"> </div>
				</div>
				<script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.rem3').fadeOut('slow', function(c){
							$('.rem3').remove();
						});
					});	  
				});
			</script>
		</td>
	</tr>
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
</table>
</div>
<div class="checkout-left">	
	<div class="checkout-left-basket">
		<h4>Continue to basket</h4>
		<ul>
			<li>Product1 <i>-</i> <span>$15.00 </span></li>
			<li>Product2 <i>-</i> <span>$25.00 </span></li>
			<li>Product3 <i>-</i> <span>$29.00 </span></li>
			<li>Total Service Charges <i>-</i> <span>$15.00</span></li>
			<li>Total <i>-</i> <span>$84.00</span></li>
		</ul>
	</div>
	<div class="checkout-right-basket">
		<a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
	</div>
	<div class="checkout-right-basket" style="margin-right:1%">
		<a href="<?php echo e(URL::to('index')); ?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
	</div>
	
	<div class="clearfix"> </div>
	<!--modal-->
	



	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog-sm" style="position: relative;
    overflow-y: auto;
    max-height: 400px;
    padding: 5%;">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Pilih Bank & Kurir</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="col-sm-6">
							<div class=" form-group">
								<label>Nama Produk </label>
								<label style="width: 100%;
								height: 34px;
								padding: 6px 12px;
								font-size: 16px;
								line-height: 1.42857143;color: orange">Beras Mlati</label>
							</div>

						</div>
						<div class="col-sm-6">
							<div class=" form-group">
								<label>Note :</label>
								<textarea class="form-control" rows="4" cols="30">note...</textarea>
							</div>
						</div>
						<div class="col-sm-3 form-group">
								<label>Jumlah Barang</label>
								<input type="text" name="" class="form-control" value="1">
							</div>
							<div class="col-sm-3 form-group">
								<label>Harga Barang</label>
								<label style="width: 100%;
								height: 34px;
								padding: 6px 12px;
								font-size: 16px;
								line-height: 1.42857143;color: grey">Beras Mlati</label>
							</div>	

					</div>
					<hr>
					<div class="breadcrumbs">
						<div class="container">
							<div class="col-sm-12 form-group">
								<label>User</label><i class="fa fa-map-marker" style="margin-left: 0.5%"></i>
								<label style="width: 100%;
								height: 34px;
								padding: 6px 12px;
								font-size: 14px;
								line-height: 1.42857143;color: grey">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</label>
							</div>
						</div>
					</div>
					<hr>
					<div class="container">	

						<form>
							<div class="col-sm-3">
								<div class=" form-group">
									<label>Pilih Bank</label>
									<select class="form-control">
										<option>BCA</option>
										<option>MANDIRI</option>
									</select>
								</div>
							</div>
							<div class="col-sm-9">
								<div class=" form-group">
									<label>A/N</label>
									<label style="width: 100%;
									height: 34px;
									padding: 6px 12px;
									font-size: 14px;
									line-height: 1.42857143;color: grey">KIPAY</label>
								</div>
							</div>
							<div class="col-sm-3 form-group">
								<label>Kurir Pengiriman</label>
								<select class="form-control">
									<option>JNE</option>
									<option>SICEPAT</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label>Paket Pengiriman</label>
								<select class="form-control">
									<option>REGULER</option>
									<option>EXPRESS</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label>Biaya Asuransi</label>
								<select class="form-control">
									<option>YA</option>
									<option>TIDAK</option>
								</select>
							</div>
							<div class="col-sm-3 form-group">
								<label>Ongkos Kirim</label>
								<label style="width: 100%;
								height: 34px;
								padding: 6px 12px;
								font-size: 14px;
								line-height: 1.42857143;color: grey">aaa</label>
							</div>


						</form>
					</div>
				</div>

				<div class="modal-footer">
					<a type="submit" class="btn btn-danger" href="<?php echo e(URL::to('checkout_berhasil')); ?>">Next</a>


				</div>
			</div>

		</div>
	</div> 
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>