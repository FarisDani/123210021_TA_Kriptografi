<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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

		<nav class="navbar navbar-expand-lg" style="background-color: #112D4E;" >
		  <div class="container-fluid" style="padding:2% 0 2% 0%; font-size: 15pt">
		    <a class="navbar-brand" href="#" style="color: white; padding-left: 3%;font-size: 25pt;">PejuangRupiah</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 60%">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="home.php" style="color: white; margin-right: 10px;">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="login.php" style="color: white">Admin</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Bantuan</a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item " href="#" >081123321123</a></li>
		            <li><a class="dropdown-item" href="#" >pejuangrupiah@gmail.com</a></li>
		          </ul>
		        </li>
		       <li class="nav-item">
		        	<a class="nav-link" href="login.php" style="color: white; background-color:#3F72AF; border:1px solid white; border-radius: 7px;">Login</a>
		        </li>
		      </ul>
		     
		    </div>

		  </div>
		</nav>

		<div id="carouselExampleDark" class="carousel slide container" data-bs-ride="carousel" style="margin-top:40px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3500">
                	<!-- <h1 style="color: white; text-align: center;margin: ">Informasi<br> -->
                	<!-- Alamat: Jl. Tambak Bayan No.1 A, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 5528</h1> -->
                    <img src=foto/lowongan1.jpg class="d-block w-100" alt="foto" style="opacity: 75%;border-radius:10px;" height="350" width="100">
                    <!-- <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255,255,255,0.7); border-radius: 10px; color: black;">
                        <h3 style="font-weight: bold;">Informasi</h3>
                        <a href="sedekah.php"><button class="btn btn-outline-dark">SEDEKAH</button></a>
                    </div> -->
                </div>
                <div class="carousel-item" data-bs-interval="3500">
                	<!-- <h1 style="color: white; text-align: center;">Promosi</h1> -->
                    <img src="foto/lowongan2.jpeg" class="d-block w-100" alt="foto" style="opacity: 75%;border-radius:10px;" height="350" width="100">
                    <!-- <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255,255,255,0.7); border-radius: 10px; color: black;">
                        <h3 style="font-weight: bold;">Wakaf Untuk Umat</h3>
                        <a href="wakaf.php"><button class="btn btn-outline-dark">WAKAF</button></a>
                    </div> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div id="produk">
        <div class="p-3 m-0 border-0">
            <div class="container text-center">
                <div class="row">

                    <?php
                    include('koneksi.php');

                    $sql   = "SELECT * FROM lowongan";
                    $query  = mysqli_query($connect, $sql);
                    
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <div class="m-2 p-1" style="height:270px;">
                                    <img src="foto/<?php echo $data['foto']; ?>" class="card-img-top" width="150" height = "270">
                                </div>
                                <div class="card-body" style="height:230px;padding-top: 50px;">
                                    <h5 class="card-title"><?= $data['name']; ?></h5>
                                    <h6 class="card-title"><?= $data['lulusan']; ?></h6>
                                    
                                    <a href=index_user.php>

                                            
                                            <button type="submit" class="btn btn-warning pt-1 pb-1" style="width: 80%;">
                                                Lamar Sekarang
                                            </button>
                                    </a>

                                </div>
                            </div>
                            <br>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

       

