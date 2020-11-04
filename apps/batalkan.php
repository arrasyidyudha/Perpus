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
    $id = $_GET['id'];

    if(batalkan($id) > 0 ){

        echo "<script>
        alert('Permintaan telah dibatalkan!');
        window.location='admin.php?page=data_pinjam';
    </script>";
	} else {
        echo "<script>
        alert('Coba sekali lagi');
        window.location='admin.php?page=data_pinjam';
    </script>";
	}

    
   


?>