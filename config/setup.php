<?php

include_once 'database.php';
require_once 'Core/init.php';

try 
{
	$_db = new PDO("mysql:host=". Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'));
	$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE ". Config::get('mysql/db');
	$_db->exec($sql);
	echo "Database Camagru create success --- ";
}
catch (PDOException $e)
{
	if ($e->getMessage() == "SQLSTATE[HY000]: General error: 1007 Can't create database 'matcha'; database exists")
	{
		$sql = "DROP DATABASE ". Config::get('mysql/db');
		$_db->exec($sql);
		echo "Database Camagru drop success --- ";
		try
		{
			$sql = "CREATE DATABASE ". Config::get('mysql/db');
			$_db->exec($sql);
			echo "Database Camagru create success --- ";
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else
	{
		echo $e->getMessage();
	}
}

$_db = null;

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE users (
		user_id int(11)  not null AUTO_INCREMENT PRIMARY KEY,
		user_name varchar(256) not null,
		user_username varchar(256) not null,
		user_salt varchar(256) not null,
		user_email varchar(256) not null,
		user_pwd varchar(256) not null,
		token varchar(256) null,
		user_isvalidated boolean not null DEFAULT '0',
		user_notification boolean not null DEFAULT '1',
		user_fisrt_login boolean not null DEFAULT '1',
		user_pos_lon varchar(256) null,
		user_pos_lat varchar(256) null
		);";
	$_db->query($sql, array());
	echo "Table users create success --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE profiles (
		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
		user_id int(11) not null,
		user_gender varchar(6) null,
		user_sexual_pref varchar(11) null,
		user_biography text null,
		FOREIGN KEY (user_id) REFERENCES users(user_id)
	);";
	$_db->query($sql, array());
	echo "Table profiles create success --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE userinterests (
		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
		user_id int(11) not null,
		user_interests varchar(255) not null,
		FOREIGN KEY (user_id) REFERENCES users(user_id)
	);";
	$_db->query($sql, array());
	echo "Table userinterests create success --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE friends (
		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
		user_id int(11) not null,
		user_friend int(11) not null,
		status boolean not null DEFAULT '0',
		FOREIGN KEY (user_id) REFERENCES users(user_id)
	);";
	$_db->query($sql, array());
	echo "Table userinterests create success --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE interests (
		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
		user_interests varchar(256) not null
	);";
	$_db->query($sql, array());
	echo "Table interests create success --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

// try
// {
// 	$_db = DB::getInstance();
// 	$sql = "CREATE TABLE pictures (
// 		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
// 		user_id int(11) not null,
// 		pic_dir longblob not null
// 	);";
// 	$_db->query($sql, array());
// 	echo "Table pictures create success --- ";
// }
// catch (PDOException $e)
// {
// 	echo $e->getMessage();
// 	$_db = null;
// }

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE likes (
		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
		pic_id int(11) not null,
		user_id int(11) not null
	);";
	$_db->query($sql, array());
	echo "Table likes create success --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

try
{
	$_db = DB::getInstance();
	$sql = "CREATE TABLE comments (
		id int(11) not null AUTO_INCREMENT PRIMARY KEY,
		pic_id int(11) not null,
		user_id int(11) not null,
		comment text not null
	);";
	$_db->query($sql, array());
	echo "Table comments create success --- ";
}

catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}


