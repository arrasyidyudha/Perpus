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

$pinjam = count(query("SELECT * FROM peminjaman"));
$buku = count(query("SELECT * FROM buku"));
$pengguna = count(query("SELECT * FROM login WHERE level = 'user'"));



?>
<body>

 <div class="row">
    <div class="col-md-3 mb-3 ml-5">
    <div class="card bg-primary text-white mb-5">
    <div class="card-body">Peminjaman</div>
    <h1 class="text-black-30 mx-auto mb-3"><?= $pinjam ?></h1>
    <div class="card-footer d-flex align-items-center justify-content-between">                                   
    </div>
    </div>
    </div>

    <div class="col-md-3 mb-3 ml-5">
    <div class="card bg-white text-white mb-5">
    <div class="card-body">Koleksi Buku</div>
    <h1 class="text-black-30 mx-auto mb-3"><?= $buku ?></h1>
    <div class="card-footer d-flex align-items-center justify-content-between">                                   
    </div>
    </div>
    </div>
    
   
    
    <div class="col-md-3 mb-3 ml-5">
    <div class="card bg-danger text-white mb-5">
    <div class="card-body">Anggota</div>
    <h1 class="text-black-30 mx-auto mb-3"><?= $pengguna ?></h1>
    <div class="card-footer d-flex align-items-center justify-content-between">                                   
    </div>
    </div>
    </div>
    </div>

    </div>
</div>
    


<div class="container text-center ">
  <br>
  <img src="../img/jateng.png" width="10%" class="rounded-circle img-thumbnail">
  <h1 class="text-black-30 mx-auto mt-2 mb-3">PERPUSTAKAAN INSPEKTORAT</h1>
  <h2 >Selamat Datang <?= $_SESSION["username"]; ?></h2>
 
</div>

</body>