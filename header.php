<?php
require_once 'config/Core/init.php';

$user = new User();
echo '<!DOCTYPE html>';
echo '	<html>';
echo '		<head>';
echo '		<meta charset="UTF-8">';	
echo '		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">';	
echo '		<link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">';
echo '		<title>Matcha</title>';
echo '		<link rel="stylesheet" href="css/bootstrap.min.css">';
echo '		<link rel="stylesheet" href="css/bootstrap-grid.min.css">';
echo '		<link rel="stylesheet" href="css/bootstrap-reboot.min.css">';
echo '		<link rel="stylesheet" href="assets/theme/css/style.css">';
echo '		<link rel="stylesheet" href="css/mbr-additional.css" type="text/css">';
echo '		<link href="css/style.css" rel="stylesheet">';
echo '		<link href="css/upload.css" rel="stylesheet">';
echo '		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>';
echo '		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>';
echo '		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>';
echo '		</head>';
echo '		<body>';
echo '			<section>';
echo '				<nav class="navbar navbar-expand-lg navbar-light fixed-top">';
echo '					<div class="container">';
echo '						<a class="navbar-brand" href="index.php">Matcha</a>';
echo '						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
echo '							<span class="navbar-toggler-icon"></span>';
echo '						</button>';
echo '						<div class="collapse navbar-collapse" id="navbarNav">';	
echo '							<ul class="navbar-nav ml-auto">';	
echo '								<li class="nav-item active">';	
echo '									<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>';
echo '								</li>';
echo '								<li class="nav-item">';
echo '									<a class="nav-link disabled" href="#">Search</a>';
echo '								</li>';
echo '								<li class="nav-item">';
echo '									<a class="nav-link disabled" href="#">Contact</a>';
echo '								</li>';
if ($user->isLoggedIn())
{
	echo '								<li class="nav-item">';
	echo '									<a class="nav-link disabled" href="profile.php">Profile</a>';
	echo '								</li>';
	echo '								<li class="nav-item">';
	echo '									<a class="nav-link disabled" href="logout.php">Logout</a>';
	echo '								</li>';
	echo '								<script src="js/gps.js"></script>';
}
echo '							</ul>';
echo '						</div>';
echo '					</div>';
echo '				</nav>';
echo '			</section>';
if (!$user->isLoggedIn())
{
	
}
?>
