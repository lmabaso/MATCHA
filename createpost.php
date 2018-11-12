<?php
include_once 'header.php';
if (!$user->isLoggedIn())
{
    Redirect::to('index.php');
}
if (Input::exists())
{
    if(Input::get('Delete'))
    {
        $pic = new Photo();
        $pic->delete(array(Input::get('pic_id')));
    }
    if (Token::check(Input::get('token')))
    {
        $validate = new Validate();
		$validation = $validate->check($_POST, array(
			'photo' => array('required' => true)
        ));
        if ($validation->passed())
        {
            $data = substr(Input::get('photo'), strpos(Input::get('photo'), ",") + 1);
            $decode = base64_decode($data);
            $name = "imgs/".Input::get('token')."-".time().".png";
            $fp = fopen($name, 'wb');
            if (!fwrite($fp, $decode))
            {
				echo "<script>alert('Unable to find image. Please upload/take an image.');</script>";
            }
            fclose($fp);
            $pic = new Photo();
            $pic->upload(array(
                'user_id' => escape($user->data()->user_id),
                'pic_dir' => $name
            ));
        }
        else
        {
            foreach ($validation->errors() as $error)
            {
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
            <div class="modal-header">
				<div class="panel">
                    <h2>Upload Image</h2>
                </div>
            </div>
        <div class="modal-body">
            <div class="container">
                <div class="app">
                    <div class="mbr-section-btn align-center">
                        <a href="#" class="btn btn-md btn-secondary display-4" id="start-camera">Take photo</a>
                    </div>
                    <div class="mbr-section-btn align-center">
                        <a href="#" class="btn btn-md btn-secondary display-4" id="upload-pic">Upload photo</a>
                    </div>
                    <video id="camera-stream"></video>
                    <div id="upload-file-local">
                        <input type="file" id="uploadpic" value="" name="thumb" />
                    </div>
                    <img id="snap">
                    <p id="error-message"></p>
                    <div class="controls">
                        <a href="#" id="delete-photo" title="Delete Photo" class="disabled"><i class="material-icons">delete</i></a>
                        <a href="#" id="take-photo" title="Take Photo"><i class="material-icons">camera_alt</i></a>
                        <a href="#" id="save-photo" title="Save Photo" class="disabled"><i class="material-icons">save</i></a>  
                    </div>
                    <!-- Hidden canvas element. Used for taking snapshot of video. -->
                    <canvas></canvas>
                    
                </div>

            </div>
        </div>
            <!-- <div>
                <button onclick="capture('camera')" id="cam">Use Camera</button>
                <button onclick="capture('upload')" id="upl"><label  for="uploadpic" id="upl"> Upload image from file </label></button>
                <input type="file"  id="uploadpic" value="">
            </div>
            <div class="booth" id="camera" style="display: none">
                <div id="inner-box"></div>
                <video id="video" width="400" height="300"></video>
                <canvas id="canvas" width="400" height="300"></canvas>
                <div style="display:flex">
                    <button  onclick="capture('capture')" id="capture" style="display:block">capture</button>
                    <button onclick="capture('new')" id="new" style="display:none">New photo</button>
                </div>
                <form method="post"  action="createpost.php">
                    <input type="hidden" id="super_img" name="super_img" value="" />
                    <input type="hidden" id="photo" name="photo" value="" />
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?> ">
                    <input type="submit" name="submit" id="photoform" value="Upload" disabled />
                </form> -->
        </div>
    </div>
    <div style="margin-top: 30px">
        
        <?php
            // $stuff = DB::getInstance();
            // $res = $stuff->query('SELECT * FROM pictures WHERE user_id=? ORDER BY id DESC ', array($user->data()->user_id));
            // foreach ($res->results() as $pic)
            // {
            //     echo '<div class="booth">';
            //     echo '<form action="" method="POST">';
            //     // $user->find($pic->user_id);
            //     echo '<input type="hidden" name="pic_id" value="'. $pic->id .'"/>';
            //     echo '<label>You posted this</label><br />';
            //     echo '<img src="'. $pic->pic_dir.'">';
            //     $res1 = $stuff->query('SELECT * FROM likes WHERE pic_id=?', array($pic->id));
            //     echo $res1->count() . " like(s) and ";
            //     $res1 = $stuff->query('SELECT * FROM comments WHERE pic_id=?', array($pic->id));
            //     echo $res1->count() . " comments<br/>";
            //     echo '<input type="submit" name="Delete" value="Delete"><br/>';
            //     $res1 = $stuff->query('SELECT * FROM comments WHERE pic_id=?', array($pic->id))->results();
            //     foreach ($res1 as $com)
            //     {
            //         echo '<div>';
            //         $user->find($com->user_id);
            //         echo $user->data()->user_username . " said<br />";
            //         echo '&ensp;&ensp;'.$com->comment;
            //         echo '</div>';
            //     }
            //     echo '</form>';
            //     echo '</div>';
            // }
        ?>
        </div>
    </div>
</section>
<script src="js/main.js"></script>
<?php
include_once 'footer.php';
?>
