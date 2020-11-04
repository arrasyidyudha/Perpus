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
$data = query("SELECT * FROM buku WHERE id = $id")[0];

 

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

<div class="container">
  <div class="row">
    <div class="col-md">
    <h1 class="text-black-30 mx-auto">Data Buku</h1>
    </div>
    <div class="col-md-3">
    

    </div>
    
  
    <a class="btn btn-warning" href="admin.php?page=data_buku">Kembali</a>

</div>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"><?= $data["judul"] ?></li>
</ol>
</div>
</div>

<div class="col-md-4 mb-3 ml-3">
    <img src="img/<?= $data["gambar"];?>"witdh="50 px">
</div>
<div class="col-md-12">
<table class="table">
<tbody> 
<tr class="table-default">
    <th>Kode Buku</th>
    <th>: <?=  $data["kode"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Judul</th>
    <th>: <?=  $data["judul"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Pengarang</th>
    <th>: <?=  $data["pengarang"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Penerbit</th>
    <th>: <?=  $data["penerbit"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Tahun</th>
    <th>: <?=  $data["tahun"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Jumlah</th>
    <th>: <?=  $data["stok"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Lokasi</th>
    <th>: <?=  $data["lokasi"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Tanggal Masuk</th>
    <th>: <?=  $data["tgl"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Kota Terbit</th>
    <th>: <?=  $data["kotaterbit"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Klasifikasi</th>
    <th>: <?=  $data["klasifikasi"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Deskripsi</th>
    <th>: <?=  $data["deskripsi"]; ?></th>
</tr>

<tr class="table-default">
    <th width="150">Sumber Buku</th>
    <th>: <?=  $data["sumber"]; ?></th>
</tr>
<tr class="table-default">
    <th width="150">Sinopsi</th>
    <th><textarea rows="4" cols="50"><?=  $data["sinopsis"]; ?></textarea></th>
    <th></th>
    
</tr>


</tbody>
  
</table>
</div>
               
            

               
               


                

