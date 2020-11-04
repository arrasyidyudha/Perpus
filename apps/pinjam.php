<?php
if (defined("USER")==false)
{
    //tidak punya cap
    die("You shall not pass!");
}
?>
<?php 
if (!isset($_SESSION["login"])){
	header("location: login.php?page=login_admin");
	exit;
  } 
  
  
require 'function.php';

$id = $_GET["id"];

//ambil data 
$user = $_SESSION["username"];
$edit = query("SELECT * FROM login WHERE username = '$user'")[0];
$buku = query("SELECT * FROM buku WHERE id = $id")[0];


// cek tombol submit
if( isset ($_POST["submit"])){

	
	if(pinjam($_POST) > 0){
	
		echo "
		<script>
		alert('Peminjaman berhasil!');
        window.location.href='user.php?page=daftar_buku';
		</script>
	";
	} else {
		echo "
		<script>
		alert('Gagal meminjam buku!');
        window.location.href='user.php?page=pinjam&id=$id';
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
    <title>User | PERPUSTAKAAN</title>
</head>
<body>
<h1 class="text-black-30 mx-auto mt-2 mb-3">Form Peminjaman</h1>

	<div class="container">
    <form action="" method="post">
    <div class="form-row">
	<div class="col-md-4 mb-3">
			      <label for="validationCustom01">Nomor Anggota</label>
			      <input name="id"  type="text" class="form-control" id="validationCustom01" value="<?= $edit["id"];?>" placeholder="" required autocomplete="off" readonly>
			</div>
			<div class="col-md-5 mb-3 ml-5">
			      <label for="validationCustom01">Kode Buku</label>
			      <input name="kode"  type="text" class="form-control" id="validationCustom01" value="<?= $buku["kode"];?>" placeholder="" required autocomplete="off">
			</div>
			</div>
	<div class="form-row">
	<div class="col-md-4 mb-3">
			      <label for="validationCustom02">Nama Lengkap</label>
			      <input name="nama"  type="text" class="form-control" id="validationCustom02" value="<?= $edit["nama"];?>" placeholder="Masukan Nama Anda" required autocomplete="off" readonly>
    		</div>
			<div class="col-md-5 mb-3 ml-5">
			      <label for="validationCustom01">Judul</label>
			      <input name="judul"  type="text" class="form-control" id="validationCustom01"  value="<?= $buku["judul"];?>" placeholder="" required autocomplete="off">
			</div>
			</div>

	<div class="form-row">
			<div class="col-md-4 mb-3">
			      <label for="validationCustom02">Username</label>
			      <input name="username"  type="text" class="form-control" id="validationCustom02" value="<?= $edit["username"];?>" placeholder="Masukan Nama Anda" required autocomplete="off" readonly>
    		</div>
			<div class="col-md-2 mb-3 ml-5 ">
			      <label for="validationCustom02">Tanggal Pinjam</label>
			      <input name="pinjam"  type="date" class="form-control" id="validationCustom02"  placeholder="Masukan Nama Anda" required autocomplete="off">
                </div>
				<div class="col-md-2 mb-3 ">
			      <label for="validationCustom02">Tanggal Kembali</label>
			      <input name="kembali"  type="date" class="form-control" id="validationCustom02"  placeholder="Masukan Nama Anda" required autocomplete="off">
                </div>
				<div class="hidden">
			      <label for="validationCustom02"></label>
			      <input name="kodepeminjaman"  type="hidden" class="form-control" id="validationCustom02"  placeholder="" required autocomplete="off">
                </div>
				<div>
				<label for="validationCustom02"></label>
			     <input name="status"  type="hidden" class="form-control" id="validationCustom02" placeholder="" required autocomplete="off">
			    </div>
			</div>


        <button class="btn btn-primary" type="submit" name="submit" value="submit">Pinjam Buku</button>
      </div>

                
