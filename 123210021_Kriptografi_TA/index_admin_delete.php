<?php
	include 'koneksi.php';

	$lowonganid 	= $_GET['lowonganid'] ;

	$sql	= "DELETE FROM lowongan WHERE lowonganid ='$lowonganid'" ;

	$query	= mysqli_query($connect,$sql);

	if($query) {
		header("location:index_admin.php") ;
	} else{
		echo "Hapus Data Gagal";
	} 
?>