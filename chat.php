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
$this_user_id = $stuff->results()[0]->user_id;
$this_user_name = $stuff->results()[0]->user_username;
$result2 = new Photo();
$pics = $result2->find($this_user_id)->results();
echo '<section class="header5 cid-r8wXduSTYD mbr-fullscreen mbr-parallax-background" id="header5-9">';
// echo '<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 127, 159);"></div>';
// echo '<div class="content w-100 align-center">';
// echo '<div id="frame">';
// echo '  <div id="sidepanel">';
// echo '    <div id="profile">';
// echo '      <div class="wrap">';
// echo '        <img id="profile-img" src="data:image/jpeg;base64,' . base64_encode($pics[0]->pic_dir) . '" class="online" alt="" />';
// echo '        <p>' . $this_user_name . '</p>';
?>
				<!-- <div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Search contacts..." />
		</div>
		<div id="contacts"></div>
	</div> -->
<?php
	// echo '<div class="content">';
	// echo '	<div class="contact-profile">';
	// echo '		<img src="data:image/jpeg;base64,' . base64_encode($pics[0]->pic_dir) . '"  alt="" />';
	// echo '		<p>Harvey Specter</p>';
	// echo '	</div>';
?>
		<!-- <div class="messages">
			<ul>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>When you're backed against the wall, break the god damn thing down.</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>Excuses don't win championships.</p>
				</li>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>Oh yeah, did Michael Jordan tell you that?</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>No, I told him that.</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>What are your choices when someone puts a gun to your head?</p>
				</li>
				<li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>What are you talking about? You do what they say or they shoot you.</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>-->

<!-- <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='js/chat.js'></script>
</div> -->

<div style="width:100%;">
	<div style="margin: 0 auto; background-color: pink; width: 80%; height: 90vh">
		<div style="height: 100%; float: left; width: 300px; background-color: white">
			<div style="display:flex">
				<div><img id="profile-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($pics[0]->pic_dir) ?>" style=" width: 50px; height: 50px; object-fit:cover;" /></div>
				<div><p><?php echo $this_user_name ?></p></div>
			</div>
			<div id="contacts" style=" margin-top: 10px; height:calc(100% -  50px - 10px);width:100%;overflow:scroll;overflow-x:hidden;overflow-y:scroll;"></div>
		</div>
		<div id="chats">
			<div style="background-color: gray; height: 50px"><p><?php echo $this_user_name ?></p><label></label><div>
			<div id="contacts" style="margin-top: 26px; height: calc(90vh - 50px - 30px);overflow:scroll;overflow-x:hidden;overflow-y:scroll;"></div>
			<div style="position: relative; width: 100%;" ><input type="text" style="border:none; width:calc(100% - 350px); height: 30px; outline: none;"><button style="border:none; height: 30px; width: 50px; outline: none;">send</button></div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		fetch_user();
		setInterval(function(){
			fetch_user();
		}, 10000);
		function fetch_user()
		{
			$.ajax({
				url:"fetch_user.php",
				method: "POST",
				success: function(data){
					$('#contacts').html(data);
				}
			})
		}
	});
	function myselect(dat) {
		$.ajax({
				url:"user_chat.php",
				method: "POST",
				data:  {in: dat},
				success: function(data){
					alert("liberty");
					// $('#chats').html(data);
				}
			})
	}
</script>
</section>
<?php
include_once 'footer.php';
?>