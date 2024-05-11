<?php
include 'koneksi.php';
	$foto		= $_FILES['foto']['name'];
	$file_tmp	= $_FILES['foto']['tmp_name'];
	$name 		= $_POST['name'];
	$lulusan 		= $_POST['lulusan'];
	$lowonganid	= $_POST['lowonganid'];
	move_uploaded_file($file_tmp, 'foto/'.$foto);

	
	$sql = "UPDATE lowongan SET name='$name', lulusan='$lulusan', foto='$foto' where productid='$productid'";

	$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect)); 

	if($query) {
		header("location:index_admin.php");
	
	} else {
		echo "Input Data Gagal.";
	}
	
?>