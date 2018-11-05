<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.6, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <!-- <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon"> -->
  <title>Matcha</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="css/mbr-additional.css" type="text/css">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<section>
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
</section>
<section class="header5 cid-r8wXduSTYD mbr-fullscreen mbr-parallax-background" id="header5-9">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 127, 159);"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">MATCH. CHAT. DATE.</h1>
                <p class="mbr-text align-center display-5 pb-3 mbr-fonts-style"></p>
				<div class="mbr-section-btn align-center">
					<a class="btn btn-md btn-secondary display-4" data-toggle="modal" data-target="#login" href="#">Login</a>
					<a class="btn btn-md btn-white-outline display-4"data-toggle="modal" data-target="#register" href="#">Sign up</a>
				</div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
				<div class="panel">
					<h2>Welcome</h2>
					<p>Please enter your email and password</p>
				</div>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
				<form id="Login">
					<div class="form-group">
						<input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password">
					</div>
					<div class="forgot">
						<a href="reset.html">Forgot password?</a>
					</div>
					
				</form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
				<div class="panel">
					<h2>Welcome new user</h2>
					<p>Please enter your email and password</p>
				</div>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
				<form id="Login">
					<div class="form-group">
						<input type="text" class="form-control" id="inputName" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="inputUser" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPasswordAgain" placeholder="Password Again">
					</div>
				</form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </div>
        </div>
    </div>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>