<?php
if (defined("USER")==false)
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



?>
<h2> Dashboard </h2>
<div class="container text-center ">
  <br>
  <img src="../img/jateng.png" width="15%" class="rounded-circle img-thumbnail">
  <h1 class="text-black-30 mx-auto mt-2 mb-3">PERPUSTAKAAN INSPEKTORAT</h1>
  <h2 >Selamat Datang <?= $_SESSION["username"]; ?></h2>
 
</div>

