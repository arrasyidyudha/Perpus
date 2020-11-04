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
    require 'function.php';
    $kode = $_GET['id'];
    $data = query("SELECT * FROM peminjaman WHERE kodepinjam = $kode")[0];

    if( isset ($_POST["submit"])){

	
        if(validasi ($_POST) > 0){

        
        
            echo "<script>
            alert('Peminjaman berhasil divalidasi!');
            window.location='admin.php?page=data_pinjam';
        </script>";
        } else {
            echo "<script>
            alert('Peminjaman sudah divalidasi!');
            window.location='admin.php?page=data_pinjam';
        </script>";
        }
    }


?>

<?php
	$koneksi = mysqli_connect("localhost","root","","perpus");
	$ps = mysqli_query($koneksi,"select * from peminjaman where kodepinjam = $kode");
	while ($rps=mysqli_fetch_array($ps)){
		$stt='Peminjaman buku diterima';
		}
		$koneksi = mysqli_connect("localhost","root","","perpus");
		$upd = mysqli_query($koneksi,"update peminjaman set status = '$stt' where kodepinjam = '$kode'");
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
<h1 class="text-black-30 mx-auto mt-2 mb-3">Form Validasi</h1>

	<div class="container">
    <form action="" method="post">
    <div class="form-row">
	<div class="col-md-4 mb-3">
			      <label for="validationCustom01">Nomor Anggota</label>
			      <input name="id"  type="text" class="form-control" id="validationCustom01" value="<?= $data["id"];?>" placeholder="" required autocomplete="off" readonly>
			</div>
			<div class="col-md-5 mb-3 ml-5">
			      <label for="validationCustom01">Kode Buku</label>
			      <input name="kode"  type="text" class="form-control" id="validationCustom01" value="<?= $data["kodebuku"];?>" placeholder="" required autocomplete="off">
			</div>
			</div>
	<div class="form-row">
	<div class="col-md-4 mb-3">
			      <label for="validationCustom02">Nama Lengkap</label>
			      <input name="nama"  type="text" class="form-control" id="validationCustom02" value="<?= $data["nama"];?>" placeholder="Masukan Nama Anda" required autocomplete="off" readonly>
    		</div>
			<div class="col-md-5 mb-3 ml-5">
			      <label for="validationCustom01">Judul</label>
			      <input name="judul"  type="text" class="form-control" id="validationCustom01"  value="<?= $data["judul"];?>" placeholder="" required autocomplete="off">
			</div>
			</div>

	<div class="form-row">
			<div class="col-md-4 mb-3">
			      <label for="validationCustom02">Username</label>
			      <input name="username"  type="text" class="form-control" id="validationCustom02" value="<?= $data["username"];?>" placeholder="Masukan Nama Anda" required autocomplete="off" readonly>
    		</div>
			<div class="col-md-2 mb-3 ml-5 ">
			      <label for="validationCustom02">Tanggal Pinjam</label>
			      <input name="pinjam"  type="date" class="form-control" id="validationCustom02"  value="<?= $data["pinjam"];?>" placeholder="Masukan Nama Anda" required autocomplete="off" readonly>
                </div>
				<div class="col-md-2 mb-3 ">
			      <label for="validationCustom02">Tanggal Kembali</label>
			      <input name="kembali"  type="date" class="form-control" id="validationCustom02" value="<?= $data["kembali"];?>"   placeholder="Masukan Nama Anda" required autocomplete="off">
                </div>
				<div class="hidden">
			      <label for="validationCustom02"></label>
			      <input name="kodepinjam"  type="hidden" class="form-control" id="validationCustom02" value="<?= $data["kodepinjam"];?>" placeholder="" required autocomplete="off">
                </div>
			</div>


        <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
		
	  </div>