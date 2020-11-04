
<?php
if (!isset($_SESSION["login"])){
  header("location: login.php?page=login_menu");
  exit;
}
if (defined("ADMIN")==false)
{
    //tidak punya cap
    die("You shall not pass!");
}
?>

<?php 
require 'function.php';
$user = $_SESSION["username"];
//setting
  $dataperhalaman = 5;
  $jumlahdata = count(query("SELECT * FROM riwayat"));
  $jumlahhalaman = ceil($jumlahdata / $dataperhalaman);
  $aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  $awaldata = ($dataperhalaman * $aktif) - $dataperhalaman;
  
// ambil data

$data = query("SELECT * FROM riwayat LIMIT $awaldata, $dataperhalaman");

if( isset($_POST["cari"])){
    $data = riwayat($_POST["keyword"]);
   
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
<h1 class="text-black-30 mx-auto mt-2 mb-3" >Riwayat</h1>

<div class="container">
  <div class="row">
  <div class="col-md">
  
  </div>
    <div class="col-md ml-0">
   <form action="" method="post" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" size= "40" type="text" name="keyword" placeholder="Pencarian..." aria-label="Search" autofocus autocomplete="off">
                        <div class="input-group-append">
                            <button href="table" class="btn btn-primary" name="cari" value="cari" type="submit">
                <i class="fas fa-search"></i>
              </button>
              </div>
              </div>
              </form>

    </div>
    
  </div>
</div>

<br>
<div class="card-light">

<div class="col-md-12" style="overflow-y: auto">

<table class="table">
<thead class="thead-light">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Kode Peminjaman</th>
      <th scope="col">Nomor Anggota</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Username</th>
      <th scope="col">Kode Buku</th>
      <th scope="col">Judul</th>
      <th scope="col">Tanggal Pinjam</th>
      <th scope="col">Tanggal Kembali</th>
     
     
      <th scope="col"></th>
    </tr>
  </thead>
    <?php $i=1; ?>
    <?php
        foreach ( $data as $row ): ?>

                <tr>
                 <td><?=  $i; ?></td>
                 <td><?=  $row["kodepinjam"]; ?></td>   
                 <td><?=  $row["id"]; ?></td> 
                 <td><?=  $row["nama"]; ?></td>
                 <td><?=  $row["username"]; ?></td>  
                 <td><?=  $row["kodebuku"]; ?></td> 
                 <td><?=  $row["judul"]; ?></td>   
                 <td><?=  $row["pinjam"]; ?></td>  
                 <td><?=  $row["kembali"]; ?></td>   

                 
                
                
            </tr>
        <?php $i++; ?>
        <?php  endforeach; ?>
        </div>
</table>
        </div>
        </div>
          <div class="mt-2">
          <div class="container content-center text-center">

          <?php if ($aktif > 1 ) : ?>
          <a href="?page=data_riwayat&&halaman=<?= $aktif - 1;  ?>" class="btn btn-primary">&laquo; Prev </a>
          <?php endif; ?>

          <?php for( $i=1; $i <= $jumlahhalaman; $i++ ) : ?>
            <?php if($i == $aktif ) : ?> 
            <a href="?page=data_riwayat&&halaman=<?= $i; ?>" class="btn btn-primary"><?= $i; ?></a>
            <?php else: ?>
            <a href="?page=data_riwayat&&halaman=<?= $i; ?>" class="btn btn-default"><?= $i; ?></a>
            <?php endif;?>
            <?php endfor; ?>

            <?php if ($aktif < $jumlahhalaman ) : ?>
            <a href="?page=data_riwayat&&halaman=<?= $aktif + 1;  ?>" class="btn btn-primary">Next &raquo;</a>
          <?php endif; ?></div>
          </div>
       
        

