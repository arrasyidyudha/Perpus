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

    if(kembali($id) > 0 ){

        echo "<script>
        alert('Buku berhasil dikembalikan!');
        window.location='admin.php?page=data_kembali';
    </script>";
	} else {
        echo "<script>
        alert('Buku gagal dikembalikan!');
        window.location='admin.php?page=data_kembali';
    </script>";
	}

    
   


?>