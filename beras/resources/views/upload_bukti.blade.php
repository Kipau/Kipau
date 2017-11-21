@extends('Layout.layout')
@section('title','Upload Bukti')
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1">
			<li><a href="{{route('shop.index')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li >Checkout Page</li>
			<li class="active">Upload Bukti</li>
		</ol>
		<div class="container">

		</div>
		
	</div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->

<div class="checkout">
	<div class="container">
		<div class="col-md-12" style="border-top: solid;border-left:  solid;border-right:  solid;border-left: solid; border-bottom: solid; text-align: center;padding: 2%;">
			<form action="{{route('bukti.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<h3 style="padding: 2%;">Upload Bukti Pembayaran</h3>
				<center>
					<input type="file" class="form-controls" name="foto" id="exampleInputFile" onchange="readURL(this);" style="padding: 3px 28px 3px 20px; 
					font-size: 1em;
					text-decoration: none;font-family: 'Raleway', sans-serif;
					margin: 0;
					font-weight: 700;"></input>
					<img src="" width="300" height="400" id="fotobukti" name="fotobukti">
				</center>
				<input type="hidden" name="id" id="id" value="{{$id}}">
				<br>
				<button type="submit" class="btn btn-warning ">Upload</button>
			</form>
			


			<!-- <ul style="list-style: none;">
				<li id="js-hour" style=" display: inline;"></li>
				<li id="js-minute" style=" display: inline;"></li>
				<li id="js-second" style=" display: inline;"></li>
			</ul> -->
		</div>
		
	</div>
</div>	
<script>

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#fotobukti').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

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
@endsection