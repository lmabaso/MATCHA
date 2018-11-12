<?php
include_once 'header.php';

// if (Input::exists()) {
var_dump(Input::get('long'));
echo '<script>alert("gets here: ")</script>';
$data = DB::getInstance();
if (Input::get('position'))
{
    
    $data->update('users', $user->data()->user_id, array('user_pos_lon' => Input::get('long'), 'user_pos_lat' => Input::get('lat')));
    echo "success";
}
// }
?>