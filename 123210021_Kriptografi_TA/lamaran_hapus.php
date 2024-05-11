<?php
	include 'koneksi.php';

    $idhapus	= $_POST['idhapus'];

	$sql	= "DELETE from lamaran where lamaranid='$idhapus'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect)); 

	if($query) {
		header("Location:lamaran.php");
	} else {
		echo "Hapus Data Gagal.";
	}
	
?>