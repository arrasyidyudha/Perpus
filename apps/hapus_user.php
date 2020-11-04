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

    if(hapus_user($id) > 0 ){

        echo "<script>
        alert('Data berhasil dihapus!');
        window.location='admin.php?page=data_user';
    </script>";
	} else {
        echo "<script>
        alert('Data gagal dihapus!');
        window.location='admin.php?page=data_user';
    </script>";
	}

    
   


?>