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

//setting
$dataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM buku"));
$jumlahhalaman = ceil($jumlahdata / $dataperhalaman);
$aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($dataperhalaman * $aktif) - $dataperhalaman;

// ambil data
 $data = query("SELECT * FROM login LIMIT $awaldata, $dataperhalaman");

 if( isset($_POST["cari"])){
  $data = cari_admin($_POST["keyword"]);

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
<h1 class="text-black-30 mx-auto mt-2 mb-3">Data Akun</h1>
<div class="container">
  <div class="row">
    <div class="col-md">
    <a class="btn btn-success" href="admin.php?page=tambah_admin">Tambah Pengguna</a>
    </div>
    <div class="col-md">
    <form action="" method="post" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" size= "40" type="text" name="keyword" placeholder="Pencarian" aria-label="Search" autofocus autocomplete="off">
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

    

<div class="col-md-12" style="overflow-y: auto">

<table class="table">
<thead class="thead-light">
    <tr>
    <th scope="col">No.</th>
      <th scope="col">Nomor Anggota</th>
      <th scope="col">Nama</th>
      <th scope="col">Username </th>
      <th>Aksi</th>
      <th></th>
    </tr>
  </thead>
    <?php $i=1; ?>
    <?php
        foreach ( $data as $row ): ?>

                <tr>
                 <td><?=  $i; ?></td>
                 <td><?=  $row["id"]; ?></td>   
                 <td><?=  $row["nama"]; ?></td> 
                 <td><?=  $row["username"]; ?></td> 
                
          
                 <td>
                    <a class="btn btn-primary" href="admin.php?page=detail_akun&id=<?= $row["id"]; ?>">Detail</a>
                 </td>
                 <td>
                    <a class="btn btn-danger" href="admin.php?page=hapus_admin&id=<?= $row["id"]; ?>" 
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                  </td>
            </tr>
        <?php $i++; ?>
        <?php  endforeach; ?>

</table>

        </div>
        </div>

        <div class="mt-2">
          <div class="container content-center text-center">

          <?php if ($aktif > 1 ) : ?>
          <a href="?page=data_akun&&halaman=<?= $aktif - 1;  ?>" class="btn btn-primary">&laquo; Prev </a>
          <?php endif; ?>

          <?php for( $i=1; $i <= $jumlahhalaman; $i++ ) : ?>
            <?php if($i == $aktif ) : ?> 
            <a href="?page=data_akun&&halaman=<?= $i; ?>" class="btn btn-primary"><?= $i; ?></a>
            <?php else: ?>
            <a href="?page=data_akun&&halaman=<?= $i; ?>" class="btn btn-default"><?= $i; ?></a>
            <?php endif;?>
            <?php endfor; ?>

            <?php if ($aktif < $jumlahhalaman ) : ?>
            <a href="?page=data_akun&&halaman=<?= $aktif + 1;  ?>" class="btn btn-primary">Next &raquo;</a>
          <?php endif; ?></div>
          </div>