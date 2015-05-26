<?php 
	session_start();
	//cek apakah index act ada atau tidak
	if(isset($_GET['act']))
	{
		//cek jika permintaan act = logout
		if($_GET['act'] == "logout")
		{
			//menghapus session
			unset($_SESSION['user']);
			header("location:index.php");
		}
	}
	else
	{
		//koneksikan ke database
		include "koneksi.php";
		//cek fungsi form pakah telah mengarah ke halaman ini atau tidak?
		//print_r($_POST); 
		//cek apakah field username dan password telah diisi atau tidak?
		
		if(!isset($_POST['f_username']) AND !isset($_POST['f_password']))
		{
			header('location:index.php');
			exit;
		}
		$username = $_POST['f_username'];
		$password = $_POST['f_password'];
		if($username AND $password) //jika diisi
		{
			//echo "field terisi";
			//query cek nilai dari field username dan password, apakah sama atau tidak dengan yang diinputkan?
			$SQL = "SELECT * FROM users WHERE username='". $username ."' AND password='". $password ."'"; 
			//test query pada phpmyadmin
			//echo $SQL;
			$RESULT = mysql_query($SQL);
			$ROW = mysql_fetch_assoc($RESULT);
			
			//print_r($ROW);
			$jumlah_baris = mysql_num_rows($RESULT);
			//echo $jumlah_baris;
			//cek apakah data ditemukan atau tidak
			if($jumlah_baris > 0) //jika ditemukan
			{
				//echo "Login berhasil.";
				//simpan hasil record data pada session untuk dicek apakah telah login atau belum.
				$_SESSION['user'] = $ROW;
				//arahkan url kembali ke index.php untuk membedakan telah login atau belum.
				header('location:index.php');
			}
			else //jika tidak
			{
				echo "Login gagal";
			}
		}
		else //jika tidak diisi
		{
			echo "field kosong";
		}
	}
?>