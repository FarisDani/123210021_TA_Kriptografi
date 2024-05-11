<?php
	include 'koneksi.php';

	$idhapus 	= $_POST['idhapus'] ;


	$sql	= "DELETE FROM lamaranid WHERE lamaranid ='$idhapus'" ;

	$query	= mysqli_query($connect,$sql);

	if($query) {
		header("location:riwayat.php") ;
	} else{
		echo "Hapus Data Gagal";
	} 
?>