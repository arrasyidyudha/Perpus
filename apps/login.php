
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/.png">
    <title> PERPUSTAKAAN | Login</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-sm bg-white navbar-light" id="mainNav">
        <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger">
                <img src="../img/prov1.png" height="50 px" />
            </a>
           
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
           </button>
            <div class="collapse navbar-collapse" id="navbarResponsive"></div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
        </div>


    </nav>
    <div>
    <div class="d-flex" id="wrapper">

<!-- Sidebar -->


<!-- /#sidebar-wrapper -->
<section id="projects" class="projects-section bg-white">
<div id="page-content-wrapper">
      <div class="row">
        <div>
          <br>
        </div>
        <div class="container-fluid m-sm-5 md-5 m-auto ">
            <!-- Featured Project Row -->
                <img class="img-fluid md-5" src="../img/arsip.png"  alt="gambar" width=" 600 " height="350">
                </div>
</section>
    <!-- Page Content -->
  
    <div id="page-content-wrapper">
      <div class="row">
        <div class="container-fluid m-sm-5 ">
        
        
        <?php
				define("LOGIN", true);
				if (isset($_GET['page'])) {
					// ada variabel page
					$page = $_GET['page'];
				} else {
					$page = $_GET['dashboard'];
				}
				require("koneksi.php");
				require($page. ".php");
				?>
        </div>
      </div>
    </div>
   

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>