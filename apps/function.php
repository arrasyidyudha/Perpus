<?php 
    $conn = mysqli_connect("localhost","root","","perpus");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows =[];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }


        function tambah($data){
        global $conn;
        $id = $data["id"];
        $kode = htmlspecialchars($data["kode"]);
        $gambar = upload();
        if(!$gambar){
            return false;
        }
        $judul = htmlspecialchars($data["judul"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $tahun = htmlspecialchars($data["tahun"]);
        $isbn = htmlspecialchars($data["isbn"]);
        $stok = htmlspecialchars($data["stok"]);
        $lokasi = htmlspecialchars($data["lokasi"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $kotaterbit = htmlspecialchars($data["kotaterbit"]);
        $klasifikasi = htmlspecialchars($data["klasifikasi"]);
        $sinopsis = htmlspecialchars($data["sinopsis"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $sumber = htmlspecialchars($data["sumber"]);
        

        $query= "INSERT INTO buku  VALUES ('','$kode','$gambar','$judul','$pengarang','$penerbit','$tahun',
	    '$isbn','$stok','$lokasi','$tgl','$kotaterbit','$klasifikasi','$sinopsis','$deskripsi','$sumber')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

        
    }

    function tambah_admin($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $username = strtolower(stripslashes($data["username"]));
        $result = mysqli_query($conn, "SELECT username FROM login WHERE username = '$username'");
        $level = htmlspecialchars($data["level"]);
        if (mysqli_fetch_assoc($result)){
            echo "<script>
            alert('Username sudah digunakan!');
            </script>";

            return false;
        }

        $password = mysqli_real_escape_string($conn, $data["password"]);

        $password = password_hash($password, PASSWORD_DEFAULT);

        //cek admin
       

        $query= "INSERT INTO login  VALUES ('','$nama','$username','$password','$level')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

        
    }

    function tambah_user($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);

        $query= "INSERT INTO user VALUES ('','$nama','$username','$password')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }

    

    function upload(){
       $namafile = $_FILES ['gambar']['name'];
       $ukuranfile = $_FILES ['gambar']['size'];
       $error = $_FILES ['gambar']['error'];
       $tmpname = $_FILES ['gambar']['tmp_name'];


       $ekstensivalid = ['jpg','jpeg','png'];
       $ekstensigambar = explode('.', $namafile);

       //ekstensi
       $ekstensigambar = strtolower(end($ekstensigambar));
       if(!in_array($ekstensigambar, $ekstensivalid)){
        echo "<script>
        alert('File yang anda upload bukan gambar! silahkan coba kembali');
         </script>";
         return false;
       }

       // ukuran
       if($ukuranfile > 2500000 ){
        echo "<script>
        alert('File yang anda upload terlalu besar');
         </script>";
         return false;
       }

       // upload
       move_uploaded_file($tmpname, 'img/' . $namafile);

       return $namafile;

    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function hapus_admin($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM login WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function hapus_user($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM user WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
        $id = $data["id"];
        $kode = htmlspecialchars($data["kode"]);
        $gambar = $data["gambar"];
        $judul = htmlspecialchars($data["judul"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $tahun = htmlspecialchars($data["tahun"]);
        $isbn = htmlspecialchars($data["isbn"]);
        $stok = htmlspecialchars($data["stok"]);
        $lokasi = htmlspecialchars($data["lokasi"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $kotaterbit = htmlspecialchars($data["kotaterbit"]);
        $klasifikasi = htmlspecialchars($data["klasifikasi"]);
        $sinopsis = htmlspecialchars($data["sinopsis"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $sumber = htmlspecialchars($data["sumber"]);
       

        $query= "UPDATE buku  set kode = '$kode', gambar = '$gambar', judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun',
	    isbn = '$isbn', stok = '$stok', lokasi = '$lokasi', tgl = '$tgl', kotaterbit = '$kotaterbit', klasifikasi ='$klasifikasi', 
        sinopsis = '$sinopsis', deskripsi = '$deskripsi', sumber = '$sumber' WHERE id = $id ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubah_admin($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $level = htmlspecialchars($data["level"]);

        $query= "UPDATE login set id = '$id', nama = '$nama', username = '$username', password = '$password', level = '$level'
        WHERE id = $id ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubah_user($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
       

        $query= "UPDATE user set id = '$id', nama = '$nama', username = '$username', password = '$password'
        WHERE id = $id ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function cari ($keyword) {
        $query = "SELECT * FROM buku WHERE kode LIKE '%$keyword%' OR judul LIKE '%$keyword%'
        OR pengarang LIKE '%$keyword%' OR penerbit LIKE '%$keyword%' OR tahun LIKE '%$keyword%'
        OR isbn LIKE '%$keyword%' OR lokasi LIKE '%$keyword%'  ";
        return query($query);
    }

    function cari_by_admin ($keyword) {
        $query = "SELECT * FROM buku WHERE kode LIKE '%$keyword%' OR judul LIKE '%$keyword%'
        OR pengarang LIKE '%$keyword%' OR penerbit LIKE '%$keyword%' OR tahun LIKE '%$keyword%'
        OR isbn LIKE '%$keyword%' OR lokasi LIKE '%$keyword%' OR klasifikasi LIKE '%$keyword%'  ";
        return query($query);
    }

    function cari_admin ($keyword) {
        $query = "SELECT * FROM login WHERE id LIKE '%$keyword%' OR nama LIKE '%$keyword%'
        OR username LIKE '%$keyword%' ";
        return query($query);
    }

    function cari_user ($keyword) {
        $query = "SELECT * FROM login WHERE id LIKE '%$keyword%' OR nama LIKE '%$keyword%'
        OR username LIKE '%$keyword%' ";
        return query($query);
    }

    function cari_peminjam ($keyword) {
        $query = "SELECT * FROM peminjaman WHERE id LIKE '%$keyword%' OR kodepinjam LIKE '%$keyword%' OR username LIKE '%$keyword%' OR nama LIKE '%$keyword%'
        OR kodebuku LIKE '%$keyword%' OR pinjam LIKE '%$keyword%' ";
        return query($query);
    }
    

    function riwayat ($keyword) {
        $query = "SELECT * FROM riwayat WHERE id LIKE '%$keyword%' OR kodepinjam LIKE '%$keyword%' OR username LIKE '%$keyword%' OR nama LIKE '%$keyword%'
        OR kodebuku LIKE '%$keyword%' OR pinjam LIKE '%$keyword%' ";
        return query($query);
    }
    function pinjam($data){
        global $conn;
        $id = $data["id"];
        $kodebuku = htmlspecialchars($data["kode"]);
        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $judul = htmlspecialchars($data["judul"]);
        $pinjam = $data["pinjam"];
        $kembali = $data["kembali"];
        $kodepinjam = $data["kodepeminjaman"];
        $status = $data["status"];
       
        $query= "INSERT INTO peminjaman  VALUES ('$id','$kodebuku','$nama','$username','$judul','$pinjam','$kembali','','Permintaan sedang diproses')";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }

    function validasi($data){
        global $conn;
        $id = $data["id"];
        $kodebuku = htmlspecialchars($data["kode"]);
        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $judul = htmlspecialchars($data["judul"]);
        $pinjam = $data["pinjam"];
        $kembali = $data["kembali"];
        $kodepinjam = $data["kodepinjam"];
        $query= "INSERT INTO riwayat  VALUES ('$id','$kodebuku','$nama','$username','$judul','$pinjam','$kembali','$kodepinjam')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function kembali($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM peminjaman WHERE kodepinjam = $id");
        return mysqli_affected_rows($conn);
    }
    function batalkan($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM peminjaman WHERE kodepinjam = $id");
        return mysqli_affected_rows($conn);
    }

  

 

?>