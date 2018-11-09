<?php
include_once 'header.php';

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'min' => 2,
				'max' => 256,
				'unique' => 'users'
			),
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 256
			),
			'email' => array(
				'required' => true,
				'min' => 6,
				'max' => 256,
				'valid_email' => 'email'
			),
			'pwd' => array(
				'required' => true,
				'min' => 6
			),
			'pwd_again' => array(
				'required' => true,
				'min' => 6,
				'matches' => 'pwd'
			),
		));
		if ($validation->passed()) {
			$user = new User();
			$salt = Hash::salt(32);
			$str = "qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			try {
				$user->create(array(
					'user_username' => Input::get('username'),
					'user_name' => Input::get('name'),
					'user_email' => input::get('email'),
					'user_pwd' => Hash::make(Input::get('pwd')),
					'user_salt' => $salt,
					'token' => $str
				));
			} catch (Exception $e){
				die ($e->getMessage());
			}
			$message = 
			"
			HI ". Input::get('name') ."
			Confirm Your Email

			Click on the link below to verify your account
			http://localhost:8080/camagru/verify.php?email=".input::get('email')."&token=".$str;

			mail(Input::get('email'), "Camagru email confirmation", $message, "Camagru");
			echo Session::flash('success', 'Please verify you email address.');
			Redirect::to('index.php');
		} else {
			foreach ($validation->errors() as $error) {
				echo $error . '</br>';
			}
		}
	}
}
?>
<section class="header5 cid-r8wXduSTYD mbr-fullscreen mbr-parallax-background" id="header5-9">
	<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 127, 159);"></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<div class="panel">
					<h2>Welcome new user</h2>
				</div>
			</div>
			
			<!-- Modal Body -->
			<div class="modal-body">
				<form id="Login" action="" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="username" id="inputUser" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pwd" id="inputPassword" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pwd_again" id="inputPasswordAgain" placeholder="Password Again">
					</div>
					<div class="form-group">
						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
					</div>
					<button type="submit" class="btn btn-primary">Sign up</button>
					<a class="btn btn-md" href="index.php">Close</a>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
include_once 'footer.php';
?>
