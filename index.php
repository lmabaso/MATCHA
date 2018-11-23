<?php 
include_once 'header.php';

if (Session::exists('success'))
{
    echo Session::flash('success');
}
if (Session::exists('fail'))
{
    echo Session::flash('fail');
}
if ($user->isLoggedIn())
{
    Redirect::to('home.php');
}
echo '<section class="header5 cid-r8wXduSTYD mbr-fullscreen mbr-parallax-background" id="header5-9">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 127, 159);"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="mbr-white col-md-10">
                        <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-1">MATCH. CHAT. DATE.</h1>
                        <p class="mbr-text align-center display-5 pb-3 mbr-fonts-style"></p>
                        <div class="mbr-section-btn align-center">
                            <a class="btn btn-md btn-secondary display-4" href="login.php">Login</a>
                            <a class="btn btn-md btn-white-outline display-4" href="signup.php">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>';
include_once 'footer.php';
?>