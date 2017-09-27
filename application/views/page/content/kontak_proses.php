<?php
	if(!defined("INDEX")) die("---");
	
	$nama	= $_POST['nama'];
	$email	= $_POST['email'];
	$pesan	= $_POST['pesan'];
	
	$subjek	= "Pesan dari pengunjung website";
	$dari	= "pemilik.website@gmail.com";
	$tgl	= date('Ymd');
	
	//mail($email,$subjek,$pesan,$dari);
	
	mysql_query("insert into pesan set nama='$nama', email='$email', pesan='$pesan', tanggal='$tgl'") or die(mysql_error());
	
	echo"Pesan telah terkirim";
	echo"<meta http-equiv='refresh' content='1; url=?tampil=kontak'>";
?>