<?php $__env->startSection('title','Checkout Berhasil'); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1">
			<li><a href="<?php echo e(URL::to('index')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li >Checkout Page</li>
			<li class="active">Checkout Berhasil</li>
		</ol>
		<div class="container">

		</div>
		
	</div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
	<div class="container">
		<div class="col-md-12" style="border-top: solid;border-left:  solid;border-right:  solid;border-left: solid; text-align: center;padding: 2%;">
			<h3 style="padding: 2%;">Checkout Berhasil</h3>
			<h4 style="padding: 2%;">Mohon Segera Lakukan Pembayaran</h4>
			<h6 style="padding: 2%;">Sisa Waktu Pembayaran</h6>
			<ul style="list-style: none;">
				<li id="js-hour" style=" display: inline;"></li>
				<li id="js-minute" style=" display: inline;"></li>
				<li id="js-second" style=" display: inline;"></li>
			</ul>
		</div>
		<div class="col-md-12" style="border-style: solid;; text-align: center;padding: 2%;">
			
			<h4 style="padding: 2%;">Jumlah Yang Harus dibayar</h4>
			<h5 style="padding: 2%; color: red"> Rp 2.000.000</h5>
			
		</div>
		<div class="col-md-12" style="border-bottom: solid;border-left:  solid;border-right:  solid;border-left: solid; text-align: center;padding: 2%;">
			<img src=" uploads/bank/bankbca.png" width="10%">
			<h4 style="padding: 2%;">A/N : Kipau</h4>
			
		</div>
	</div>
</div>	
<script>
	var startTime = new Date(),
	expiryTime = new Date(),
	hourElem = document.getElementById('js-hour'),
	minuteElem = document.getElementById('js-minute'),
	secondElem = document.getElementById('js-second');

// Set up expiry time
expiryTime.setHours( expiryTime.getHours() + 0);
expiryTime.setMinutes( expiryTime.getMinutes() + 0 );
expiryTime.setSeconds( expiryTime.getSeconds() + 10);

var diffInMs = expiryTime - startTime,
diffInSecs = Math.round( diffInMs / 1000 ),
amountOfHours = Math.floor( diffInSecs / 3600 ),
amountOfSeconds = diffInSecs - (amountOfHours * 3600),
amountOfMinutes = Math.floor( amountOfSeconds / 60 ),
amountOfSeconds = amountOfSeconds - ( amountOfMinutes * 60 );

// Set up the countdown timer for display
// Set up the hours
if( amountOfHours > 0 ) {
	hourElem.innerHTML = (amountOfHours < 10)
	? '0' + amountOfHours + ' : '
	: amountOfHours + ' : ';
} else {
	hourElem.innerHTML = '00 : ';
}

// Set up the minutes
if( amountOfMinutes > 0 ) {
	minuteElem.innerHTML = ( amountOfMinutes < 10 )
	? '0' + amountOfMinutes + ' : '
	: amountOfMinutes + ' : ';
} else {
	minuteElem.innerHTML = '00 : ';
}

// // Set up the seconds
if( amountOfSeconds > 0 ) {
	secondElem.innerHTML = (amountOfSeconds < 10)
	? '0' + amountOfSeconds
	: amountOfSeconds;
} else {
	secondElem.innerHTML = '00';
}

function countDown() {
	var dateNow = new Date();

  // If we're not at the end of the timer, continue the countdown
  if( expiryTime > dateNow ) {

  // References to current countdown values
  var hours = parseInt(hourElem.innerHTML);
  minutes = parseInt(minuteElem.innerHTML),
  seconds = parseInt(secondElem.innerHTML);

  // Update the hour if necessary
  if( minutes == 0 && seconds == 0) {
  	--hours;

  	hourElem.innerHTML = ( hours < 10 ) ? '0' + (hours) + ' : ' : (hours) + ' : ';
  	minuteElem.innerHTML = '59 : ';
  	secondElem.innerHTML = '59';
  	return;
  }

  // Update the minute if necessary
  if( seconds == 0 ) {

  	if( minutes > 0 ) {
  		--minutes;
  		minuteElem.innerHTML = ( minutes > 10 ) ? minutes + ' : ' : '0' + minutes + ' : ';

  	} else {
  		minuteElem.innerHTML = '59' + ' : ';
  	}

  	return secondElem.innerHTML = '59';

  } else {
  	--seconds;
  	secondElem.innerHTML = ( seconds < 10 ) ? '0' + seconds : seconds;
  }

} else {
    // Reset the seconds
    secondElem.innerHTML = '00';

    // Clear interval and fire countDownOnComplete()
    clearInterval(countDownInterval);
    countDownOnComplete();
}
}

function countDownOnComplete() {
	console.log('Countdown timer has completed!');
}

window.onload = function() {
  // Begin the countdown!
  countDownInterval = setInterval( countDown, 1000 );
}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>