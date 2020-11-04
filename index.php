<?php 
require './apps/function.php';

// ambil data
 $data = query("SELECT * FROM buku WHERE id = 0");

 if( isset($_POST["cari"])){
     $data = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PERPUSTAKAAN</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/jateng.png">
    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand js-scroll-trigger">
                    <img src="img/prov1.png" height="60px" alt="Name" class="brand-image img-circle elevation-3" style="opacity: 1">
                    <span class="brand-text font-weight-light"></span>
                </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cari">Daftar Buku</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Menu </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Pencarian</a>
                            <a class="dropdown-item" href="./apps/login.php?page=login_menu">Login</a>
                           
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section id="home">
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h3 class="text-black-30 mx-auto">PERPUSTAKAAN </h3>
                <h3 class="text-black-30 mx-auto mt-2 mb-5"> INSPEKTORAT PROV. JATENG</h3>
                
                <form action="#cari" method="post" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" size= "40" type="text" name="keyword" placeholder="Pencarian buku... " aria-label="Search" autofocus autocomplete="off">
                        <div class="input-group-append">
                            <button href="#cari" class="btn btn-primary js-scroll-trigger" name="cari" value="cari" type="submit">
                <i class="fas fa-search"></i>
              </button>
              </div>
              </div>
              </form>
              <br>
              <h2 class="text-black-20 mx-auto"><?php date_default_timezone_set('Asia/Jakarta');
            echo date("l, d F Y"); 
            ?></h2>
            </div>
</div>
    
 

</section>
    <!-- Projects Section -->
    <section id="cari" class="signup-section">
    
        <div class="container md-5 mt-3">
          
        <div class="col-md-12" style="overflow-x: auto">
            <div id="table" class="bg-dark">           
            <table class="table bg-light">
                <thead class="thead-light">
             <tr>
             <th colspan="5"> </th>
             <th colspan="6">
             <?php 
              if(isset($_POST['cari'])){
	          $cari = $_POST['keyword'];
	          echo "<b>Hasil pencarian : ".$cari."</b>";
              } ?></th>
            
             <tr>
            
            <th scope="col">Kode </th>
            <th scope="col">Cover</th>
            <th colspan="2">Judul</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tahun</th>
            <th scope="col">ISBN</th>
            <th scope="col">Stok</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Deskripsi</th>
        
            </tr>
             </tr>   
           
            </thead>

        
 
        <?php
        foreach ( $data as $row ): ?>

                <tr>
               
                 <td><?=  $row["kode"]; ?></td>   
                 <td><img src="img/<?= $row["gambar"]; ?>" witdh="50 px"></td>
                 <td colspan="2"><?=  $row["judul"]; ?></td> 
                 <td><?=  $row["pengarang"]; ?></td> 
                 <td><?=  $row["penerbit"]; ?></td> 
                 <td><?=  $row["tahun"]; ?></td>   
                 <td><?=  $row["isbn"]; ?></td>  
                 <td><?=  $row["stok"]; ?></td>   
                 <td><?=  $row["lokasi"]; ?></td> 
                 <td><?=  $row["deskripsi"]; ?></td>   
                
                
            </tr>
      
        <?php  endforeach; ?>

        <tr>
             <th colspan="4"> </th>
             <th colspan="6">
             <?php 
              if(!isset($_POST['cari'])){
	          
	          echo "<b style='font-style: italic'> Pencarian kosong! silahkan masukan kata kunci dikolom pencarian </b>";
              } ?></th>
             <th> </th>
             <tr>

            </table>
        </div>

            
        </div>
    </section>

   


    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        <div class="container">
         <div class="col">           
             <div class="">
                <a href="#" class="mx-2">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
              <br>
        </div>
            Copyright &copy; <?php echo date("Y");?>  All Rights Reserved by Inspektorat Provinsi Jawa Tengah   
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>


</body>

</html>