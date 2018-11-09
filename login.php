<?php
include_once 'header.php';

if (Input::exists())
{
	if (Token::check(Input::get('token')))
	{
		$validate = new Validate();
		$validation = $validate->check($_POST, array('username' => array('required' => true), 'pwd' => array('required' => true)));
		if ($validation->passed())
		{
			$user = new User();
            $login = $user->login(Input::get('username'), Input::get('pwd'));
			if ($login)
			{
				echo Session::flash('success', 'Your loggin was succesfully');
				Redirect::to('index.php');
			}
			else
			{
                echo Session::flash('fail', 'Your login was unsuccesfull');
			}
		}
		else
		{
			foreach ($validation->errors() as $error)
				echo $error . '</br>';
		}
	}
	if (Session::exists('success'))
	{
		echo Session::flash('success');
	}
	if (Session::exists('fail'))
	{
		echo Session::flash('fail');
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
                        <h2>Welcome</h2>
                        <p>Please enter your email and password</p>
                    </div>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="Login" action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username/Email Address" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control" id="inputPassword" placeholder="Password" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
						</div>
                        <div class="forgot">
                            <a href="forgotpassword.php">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="btn btn-md" href="index.php">Close</a>
                    </form>
                </div>
            </div>
        </div>
</section>
<?php
include_once 'footer.php';
?>
