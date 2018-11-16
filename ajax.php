<?php
include_once 'header.php';

$data = DB::getInstance();
if (Input::get('position'))
{
    $data->update('users', $user->data()->user_id, array('user_pos_lon' => Input::get('long'), 'user_pos_lat' => Input::get('lat')));
    echo "success";
}

if (Input::get('upload'))
{
    $data = substr(Input::get('pic_id'), strpos(Input::get('pic_id'), ",") + 1);
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

if (Input::get('add_interest'))
{
    $res1 = $data->query('SELECT * FROM userinterests WHERE user_id=? AND user_interests=?', array($user->data()->user_id, Input::get('interest')));
    if (Input::get('interest') != '' && !$res1->count())
    {
        $data->insert('userinterests', array('user_id' => $user->data()->user_id, 'user_interests' => Input::get('interest')));
    }
}
?>