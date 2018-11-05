<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Matcha</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Matcha</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Search</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="https://quotesblog.net/wp-content/uploads/2017/03/3d-cute-love-couple-wallpaper.jpg" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>MEET BEAUTIFUL LOVE HERE!</h5>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Signup</button>
					<button type="button" class="btn btn-outline-danger">Login</button>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://quotesblog.net/wp-content/uploads/2017/03/70d37600b8fc12e49da595391f0b5201.jpg" alt="Second slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Match. Chat. Date.</h5>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Signup</button>
					<button type="button" class="btn btn-outline-danger">Login</button>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://quotesblog.net/wp-content/uploads/2017/03/Amazing-Love-Couple-at-Sunset.jpg" alt="Third slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>MEET BEAUTIFUL LOVE HERE!</h5>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Signup</button>
					<button type="button" class="btn btn-outline-danger">Login</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			<form>
				<div class="form-row">
					<div class="form-group col-md-6">
					<label for="inputEmail4">Email</label>
					<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
					</div>
					<div class="form-group col-md-6">
					<label for="inputPassword4">Password</label>
					<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label for="inputAddress">Address</label>
					<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
				</div>
				<div class="form-group">
					<label for="inputAddress2">Address 2</label>
					<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
					<label for="inputCity">City</label>
					<input type="text" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-md-4">
					<label for="inputState">State</label>
					<select id="inputState" class="form-control">
						<option selected>Choose...</option>
						<option>...</option>
					</select>
					</div>
					<div class="form-group col-md-2">
					<label for="inputZip">Zip</label>
					<input type="text" class="form-control" id="inputZip">
					</div>
				</div>
				<div class="form-group">
					<div class="form-check">
					<input class="form-check-input" type="checkbox" id="gridCheck">
					<label class="form-check-label" for="gridCheck">
						Check me out
					</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Sign up</button>
			</form>
			</div>
		</div>
	</div>

	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Matcha</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<a href="index" class="logo">Matcha</a>
		<nav>
			<ul>
				<li>
					<a href="#">something</a>
				</li>
				<li>
					<a href="#">Somesome</a>
				</li>
			</ul>

		</nav>
	</header>
	<main>
		<section class="index-banner">
			<div class="vertical-center">
				<h2>Match. Chat. Date.</h2>
					<div class="hor-center">
						<a href="#" class="index-buttons">Login</a>
						<a href="#" onclick="callform()" class="index-buttons">Signup</a>
						<button onclick="myFunction()">Click me</button>
					</div>
			</div>
		</section>
		<div class="bg-modal">
			<div class="model-content">
				<div class="close">
					+
				</div>
				<form action="">
					<input type="text" name="name" placeholder="Name">
					<input type="email" name="email" placeholder="E-maile">
					<input type="password" name="password" placeholder="Password">
					<input type="password" name="repeat-password" placeholder="Password Again">
					<input type="submit" name="login" value="login">
				</form>
			</div>
		</div>
	</main>
	<script src="js/main.js"></script>
	<footer>
		<ul>
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">About Us</a>
			</li>
			<li>
				<a href="#">Contact</a>
			</li>
		</ul>
	</footer>
</body>
</html> -->
