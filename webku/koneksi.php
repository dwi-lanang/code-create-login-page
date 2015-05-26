<?php
	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db( "belajar" , $conn);
	if (!$conn) {
	   echo "Tidak dapat konek ke DB: " . mysql_error();
	   exit;
	}
	if (!mysql_select_db("belajar")) {
	   echo "Tidak dapat memilih database belajar : " . mysql_error();
	   exit;
	}
	/*else
	{
		echo "Koneksi database belajar berhasil.";
		exit;
	}*/
?>