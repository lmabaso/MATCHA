<?php
require_once '../config/Core/init.php';

$user = new User();
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