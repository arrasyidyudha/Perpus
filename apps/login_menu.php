<?php
if (defined("LOGIN")==false)
{
    //tidak punya cap
    die("You shall not pass!");
}
?>
<?php
session_start();


if (isset($_SESSION["admin"])){
  header("location: admin.php?page=dashboard");
  exit;
}

if (isset($_SESSION["user"])){
	header("location: user.php?page=main");
	exit;
  }

	require 'function.php';

  if(isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	

	$result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
	
	
	// cek username 
	if (mysqli_num_rows($result) === 1){
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {

			if($row['level']=="admin"){
					//set session
			$_SESSION["login"] = true;
			$_SESSION["username"] = $username;
			$_SESSION["admin"] = true;
			header("Location: admin.php?page=dashboard");
			exit;

			}

			if($row['level']=="user"){
				//set session
			$_SESSION["login"] = true;
			$_SESSION["username"] = $username;
			$_SESSION["user"] = true;
			header("Location: user.php?page=main");
			exit;

			}
		
			
		}

	}
	$eror = true;
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
     <div class="container">
	 
  	<h2>Halaman Login</h2>
    <p>Anda harus login terlebih dahulu!</p>

	<br>

	<?php if( isset($eror)) : ?>

	<p style="color: red; font-style: italic"> username / password salah!</p>
	<?php endif; ?>
	<div>
    <form action="" method="post">

	<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control"  size= "30" id="username" name="username" required="required" placeholder="Username" autofocus required autocomplete="off">
	</div>
	<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" size= "30" id="password" name="password" required="required" placeholder="Password" required autocomplete="off">
	</div>
	<button class="btn btn-primary" type="submit" value="login" name="login">Login</button>
	
	</form>
	</div>
	</div>
</div>

	 <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
</body>
</html>