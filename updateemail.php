<?php
include_once 'header.php';

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'email' => array('required' => true, 'valid_email' => 'email','unique' => 'email')
		));
		if ($validation->passed()) {
			try {
                $user->update(array(
                    'user_email' => Input::get('email')
                ));
                Session::flash('success', 'You have successfully updated your details.');
                Redirect::to('index.php');
            } catch(Exception $e) {
                die($e->getMessage());
            }
			Redirect::to('index.php');
		} else {
			foreach ($validation->errors() as $error) {
				echo $error . '</br>';
			}
		}
	}
}
?>
<section class="main-container">
	<div class="main-wrapper">
        <h2>Update</h2>
        <form class="signup-form" action="" method="POST">
            <input type="text" name="email" placeholder="email" value="<?php echo escape(Input::get('email')); ?>" autocomplete="off">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?> " >
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</section>
<?php
include_once 'footer.php';
?>
