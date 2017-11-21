	
	<?php $__env->startSection('title','Checkout'); ?>
	<?php $__env->startSection('content'); ?>
	<meta name="csrf-token" content="<?php echo e(Session::token()); ?>">
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
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class=" form-group">
					<label>Kode Transaksi</label>
					<input type="text" id="kode" class="form-control">
				</div>
				<a href="#" class="btn btn-danger" onclick="GetTrans();">Cek</a>
			</div>
			<div class="col-sm-9">
				<div class=" form-group">
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="checkout">
	<div class="container">
		<div class="checkout-right">
					<div id="cek" name="cek">

					</div>


				<!--quantity-->
<!-- 	<script>
		$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);
		});
	</script> -->
	<!--quantity-->
</table>
</div>



<br>

</div>

<div class="clearfix"> </div>
<!--modal-->




		
</div> 
</div>
</div>
</div>
<script type="text/javascript">
	var harga = [];
	$(window).load(function() 
	{
		 // alert(paypal.minicart.cart.items);
		 var produk = [];
		 var items = paypal.minicart.cart.items();
		// alert(items[1].get("item_name"));
		for (i = 0; i < items.length; i++)
		{
			produk.push(items[i].get("item_name"));
		}
		// document.getElementById("merk").innerHTML = op;
		// alert(produk);
	});

	function GetTrans()
	{
		var d = document.getElementById("kode").value;
		$.post('http://localhost:8000/gettrans', {
			_token: $('meta[name=csrf-token]').attr('content'),
			kode: d
		}
		)
		.done(function(data) {
			$('#cek').append(data);
		})
		.fail(function() {
			alert( "error" );
		});
	}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>