<?php
include_once 'header.php';

// if (Input::exists()) {
$data = DB::getInstance();

$data->update('profiles', $user->data()->user_id, array('user_gender' => Input::get('gender')));
echo "success";
// }
?>