try
{
	$user = new User();
	$salt = Hash::salt(32);
	$str = "qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM";
	$str = str_shuffle($str);
	$str = substr($str, 0, 10);
	$profile = DB::getInstance();
	$user->create(array('user_username' => 'bosmacarara', 'user_name' => 'liberty', 'user_email' => 'liberty@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(1));
	$profile->update('profiles', 1, array('user_gender' => 'male', 'user_sexual_pref' => 'women', 'user_biography' => 'I am groot'));
	$profile->insert('userinterests', array('user_id' => 1, 'user_interests' => 'video games'));
	$profile->insert('userinterests', array('user_id' => 1, 'user_interests' => 'running'));
	$profile->insert('userinterests', array('user_id' => 1, 'user_interests' => 'swimming'));
	$profile->insert('userinterests', array('user_id' => 1, 'user_interests' => 'dancing'));
	$user->create(array('user_username' => 'Zoey12', 'user_name' => 'zoe', 'user_email' => 'zoe@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(2));
	$profile->update('profiles', 2, array('user_gender' => 'female', 'user_sexual_pref' => 'men', 'user_biography' => 'i am a developer'));
	$profile->insert('userinterests', array('user_id' => 2, 'user_interests' => 'movies'));
	$profile->insert('userinterests', array('user_id' => 2, 'user_interests' => 'sleeping'));
	$profile->insert('userinterests', array('user_id' => 2, 'user_interests' => 'gaming'));
	$profile->insert('userinterests', array('user_id' => 2, 'user_interests' => 'chess'));
	$user->create(array('user_username' => 'lisa', 'user_name' => 'Mona', 'user_email' => 'monalisa@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(3));
	$profile->update('profiles', 3, array('user_gender' => 'female', 'user_sexual_pref' => 'men', 'user_biography' => 'i am a nurse'));
	$profile->insert('userinterests', array('user_id' => 3, 'user_interests' => 'reading'));
	$profile->insert('userinterests', array('user_id' => 3, 'user_interests' => 'drinking'));
	$profile->insert('userinterests', array('user_id' => 3, 'user_interests' => 'exploring'));
	$profile->insert('userinterests', array('user_id' => 3, 'user_interests' => 'dancing'));
	$user->create(array('user_username' => 'Bob', 'user_name' => 'Bobby', 'user_email' => 'bob@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(4));
	$profile->update('profiles', 4, array('user_gender' => 'male', 'user_sexual_pref' => 'men', 'user_biography' => 'i am a music producer'));
	$profile->insert('userinterests', array('user_id' => 4, 'user_interests' => 'reading'));
	$profile->insert('userinterests', array('user_id' => 4, 'user_interests' => 'drinking'));
	$profile->insert('userinterests', array('user_id' => 4, 'user_interests' => 'exploring'));
	$profile->insert('userinterests', array('user_id' => 4, 'user_interests' => 'dancing'));
	$user->create(array('user_username' => 'jane', 'user_name' => 'jane', 'user_email' => 'jane@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(5));
	$profile->update('profiles', 5, array('user_gender' => 'female', 'user_sexual_pref' => 'bi-sexual', 'user_biography' => 'i am a book writer'));
	$profile->insert('userinterests', array('user_id' => 5, 'user_interests' => 'birds'));
	$profile->insert('userinterests', array('user_id' => 5, 'user_interests' => 'drinking'));
	$profile->insert('userinterests', array('user_id' => 5, 'user_interests' => 'exploring'));
	$profile->insert('userinterests', array('user_id' => 5, 'user_interests' => 'dancing'));
	$user->create(array('user_username' => 'shantel', 'user_name' => 'shantel', 'user_email' => 'shantel@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(6));
	$profile->update('profiles', 6, array('user_gender' => 'female', 'user_sexual_pref' => 'men', 'user_biography' => 'i am a sinor developer'));
	$profile->insert('userinterests', array('user_id' => 6, 'user_interests' => 'programming'));
	$profile->insert('userinterests', array('user_id' => 6, 'user_interests' => 'singing'));
	$profile->insert('userinterests', array('user_id' => 6, 'user_interests' => 'art'));
	$profile->insert('userinterests', array('user_id' => 6, 'user_interests' => 'spannish'));
	$user->create(array('user_username' => 'chris', 'user_name' => 'chris', 'user_email' => 'chris@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(7));
	$profile->update('profiles', 7, array('user_gender' => 'male', 'user_sexual_pref' => 'bi-sexual', 'user_biography' => 'i am a mom of two'));
	$profile->insert('userinterests', array('user_id' => 7, 'user_interests' => 'programming'));
	$profile->insert('userinterests', array('user_id' => 7, 'user_interests' => 'singing'));
	$profile->insert('userinterests', array('user_id' => 7, 'user_interests' => 'art'));
	$profile->insert('userinterests', array('user_id' => 7, 'user_interests' => 'spannish'));
	$user->create(array('user_username' => 'yaya', 'user_name' => 'ayayanda', 'user_email' => 'yaya@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(8));
	$profile->update('profiles', 8, array('user_gender' => 'male', 'user_sexual_pref' => 'bi-sexual', 'user_biography' => 'i am a officer'));
	$profile->insert('userinterests', array('user_id' => 8, 'user_interests' => 'programming'));
	$profile->insert('userinterests', array('user_id' => 8, 'user_interests' => 'singing'));
	$profile->insert('userinterests', array('user_id' => 8, 'user_interests' => 'art'));
	$profile->insert('userinterests', array('user_id' => 8, 'user_interests' => 'spannish'));
	$user->create(array('user_username' => 'koolkid', 'user_name' => 'liam', 'user_email' => 'liam@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(9));
	$profile->update('profiles', 9, array('user_gender' => 'male', 'user_sexual_pref' => 'bi-sexual', 'user_biography' => 'i am a soccer player'));
	$profile->insert('userinterests', array('user_id' => 9, 'user_interests' => 'soccer'));
	$profile->insert('userinterests', array('user_id' => 9, 'user_interests' => 'dancing'));
	$profile->insert('userinterests', array('user_id' => 9, 'user_interests' => 'drawing'));
	$profile->insert('userinterests', array('user_id' => 9, 'user_interests' => 'drinking'));
	$user->create(array('user_username' => 'mtho', 'user_name' => 'mthokozisi', 'user_email' => 'mthokozisi@gmail.com', 'user_pwd' => Hash::make('liberty'), 'user_salt' => $salt, 'token' => $str, 'user_isvalidated' => '1', 'user_fisrt_login' => '0'));
	$profile->query('INSERT INTO profiles (user_id) VALUES (?)', array(10));
	$profile->update('profiles', 10, array('user_gender' => 'male', 'user_sexual_pref' => 'woman', 'user_biography' => 'i am a doctor'));
	$profile->insert('userinterests', array('user_id' => 10, 'user_interests' => 'drinking'));
	$profile->insert('userinterests', array('user_id' => 10, 'user_interests' => 'partying'));
	$profile->insert('userinterests', array('user_id' => 10, 'user_interests' => 'drawing'));
	$profile->insert('userinterests', array('user_id' => 10, 'user_interests' => 'drinking'));
	echo "Users added --- ";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

try
{
	$filename = 'pictures.sql';
	$_db = DB::getInstance();
	$lines = file($filename);
	$templine = '';
	foreach ($lines as $line)
	{
		if (substr($line, 0, 2) == '--' || $line == '')
		continue;
		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';')
		{
			$_db->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			$templine = '';
		}
	}
	echo "Tables imported successfully";
}
catch (PDOException $e)
{
	echo $e->getMessage();
	$_db = null;
}

?>
