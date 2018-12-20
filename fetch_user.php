<?php

include_once 'header.php';

$data = DB::getInstance();
$result2 = new Photo();

$result = $data->query("SELECT * FROM users ")->results();
echo ' <ul>';
foreach($result as $row)
{
    $status = '';
    $current_timpstamp = strtotime(date('Y-m-d H:i:s') . '-10 seconds');
    $current_timpstamp = date('Y-m-d H:i:s', $current_timpstamp);
    $user_last_active = $row->last_activity;
    echo '
    <li class="contact" onclick="myselect(' . $row->user_id . ')">
        <div style="display: flex">';
    $pics = $result2->find($row->user_id)->results();
    echo '<img src="data:image/jpeg;base64,' . base64_encode($pics[0]->pic_dir) . '" style=" border-radius: 50%; margin: 0px 10px 0px 10px; width: 50px; height: 50px; object-fit:cover;" />
            <div styel= "line-height: none">
                <strong>' . $row->user_username . '</strong> -:-';
                echo ($user_last_active > $current_timpstamp) ? '<font color="green">Online</font><br>' : '<font color="gray">Offline</font><br>';
                echo'You just got LITT up, Mike.
            </div>
        </div>
        <hr>
    </li>
    ';
}
echo '</ul>';
?>