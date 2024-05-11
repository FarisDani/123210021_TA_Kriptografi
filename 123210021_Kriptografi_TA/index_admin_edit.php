<?php
session_start();
if (empty($_SESSION['username'])) {
	header("location:login.php?message=belum_login");
}
if ($_SESSION['level'] != "admin") {
	die("Anda Bukan Admin");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laman Admin</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzaCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>

 	*{
 	font-family: 'Arial';
 	}

 	.col{
 		margin: 0px 0 40px 0;
 	}

 	.d-block{
 		/*margin-top: 30px;*/
 		margin-bottom: 20px;
 	}

 	
</style>

<body>

		<nav class="navbar navbar-expand-lg" style="background-color: #1570ef;" >
		  <div class="container-fluid" style="padding:2% 0 2% 0%; font-size: 15pt">
		    <a class="navbar-brand" href="#" style="color: white; padding-left: 3%;font-size: 25pt;">PejuangRupiah</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 52%">
		      <ul class="navbar-nav">
		       <li class="nav-item">
                  <a class="nav-link" href="register_admin.php" style="color: white">Daftar Admin</a>
                </li>
		        <li class="nav-item">
		          <a class="nav-link" href="riwayat_total.php" style="color: white">Riwayat Pelamar</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Bantuan</a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item " href="#" >081226963161</a></li>
		            <li><a class="dropdown-item" href="#" >tresure987@gmail.com</a></li>
		          </ul>
		        </li>
		       <li class="nav-item">
		        	<a class="nav-link" href="logout.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px;">Logout</a>
		        </li>
		      </ul>
		     
		    </div>
		  </div>
		</nav>
<?php
$name       = $_POST['name'];
$lulusan      = $_POST['lulusan'];
$lowonganid  = $_POST['lowonganid'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="col" style="padding-top: 200px;">
        <form enctype="multipart/form-data" class="form" method="POST" action="index_admin_edit_proses.php">
            <center>
                <table>
                    <tr>
                        <td>
                            <h2 align="center">Edit Barang</h2>
                        </td>
                    </tr>
                </table>
                <center>
                    <div class="align-items-center">
                        <div class=" container p-0 text-black">
                            <div class="container text-center" style="width:540px; padding-top: 13px;">
                                <form action="index_admin_edit_proses" method="post">
                                    <input type="hidden" name="lowonganid" value="<?=$lowonganid?>">
                                    <div class="mb-0">
                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Barang" value="<?= $name ?>">
                                    </div>
                                    <br>
                                    <div class="mb-0">
                                        <input type="text" name="lulusan" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Harga Barang" value="<?= $lulusan ?>">
                                    </div>
                                    <br>
                                    
                                    <br>
                                    <div class="mb-0">
                                        <input type="file" name="foto" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <br>
                                    <div class="container text-center" style="width:541px; padding-top: 20px; padding-bottom: 127px; margin-left: -21px;">
                                        <div>
                                            <a href="index_admin.php">
                                            <button type="button" class="btn btn-primary" style=" background-color: #00A445;">Kembali</button></a>
                                            <button type="submit" class="btn btn-primary" style=" background-color: #00A445;">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
    </div>
    </center>
    </form>
    </center>
			
        


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>