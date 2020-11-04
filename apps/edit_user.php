<?php
if (defined("ADMIN")==false)
{
    //tidak punya cap
    die("You shall not pass!");
}
?>

<?php 
if (!isset($_SESSION["login"])){
	header("location: login.php?page=login_menu");
	exit;
  }
require'function.php';
$id = $_GET["id"];

//ambil data 
$edit = query("SELECT * FROM user WHERE id = $id")[0];

 //cek tombol submit
if( isset($_POST["submit"])){

	
if(ubah_user($_POST) > 0 ){
	
	
		echo "
		<script>
		alert('Data berhasil diubah!');
        window.location.href='admin.php?page=data_user';
		</script>
		
	";
	} else {
		echo "
		<script>
		alert('Data gagal diubah!');
        window.location.href='admin.php?page=edit_user&id=$id';
	
		</script>
		
	";
	}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman admin</title>
</head>
<body>
<h1 class="text-black-30 mx-auto mt-2 mb-3">Update User</h1>

	<div class="container">
    <form action="" method="post">
    <div class="form-row">
			    <div>
			     <input name="id"  type="hidden" class="form-control" id="validationCustom01" value="<?= $edit["id"];?>" placeholder="Masukan Id" required autocomplete="off">
			    </div>
				<div class="col-md-4 mb-3">
			      <label for="validationCustom02">Nama Lengkap</label>
			      <input name="nama"  type="text" class="form-control" id="validationCustom02" value="<?= $edit["nama"];?>" placeholder="Masukan Nama Anda" required autocomplete="off">
                </div>
			    <div class="col-md-4 mb-3">
			      <label for="validationCustom02">Username</label>
			      <input name="username"  type="text" class="form-control" id="validationCustom02" value="<?= $edit["username"];?>" placeholder="Masukan Username" required autocomplete="off">
                </div>
                <div class="col-md-4 mb-3">
			      <label for="validationCustom01">Password</label>
			      <input name="password"  type="text" class="form-control" id="validationCustom01" value="<?= $edit["password"];?>" placeholder="Masukan Password" required autocomplete="off">
			    </div>
</div>
			  <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
</div>

                