<!-- 
        	<div class="container text-center" style="margin-top:40px;background-color: #afd4fd; color: #656a70;border: 20px;border-radius:10px;">
        		  <div class="row" style="margin: 40px 0 0px 0;">
        		  	<div class="col" ><h1 style="text-align: left;margin-top: 50px;">Layanan Kami</h1>
        		  	</div>
        		  </div>
        		
			  <div class="row" style="margin: 4px 0 0px 0;">
			    <div class="col" >
			    
			    <img src="foto/isi ulang.jpg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;">
			      Isi ulang
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			    </div>
			    <div class="col">
			    <img src="foto/aqua.jpg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;">
			      Aqua
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			    </div>
			    <div class="col">
			   	<img src="foto/vit.jpg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;"> 
			      Vit
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			    </div>
			    <div class="col">
			    <img src="foto/le mineral.jpg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;"> 
			      Le Mineral
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			    </div>
			    <div class="col">
			    <img src="foto/gas 3kg.jpeg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;">
			      Tabung Gas 3kg
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			    </div>
			    <div class="col">
			    <img src="foto/gas 12kg.jpg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;"> 
			      Tabung Gas 12kg
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			    </div>
			    <div class="col">
			    <img src="foto/gas kaleng.jpg" class="d-block w-100" alt="foto"  height="170" width="70" style="border:5px solid white; border-radius: 7px;"> 
			      Gas Kaleng
			      <a class="nav-link" href="index_user.php" style="color: white; background-color:#1570ef; border:1px solid white; border-radius: 7px; ">Beli Produk</a>
			      </div>

			    

			    </div>
			  </div>

				  



			</div>
				<div class="container text-center" style="margin-top:40px;background-color: #afd4fd; color: #656a70;border: 20px;border-radius:10px;">
				  	 <div class="row" style="margin: 40px 0 0px 0;">
	        		  	<div class="col" ><h1 style="text-align: center;margin-top: 50px;">Mengapa Membeli Produk Kami ?</h1>
	        		  	</div>
        		  	</div>
				  	 <div class="row">
				  	 	 <div class="col">
					    
					    </div>
					    <div class="col" >
					    <img src="foto/online-shop.png" class="d-block w-100" alt="foto"  height="190" width="50">
					      Pembelian Online yang Mudah 
					    </div>
					    <div class="col" >
					    <img src="foto/fast.png" class="d-block w-100" alt="foto"  height="190" width="20">
					      Pengiriman Cepat 
					    </div>
					   <div class="col" >
					    <img src="foto/payment.png" class="d-block w-100" alt="foto"  height="190" width="20">
					      Pembayaran Mudah 
					    </div>
					    <div class="col">
					    
					    </div>

					</div>


					</div>
					<div class="container text-center" style="margin-top:40px;background-color: #89b1d6; color: black;border: 20px;border-radius:10px;">
						 <div class="row" style="margin: 40px 0 0px 0;">
		        		  	 <div class="col" ><h1 style="text-align: left;margin-top: 50px;">Temukan Kami</h1>
		        		  	</div>
	        		  	</div>
	        		  	<div class="row" style="margin-left: 10px;">
		        		  	 <div class="col"><img src="foto/fb.png" class="d-block w-100" alt="foto" height="70">
		        		  	</div>
		        		  	<div class="col" ><img src="foto/ig.png" class="d-block w-100" alt="foto" height="70">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		  	<div class="col">
		        		  	</div>
		        		 </div>

		        		 <div class="row" style="margin: 40px 0 0px 0;">
		        		  	 <div class="col" ><h1 style="text-align: left;margin-top: 50px;">Metode Pembayaran</h1>
		        		  	</div>
	        		  	</div>
		        		<div class="row" style="margin: 20px 0 0px 0;">
		        		  	 <div class="col"> <h1 style="border:1px solid black; border-radius: 7px;color: blue;">BCA</h1>
		        		  	 </div>  
		        		  	 <div class="col"><h1 style="border:1px solid black; border-radius: 7px;color: #BF5B25;">BNI</h1>
		        		  	 </div> 
		        		  	 <div class="col"><h1 style="border:1px solid black; border-radius: 7px;color: blue;">BRI</h1>
		        		  	 </div> 
		        		  	 <div class="col"><h1 style="border:1px solid black; border-radius: 7px;color: green">GO Pay</h1>
		        		  	 </div> 	
		        		  	 <div class="col"><h1 style="border:1px solid black; border-radius: 7px;color: red;">Link Aja</h1>
		        		  	 </div> 
		        		  	 <div class="col"><h1 style="border:1px solid black; border-radius: 7px;color: #BF5B25;">Shopee Pay</h1>
		        		  	 </div> 
		        		  	 <div class="col"><h1 style="border:1px solid black; border-radius: 7px;">COD</h1>
		        		  	 </div> 
	        		  	</div>
	        		  			

	        		  	</div>
        		  	</div>
				  </div>
 -->
			
        


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>