
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

//setting
  $dataperhalaman = 3;
  $jumlahdata = count(query("SELECT * FROM buku"));
  $jumlahhalaman = ceil($jumlahdata / $dataperhalaman);
  $aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  $awaldata = ($dataperhalaman * $aktif) - $dataperhalaman;
  
// ambil data
 $data = query("SELECT * FROM buku LIMIT $awaldata, $dataperhalaman");




 if( isset($_POST["cari"])){
  $data = cari_by_admin($_POST["keyword"]);
  

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
<h1 class="text-black-30 mx-auto mt-2 mb-3" >Data buku</h1>

<div class="container">
  <div class="row">
    <div class="col-md">
    <a class="btn btn-success" href="admin.php?page=tambah">Tambah Buku</a>
    </div>
    <div class="col-md">
    <form action="" method="post" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" size= "40" type="text" name="keyword" placeholder="Pencarian buku" aria-label="Search" autofocus autocomplete="off">
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
      <th scope="col">Kode </th>
      <th scope="col">Gambar</th>
      <th scope="col">Judul</th>
      <th scope="col">Pengarang</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Tahun</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Lokasi</th>
      <th scope="col"></th>
      <th scope="col">Aksi</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <?php $i=1; ?>
    <?php
        foreach ( $data as $row ): ?>

                <tr>
                 <td><?=  $i; ?></td>
                 <td><?=  $row["kode"]; ?></td>   
                 <td><img src="img/<?= $row["gambar"]; ?>" witdh="50 px"></td>
                 <td><?=  $row["judul"]; ?></td> 
                 <td><?=  $row["pengarang"]; ?></td> 
                 <td><?=  $row["penerbit"]; ?></td> 
                 <td><?=  $row["tahun"]; ?></td>   
                
                 <td><?=  $row["stok"]; ?></td>   
                 <td><?=  $row["lokasi"]; ?></td> 
                
                 <td> 
                   <a class="btn btn-primary" href="admin.php?page=detail&id=<?= $row["id"]; ?>">Detail</a>
                 </td>
                
                 <td>
                 
                    <a class="btn btn-danger" href="admin.php?page=hapus_buku&id=<?= $row["id"]; ?>" 
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                 </td>

                 <td> 
                   <a class="btn btn-info" href="admin.php?page=edit&id=<?= $row["id"]; ?>"><i class="fa fa-edit"></i></a>
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
          <a href="?page=data_buku&&halaman=<?= $aktif - 1;  ?>" class="btn btn-primary">&laquo; Prev </a>
          <?php endif; ?>

          <?php for( $i=1; $i <= $jumlahhalaman; $i++ ) : ?>
            <?php if($i == $aktif ) : ?> 
            <a href="?page=data_buku&&halaman=<?= $i; ?>" class="btn btn-primary"><?= $i; ?></a>
            <?php else: ?>
            <a href="?page=data_buku&&halaman=<?= $i; ?>" class="btn btn-default"><?= $i; ?></a>
            <?php endif;?>
            <?php endfor; ?>

            <?php if ($aktif < $jumlahhalaman ) : ?>
            <a href="?page=data_buku&&halaman=<?= $aktif + 1;  ?>" class="btn btn-primary">Next &raquo;</a>
          <?php endif; ?></div>
          </div>
       
        

