<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>{{ trans('site.make_your_booking')}}</h1>
                            <p>{{ trans('site.make_your_booking_description') }}</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Hotel</span>
											<select class="form-control">
												<option value=""></option>
                                                @foreach ($hotels as $hotel)
                                                    <option value="{{ $hotel->getKey() }}">{{ $hotel->name }}</option>
                                                @endforeach
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
                                </div>
                                <div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Quarto</span>
											<select class="form-control">
                                                <option value=""></option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->getKey() }}">{{ $room->name }}</option>
                                                @endforeach
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
                                </div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check In</span>
											<input class="form-control" type="date" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Check out</span>
											<input class="form-control" type="date" required>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn">Check availability</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>