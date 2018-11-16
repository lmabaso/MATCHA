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
    <div class="container">
        <div class="card mb-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="imgs/3a553ccd4606dd06362c389e7fbca1f3 -1542093078.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>