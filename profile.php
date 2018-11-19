<?php
include_once 'header.php';

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists())
{
    if (Input::get('gender'))
    {
        if (Input::get('gender_in') != '')
        {
            $stuff = DB::getInstance();
            $stuff->update('profiles', $user->data()->user_id, array('user_gender' => Input::get('gender_in')));
        }
    }

    if (Input::get('sex_pref'))
    {
        if (Input::get('sex_pref_in') != '')
        {
            $stuff = DB::getInstance();
            $stuff->update('profiles', $user->data()->user_id, array('user_sexual_pref' => Input::get('sex_pref_in')));
        }
    }

    if (Input::get('bio'))
    {
        if (Input::get('bio_in') != '')
        {
            $stuff = DB::getInstance();
            $stuff->update('profiles', $user->data()->user_id, array('user_biography' => Input::get('bio_in')));
        }
    }

    if (Input::get('Add'))
    {
        $stuff = DB::getInstance();
        $res1 = $stuff->query('SELECT * FROM userinterests WHERE user_id=? AND user_interests=?', array($user->data()->user_id, Input::get('interests_in')));
        if (Input::get('interests_in') != '' && !$res1->count())
        {
            $stuff->insert('userinterests', array('user_id' => $user->data()->user_id, 'user_interests' => Input::get('interests_in')));
        }
    }

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
$stuff = DB::getInstance();
    $res1 = $stuff->query('SELECT * FROM profiles WHERE user_id=?', array($user->data()->user_id));
    if ($res1->results()[0]->user_gender === NULL || $res1->results()[0]->user_biography === NULL || $res1->results()[0]->user_sexual_pref === NULL)
    {
        $stuff->update('users', $user->data()->user_id, array('user_fisrt_login' => 1));
    }
    else
    {
        $stuff->update('users', $user->data()->user_id, array('user_fisrt_login' => 0));
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
                    <?php
                    $res = $stuff->query('SELECT * FROM pictures WHERE user_id=?', array($user->data()->user_id));
                    ?>
                        <div class="row">
                            <div class="col">
                            <?php
                            if (count($res->results()) > 1)
                            {
                                echo '<img src="' . $res->results()[0]->pic_dir . '" class="img-fluid" alt="Responsive image">';
                            }
                            else 
                            {
                                echo '<img src="imgs/profile.png" class="img-fluid" alt="Responsive image">
                                <a href="createpost.php"><i class="material-icons">add</i></a>';
                            }
                            ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <?php
                            if (count($res->results()) > 2)
                            {
                                echo '<img src="' . $res->results()[1]->pic_dir . '" class="rounded float-left img-thumbnail"  alt="...">';
                            }
                            else 
                            {
                                echo '<img src="imgs/profile.png" class="rounded float-left img-thumbnail"  alt="...">
                                <a href="createpost.php"><i class="material-icons">add</i></a>';
                            }
                            ?>
                            </div>
                            <div class="col">
                            <?php
                            if (count($res->results()) > 3)
                            {
                                echo '<img src="' . $res->results()[2]->pic_dir . '" class="rounded float-left img-thumbnail"  alt="...">';
                            }
                            else 
                            {
                                echo '<img src="imgs/profile.png" class="rounded float-left img-thumbnail"  alt="...">
                                <a href="createpost.php"><i class="material-icons">add</i></a>';
                            }
                            ?>
                            </div>
                            <div class="col">
                            <?php
                            if (count($res->results()) > 4)
                            {
                                echo '<img src="' . $res->results()[3]->pic_dir . '" class="rounded float-left img-thumbnail"  alt="...">';
                            }
                            else 
                            {
                                echo '<img src="imgs/profile.png" class="rounded float-left img-thumbnail"  alt="...">
                                <a href="createpost.php"><i class="material-icons">add</i></a>';
                            }
                            ?>
                            </div>
                            <div class="col">
                            <?php
                            if (count($res->results()) > 5)
                            {
                                echo '<img src="' . $res->results()[4]->pic_dir . '" class="rounded float-left img-thumbnail"  alt="...">';
                            }
                            else 
                            {
                                echo '<img src="imgs/profile.png" class="rounded float-left img-thumbnail"  alt="...">
                                <a href="createpost.php"><i class="material-icons">add</i></a>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <?php
                    $profile = DB::getInstance();
                    $result = $profile->query('SELECT * FROM profiles WHERE user_id=?', array($user->data()->user_id));
                    if (count($result->results()) == 0)
                    {
                        $profile->query('INSERT INTO profiles (user_id) VALUES (?)', array($user->data()->user_id));
                        $result = $profile->query('SELECT * FROM profiles WHERE user_id=?', array($user->data()->user_id));
                    } 
                ?>
                <form action="" method="POST">
                    <p>Name: <?php echo escape($user->data()->user_name) ?></p>
                    <p>Email: <?php echo escape($user->data()->user_email) ?></p>
                    <?php echo ($result->results()[0]->user_gender === NULL) ? '<select name="gender_in"  class="form-control" id ="gender" onchange="gender(this.value)"><option value="">Select Gender</option><option value="bi-sexual">bi-sexual</option><option value="male">Male</option><option value="female">Female</option></select>' : '<p>Gender: '. escape($result->results()[0]->user_gender) . '</p>';?>
                    <div class="mbr-section-btn align-center">
                        <input type="submit" class="btn btn-md" name="gender" value="update"><br/>
                    </div>
                    <?php echo ($result->results()[0]->user_sexual_pref === NULL) ? '<select name="sex_pref_in" class="form-control" id ="sex_pref"><option value="">Select Sexual Preferences</option><option value="male">Male</option><option value="female">Female</option><option value="both">Both</option></select>' : '<p>Sexual preferences: '. escape($result->results()[0]->user_sexual_pref) . '</p>'; ?>
                    <div class="mbr-section-btn align-center">
                        <input type="submit" class="btn btn-md" name="sex_pref" value="update"><br/>
                    </div>
                    <br/>
                    <?php echo ($result->results()[0]->user_biography === NULL) ? '<div class="form-group"><textarea class="form-control" name="bio_in" rows="5" id="comment" placeholder="Biography"></textarea></div>' : '<p>Biography: '. escape($result->results()[0]->user_biography) . '</p>'; ?>
                    <div class="mbr-section-btn align-center">
                        <input type="submit" class="btn btn-md" name="bio" value="update"><br/>
                    </div>
                    <br/>
                </form>
                    <?php
                        $result = $profile->query('SELECT * FROM userinterests WHERE user_id=?', array($user->data()->user_id));
                        if (count($result->results()) == 0)
                        {
    
                        }
                        else 
                        {
                            echo '<div class="container">';
                            echo '<h2>Interests: </h2>';
                            echo '<ul class="list-group">';
                            foreach ($result->results() as $val)
                            {
                                echo '<li class="list-group-item">' . $val->user_interests . '</li>'; 
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                            $result2 = $profile->query('SELECT * FROM interests');
                            echo '<select name="interests_in"  class="form-control" id ="interests">';
                            echo '<option value="male">select interest</option>';
                            foreach ($result2->results() as $val)
                            {
                                echo '<option value="' . $val->id . '">' . $val->user_interests . '</option>';
                            }
                            echo '</select>';
                    ?>
                    <div class="mbr-section-btn align-center">
                        <a href="#" id="add_interest" class="btn btn-md"><i class="material-icons">add</i></a>
                    </div>
                    <br/>
                    <p><a href="updateusername.php">Update Username</a></p>
                    <p><a href="updateusername.php">Update Email</a></p>
                    <p><a href="changepassword.php">Change Password</a></p>
                    <div class="mbr-section-btn align-center">
                        <input type="submit" name="submit" class="btn btn-md btn-info display-4" value="<?php echo ($user->data()->user_notification == 1 ? "Don't get notifications" : "Get notificaations")  ?>"><br/>
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?> " >
                
            </div>
        </div>
    </div>
</section>
<script src="js/profile.js"></script>
<?php
include_once 'footer.php';
?>
