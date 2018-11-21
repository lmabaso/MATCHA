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
            $result = $stuff->query("SELECT * FROM users JOIN profiles ON users.user_id=profiles.user_id");
            $stuff2 = DB::getInstance();
            // $result = $stuff->query("SELECT * FROM pictures");
            $max = count($result->results());
            for ($x = 0; $x < $max; $x++)
            {
                $result2 = new Photo();
                $result2->find($result->results()[$x]->user_id);
                die(var_dump($result2));
                echo '<div class="card bg-light">';
                echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($result2->results()[0]->pic_dir ) . '" alt="Card image" style="height: 50vh">';
                echo '   <div class="card-body text-center">';
                echo '      <h4 class="card-title">' . $result->results()[$x]->user_username . '</h4>';
                echo '      <p class="card-text">' . $result->results()[$x]->user_biography . '</p>';
                echo '       <a href="#" class="btn btn-success"><i class="material-icons">favorite</i></a>';
                echo '       <a href="#" class="btn btn-danger"><i class="material-icons">close</i></a>';
                echo '       <a href="#" class="btn btn-primary"><i class="material-icons">visibility</i></a>';
                echo '   </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>