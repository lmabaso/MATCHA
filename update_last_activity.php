<?php
include_once 'header.php';

$data = DB::getInstance();

$result = $data->query("UPDATE users SET last_activity = now() WHERE user_id = ?", array($user->data()->user_id))->results();


?>