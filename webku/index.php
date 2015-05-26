<?php
	session_start();
	//jika telah login
	if(isset($_SESSION['user']))
	{
		//print_r($_SESSION['user']);
		//simpan hasil session pada variable
		$user = $_SESSION['user'];
		//hasil setelah login.
		//echo "Selamat datang <b>". $user['name'] ."</b>";
		//menampilkan hasil setelah login pada halaman lain
		include "home.html";
	}
	else //jika belum
	{
		include "login.html";
	}
?>