<?php
	include 'koneksi.php';
	if(isset($_GET['hapusid'])){
	$id = $_GET['hapusid'];

	$sqlHapus = "delete from akun where id=$id";
	$hasil = mysqli_query($koneksi,$sqlHapus);

	if($hasil){
		header('location:daftar.php');
	}
	else{
		die('Record gagal dihapus');
	}
}
