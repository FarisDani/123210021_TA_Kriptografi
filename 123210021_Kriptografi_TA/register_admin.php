<html>

<head>
	<title>Register</title>
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
		border: solid #112D4E;
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
		background-color: #F9F7F7;
	}
</style>

<body style="height: 70%; margin-bottom: 5%;background-color: #DBE2EF; ">

	<nav class="navbar navbar-expand-lg" style="background-color: #112D4E; margin-bottom: 100px;" >
		  <div class="container-fluid" style="padding:2% 0 2% 0%; font-size: 15pt">
		    <a class="navbar-brand" href="#" style="color: white; padding-left: 3%;font-size: 25pt;">PejuangRupiah</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="padding-left: 52%">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index_admin.php" style="color: white; margin-right: 10px;">Laman Admin</a>
		        </li>
		        <!-- <li class="nav-item">
		          <a class="nav-link" href="login.php" style="color: white">Admin</a>
		        </li> -->
		        <li class="nav-item">
		          <a class="nav-link" href="riwayat.php" style="color: white">Riwayat Pelamar</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Bantuan</a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item " href="#" >081226963161</a></li>
		            <li><a class="dropdown-item" href="#" >tresure987@gmail.com</a></li>
		          </ul>
		        </li>
		       
		      </ul>
		     
		    </div>
		  </div>
		</nav>



	<div class="container">
		<div class="login text-center">
			
			<form method="POST" action="register_admin_proses.php" >
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Username</label>
                            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg" placeholder="Masukkan Username" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Masukkan Password" />
                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Telpon</label>
                            <input type="text" name="telp" id="form3Example4" class="form-control form-control-lg" placeholder="Masukkan No Telepon" />
                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Email</label>
                            <input type="text" name="email" id="form3Example4" class="form-control form-control-lg" placeholder="Masukkan Email" />
                        </div>

                        <div class="text-center text-lg-start pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;margin-left: 28%;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0 " style="padding-left: 2.5rem; padding-right: 2.5rem;margin-left: 20%;">Have an account? <a href="login.php" style="color:blue;">login</a></p>
                        </div>
                    </form>
			
		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>