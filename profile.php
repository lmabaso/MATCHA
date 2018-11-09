<?php
include_once 'header.php';

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists())
{
    
    if (Input::get('submit'))
    {
        if ($user->data()->user_notification == 1)
        {  
            $user->update(array(
                'user_notification' => 0
            ));
        }
        else if ($user->data()->user_notification == 0)
        {
            $user->update(array(
                'user_notification' => 1
            ));
        }
        Redirect::to('profile.php');
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
                    <h2>Profile</h2>
                    <h3><?php echo escape($user->data()->user_username) ?></h3>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <img src="imgs/profile.png" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img src="imgs/profile.png" class="rounded float-left img-thumbnail"  alt="...">
                            </div>
                            <div class="col">
                                <img src="imgs/profile.png" class="rounded float-left img-thumbnail" alt="...">
                            </div>
                            <div class="col">
                                <img src="imgs/profile.png" class="rounded float-left img-thumbnail" alt="...">
                            </div>
                            <div class="col">
                                <img src="imgs/profile.png" class="rounded float-left img-thumbnail" alt="...">
                            </div>
                        </div>
                    </div>
				</div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <?php
                    $profile = DB::getInstance();
                    $result = $profile->query('SELECT * FROM profiles');
                    var_dump($result->results());
                ?>
                <p>Name: <?php echo escape($user->data()->user_name) ?></p>
                <p>Email: <?php echo escape($user->data()->user_email) ?></p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Gender
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <?php echo (count($result->results()) == 0) ? '<select name="filter" id ="filter"><option value="">Select Gender</option><option value="male">Male</option><option value="female">Female</option></select>' : '<p>Gender: '. escape($user->data()->user_email) . '</p>'; ?>
                <?php echo (count($result->results()) == 0) ? '<select name="filter" id ="filter"><option value="">Select Sexual Preferences</option><option value="male">Male</option><option value="female">Female</option><option value="both">Both</option></select>' : '<p>Sexual preferences: '. escape($user->data()->user_email) . '</p>'; ?>
                <p>Biography: <?php echo escape($user->data()->user_email) ?></p>
                <p><a href="updateusername.php">Update Username</a></p>
                <p><a href="updateusername.php">Update Email</a></p>
                <p><a href="changepassword.php">Change Password</a></p>
                <form action="" method="POST">
                    <input type="submit" name="submit" class="btn btn-md btn-info display-4" value="<?php echo ($user->data()->user_notification == 1 ? "Don't get notifications" : "Get notificaations")  ?>"><br/>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?> " >
                </form>
            </div>
        </div>
    </div>
        

</section>
<?php
include_once 'footer.php';
?>
