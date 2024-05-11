<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?message=belum_login");
}
?>

<html>

<head>
	<title>Riwayat Pelamar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
	* {
        font-family: 'Arial';   
    }

	.login {
		margin: 0% 30% 0% 30%;
		padding: 1% 5%;
		/* background-color: powderblue;*/
		border: solid #1570ef;
		border-radius: 3%;
		border-width: 5pt;
	}

	.form-control {
		color: #1570ef;
		border: #1570ef solid;
	}

	.form-control:hover {
		font-size: larger;
		transition: 0.5s;
		color: #1570ef;
	}

	.login:hover {
		background-color: #89b1d6;
	}
</style>

<body style="height: 70%; margin-bottom: 5%;background-color: #DBE2EF; ">

	<nav class="navbar navbar-expand-lg" style="background-color: #112D4E; margin-bottom: 100px;" >
		  <div class="container-fluid" style="padding:2% 0 2% 0%; font-size: 15pt">
		    <a class="navbar-brand" href="#" style="color: white; padding-left: 3%;font-size: 25pt;">PejuangRupiah</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 45%">
		      <ul class="navbar-nav">
		       <!--  <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="home.php" style="color: white; margin-right: 10px;">Home</a>
		        </li> -->
		        <li class="nav-item">
		          <a class="nav-link" href="index_admin.php" style="color: white">Laman Admin</a>
		        </li>
                <li class="nav-item">
                  <a class="nav-link" href="register_admin.php" style="color: white">Daftar Admin</a>
                </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Bantuan</a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item " href="#" >081226963161</a></li>
		            <li><a class="dropdown-item" href="#" >tresure987@gmail.com</a></li>
		          </ul>
		        </li>
                 
		       <li class="nav-item">
		        	<a class="nav-link" href="logout.php" style="color: white; background-color:#3F72AF; border:1px solid white; border-radius: 7px;">Logout</a>
		        </li>

		      </ul>
		     
		    </div>
		  </div>
		</nav>

       <section class="vh-100">
        <div class="container text-start pt-5" >
            <div class="row pt-5">
                <div class="col">
                    <h3 style="text-align: center;">Riwayat Pelamar</h3>
                    <br>    
                    <div class="card" >
                        <div class="card-body">
                            <table class="table table-striped text-left">
                                <thead style="text-align: center; font-size:8pt;">
                                    <tr style="border: 5px;">
                                        <th scope="col" >
                                            <h4>Nama User</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>Calon Pekerjaan</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>Deskripsi Diri</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>foto</h4>
                                        </th>
                                        <th scope="col">
                                            <h4>Hapus</h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                include('koneksi.php');
                                $username = $_SESSION['username'];

                                function decryptCaesar($ciphertext, $shift) {
                                    $result = '';
                                    $ciphertext = strtoupper($ciphertext);
                                    $length = strlen($ciphertext);

                                    for ($i = 0; $i < $length; $i++) {
                                        if (ctype_alpha($ciphertext[$i])) {
                                            $result .= chr(((ord($ciphertext[$i]) - $shift - 65 + 26) % 26) + 65);
                                        } else {
                                            $result .= $ciphertext[$i];
                                        }
                                    }

                                    return $result;
                                }

                                function decryptAES($ciphertext, $key) {
                                    list($ciphertext, $iv) = explode('::', base64_decode($ciphertext), 2);
                                    return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, 0, $iv);
                                }


                        
                            function rc4Decrypt($key, $str) {
                            $s = [];
                            for ($i = 0; $i < 256; $i++) {
                                $s[$i] = $i;
                            }
                            $j = 0;
                            for ($i = 0; $i < 256; $i++) {
                                $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
                                $temp = $s[$i];
                                $s[$i] = $s[$j];
                                $s[$j] = $temp;
                            }
                            $i = $j = 0;
                            $res = '';
                            for ($k = 0; $k < strlen($str); $k++) {
                                $i = ($i + 1) % 256;
                                $j = ($j + $s[$i]) % 256;
                                $temp = $s[$i];
                                $s[$i] = $s[$j];
                                $s[$j] = $temp;
                                $res .= $str[$k] ^ chr($s[($s[$i] + $s[$j]) % 256]);
                            }
                            return $res;
                            }

                            // Fungsi untuk mendekripsi gambar yang telah dienkripsi dengan RC4
                            function decryptImage($ImagePath, $key) {
                                // Membaca file gambar terenkripsi
                                $fileContent = file_get_contents($ImagePath);

                                // Mendekripsi konten file menggunakan algoritma RC4
                                $decryptedContent = rc4Decrypt($key, $fileContent);

                                // Menyimpan konten yang telah didekripsi ke dalam file gambar
                                $decryptedImagePath = 'cv_decrypted/' . basename($ImagePath); 
                                // Ganti dengan nama dan ekstensi gambar yang sesuai
                                file_put_contents($decryptedImagePath, $decryptedContent);

                                return $decryptedImagePath; // Kembalikan path file gambar yang telah didekripsi
                            }


                                $sql = "SELECT a.lamaranid,a.username, a.lowonganid, a.foto, a.deskripsi, c.name, c.lulusan 
                                        FROM lamaran a 
                                        INNER JOIN lowongan c ON a.lowonganid=c.lowonganid ";

                                $query = mysqli_query($connect, $sql);

                                while ($data = mysqli_fetch_array($query)) {
                                    $encryptedDeskripsi = $data['deskripsi'];

                                    // Dekripsi deskripsi yang dienkripsi menggunakan AES
                                    $aesKey = 'kuncirahasia123'; // Sesuaikan dengan kunci yang digunakan untuk enkripsi
                                    $decryptedAES = decryptAES($encryptedDeskripsi, $aesKey);

                                    // Shift Caesar yang digunakan pada saat enkripsi
                                    $caesarShift = 3; // Sesuaikan dengan shift yang digunakan saat enkripsi
                                    $decryptedDeskripsi = decryptCaesar($decryptedAES, $caesarShift);

                                    // Gunakan $decryptedDeskripsi untuk keperluan Anda
                                    // ...
                                    $ImagePath = $data['foto'];

                                    // Kunci yang digunakan saat enkripsi
                                    $imagekey = 'SecretKey'; // Ganti dengan kunci yang sama saat melakukan enkripsi

                                    // Mendekripsi gambar
                                    $decryptedImagePath = decryptImage($ImagePath, $imagekey);

                                ?>

                                        <tr>
                                            <td>
                                                <h5><?= $data['username']; ?></h5>
                                            </td>
                                            <td>
                                                <h5><?= $data['name']; ?></h5>
                                            </td>
                                            <td>
                                                <h5><?= strtolower($decryptedDeskripsi )?></h5>
                                            </td>
                                            <td>
                                                <h5> <img src="<?= $decryptedImagePath ?>" class="img-fluid rounded-3" style="object-fit: contain; width:100px"></h5>
                                            </td>
                                            <td>
                                                <form method="POST" action="riwayat_delete.php">                    
                                                <input type="hidden" name="idhapus" id="<?= $data['lamaranid'] ?>" value="<?= $data['lamaranid'] ?>">
                                                <button type="submit" class="btn btn-danger" >Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
    </section> 



	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>