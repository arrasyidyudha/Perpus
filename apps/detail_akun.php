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
require'function.php';
$id = $_GET["id"];

//ambil data 
$data = query("SELECT * FROM login WHERE id = $id")[0];

 

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

<div class="container">
  <div class="row">
    <div class="col-md">
    <h1 class="text-black-30 mx-auto">Detail Akun</h1>
    </div>
    <div class="col-md-3">
    

    </div>
    
  
    <a class="btn btn-warning" href="admin.php?page=data_akun">Kembali</a>

</div>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active"></li>
</ol>
</div>
</div>

<div class="col-md-4 mb-3 ml-3">
   
</div>
<div class="col-md-12">
<table class="table">
<tbody> 
<tr class="table-default">
    <th>Nomor Anggota</th>
    <td>: <?=  $data["id"]; ?></td>
</tr>

<tr class="table-default">
    <th width="150">Nama</th>
    <td>: <?=  $data["nama"]; ?></td>
</tr>

<tr class="table-default">
    <th width="150">Username</th>
    <td>: <?=  $data["username"]; ?></td>
</tr>

<tr class="table-default">
    <th width="150">Password</th>
    <td>: ********</td>
</tr>


<tr class="table-default">
    
    <th width="150"><a class="btn btn-primary" href="admin.php?page=edit_admin&id=<?= $id ?>">Edit</a></th>
</tr>


</tbody>
  
</table>
</div>
               
            

               
               


                

