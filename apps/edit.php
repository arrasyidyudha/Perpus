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
$edit = query("SELECT * FROM buku WHERE id = $id")[0];

 //cek tombol submit
if( isset($_POST["submit"])){

	
if(ubah($_POST) > 0 ){
	
	
		echo "
		<script>
		alert('Data berhasil diubah!');
        window.location.href='admin.php?page=data_buku';
		</script>
		
	";
	} else {
		echo "
		<script>
		alert('Data gagal diubah!');
        window.location.href='admin.php?page=edit&id=$id';
	
		</script>
		
	";
	}

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

<div class="container">
  <div class="row">
    <div class="col-md">
    <h1 class="text-black-30 mx-auto">Edit Buku</h1>
    </div>
    <div class="col-md-3">
    

    </div>
    
  
    <a class="btn btn-primary" href="admin.php?page=data_buku">Kembali</a>

</div>

</div>
</div>
<br>
	<div class="container">
    <form action="" method="post">
    <div class="form-row">
				<div class="hidden">
			      <label for="validationCustom01"></label>
			      <input name="id"  type="hidden" class="hidden" id="validationCustom01" value="<?= $edit["id"];?>" placeholder="ID" required autocomplete="off">
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="validationCustom01">Kode</label>
			      <input name="kode"  type="text" class="form-control" id="validationCustom01" value="<?= $edit["kode"];?>" placeholder="Kode buku" required autocomplete="off">
			    </div>
                <div class="col-md-4 mb-3 ml-3">
			      <label for="validationCustom01">Gambar</label>
			      <input name="gambar"  type="text" class="form-control" id="validationCustom01" value="<?= $edit["gambar"];?>" placeholder="" required autocomplete="off" readonly>
			    </div>
                <div class="col-md-4 mb-3">
			      <label for="validationCustom02">Judul</label>
			      <input name="judul"  type="text" class="form-control" id="validationCustom02" value="<?= $edit["judul"];?>" placeholder="Judul buku" required autocomplete="off">
                </div>
			    <div class="col-md-4 mb-3 ml-3">
			      <label for="validationCustom02">Pengarang</label>
			      <input name="pengarang"  type="text" class="form-control" id="validationCustom02" value="<?= $edit["pengarang"];?>" placeholder="Pengarang" required autocomplete="off">
                </div>
                
			    <div class="col-md-4 mb-3">
			      <label for="validationCustom02">Penerbit</label>
			      <input name="penerbit" type="text" class="form-control" id="validationCustom02" value="<?= $edit["penerbit"];?>" placeholder="Penerbit" required autocomplete="off">
                </div>
                <div class="col-md-4 mb-3 ml-3">
			      <label for="validationCustom01">Tahun</label>
			      <input name="tahun" type="text" class="form-control" id="validationCustom01" value="<?= $edit["tahun"];?>" placeholder="Tahun cetakan" required autocomplete="off">
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="validationCustom02">ISBN</label>
			      <input name="isbn" type="text" class="form-control" id="validationCustom02" value="<?= $edit["isbn"];?>" placeholder="Nomor ISBN" required autocomplete="off">
                </div>
                <div class="col-md-4 mb-3 ml-3">
				<label for="validationCustom02">Stok</label>
				<input name="stok" type="text" class="form-control" id="validationCustom02" value="<?= $edit["stok"];?>" placeholder="Jumlah buku" required autocomplete="off">
				</div>
				<div class="col-md-4 mb-3">
				<label for="validationCustom02">Lokasi</label>
				<input name="lokasi" type="text" class="form-control" id="validationCustom02" value="<?= $edit["lokasi"];?>" placeholder="Lokasi" required autocomplete="off">
				</div>

				<div class="col-md-4 mb-3 ml-3">
				<label for="validationCustom02">Tanggal Masuk</label>
				<input name="tgl" type="date" class="form-control" id="validationCustom02" value="<?= $edit["tgl"];?>" placeholder="" required autocomplete="off">
				</div>
				
				<div class="col-md-4 mb-3">
				<label for="validationCustom02">Kota Terbit</label>
  				<input name="kotaterbit" type="text" class="form-control" id="validationCustom02" value="<?= $edit["kotaterbit"];?>" placeholder="Kota terbit" required autocomplete="off">
				</div>
                <div class="col-md-4 mb-3 ml-3">
				<label for="validationCustom02">Klasifikasi</label>
  				<input name="klasifikasi" type="text" class="form-control" id="validationCustom02" value="<?= $edit["klasifikasi"];?>" placeholder="Klasifikasi" required autocomplete="off">
				</div>
                <div class="col-md-4 mb-3">
				<label for="validationCustom02">Deskripsi</label>
  				<input name="deskripsi" type="text" class="form-control" id="validationCustom02" value="<?= $edit["deskripsi"];?>" placeholder="Deskripsi buku" required autocomplete="off">
				</div>
				<div class="col-md-4 mb-3 ml-3">
				<label for="validationCustom02">Sumber Buku</label>
  				<input name="sumber" type="text" class="form-control" id="validationCustom02" value="<?= $edit["sumber"];?>" placeholder="Sumber buku" required autocomplete="off">
				</div>
                <div class="col-md-5 mb-3 ">
				<label for="validationCustom02">Sinopsis</label>
  				<textarea name="sinopsis" type="text" class="form-control" id="validationCustom02" value="<?= $edit["sinopsis"];?>" placeholder="" required autocomplete="off"><?= $edit["sinopsis"];?></textarea>
				</div>
                
               
</div>
			  <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
</div>

                

