<?php
include_once 'header.php';
$stuff = DB::getInstance();
if (!$user->isLoggedIn())
{
    Redirect::to('index.php');
}
if ($stuff->results()[0]->user_fisrt_login === "1")
{
    Redirect::to('profile.php');
}
if (Input::exists())
{
}
?>

<section class="header5 cid-r8wXduSTYD mbr-fullscreen mbr-parallax-background" id="header5-9">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 127, 159);"></div>
    <div class="container-fluid containter"  style="margin-top: 20px;">
        <div class="card-columns">
            <?php
            $this_user_id = $stuff->results()[0]->user_id;
            $stuff->query("SELECT * FROM users JOIN profiles ON users.user_id=profiles.user_id WHERE users.user_id = ?", array($this_user_id));
            $sex = $stuff->results()[0]->user_sexual_pref;
            if ($sex === "women")
            {
                $sex = "female";
            }
            else if ($sex === "men") 
            {
                $sex = "male";
            }
            else 
            {
                $sex = "bi-sexual";
            }
            $my_interests = $stuff->query("SELECT * FROM userinterests WHERE user_id = ?", array($this_user_id))->results();
            if ($sex != "bi-sexual")
            {
                $str = "SELECT * FROM profiles 
                JOIN userinterests ON profiles.user_id=userinterests.user_id 
                JOIN users ON profiles.user_id=users.user_id 
                WHERE NOT userinterests.user_id = ? 
                AND profiles.user_gender = ? 
                AND (";
                $a = array($this_user_id, $sex);
            }
            else
            {
                $str = "SELECT * FROM profiles 
                JOIN userinterests ON profiles.user_id=userinterests.user_id 
                JOIN users ON profiles.user_id=users.user_id 
                WHERE NOT userinterests.user_id = ? 
                AND (";
                $a = array($this_user_id);
            }
            $x = count($my_interests);
            $i = 0;
            foreach ($my_interests as $interests)
            {
                $str .= "user_interests = ?";
                array_push($a, $interests->user_interests);
                if ($i < $x - 1)
                    $str .= " OR ";
                $i++;
                if ($i > $x - 1)
                    $str .= ")";
            }
            $result = $stuff->query($str, $a)->results();
            $stuff2 = DB::getInstance();
            $result2 = new Photo();
            $max = count($result);
            $dup = array();
            foreach ($result as $prof)
            {
                if (in_array($prof->user_id, $dup))
                    continue ;
                else
                    array_push($dup, $prof->user_id);
                $pics = $result2->find($prof->user_id)->results();
                echo '<form action="" method="POST">';
                echo '<div class="card bg-light">';
                echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($pics[0]->pic_dir) . '" alt="Card image" style="height: 50vh">';
                echo '   <div class="card-body text-center">';
                echo '      <h4 class="card-title">' . $prof->user_username . '</h4>';
                echo '      <p class="card-text">' . $prof->user_biography . '</p>';
                echo '      <button class="btn btn-success"><i class="material-icons">favorite</i></button>';
                echo '      <button class="btn btn-danger"><i class="material-icons">close</i></button>';
                echo '      <button class="btn btn-primary"><i class="material-icons">visibility</i></button>';
                echo '   </div>';
                echo '</div>';
                echo '</form>';
            }
            ?>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>