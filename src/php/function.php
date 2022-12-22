<?php
    include('config.php');
    
    function Profile2($email){
        global $db;
        
        $query = "Select Nama_Lengkap, NIK, Email, p.* from Akun as a join Peserta as p on a.ID = p.Akun_ID where a.Email = '$email'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);

        return $result;
    }
    
    function getProfile($email){
        global $db;

        $result2 = Profile2($email);
        // var_dump($result2);die;

        if($result2 === NULL){
            $query1 = "Select Nama_Lengkap, NIK from Akun as a Where a.Email = '$email'";
            $result1 = mysqli_query($db, $query1);
            $result1 = mysqli_fetch_assoc($result1);

            return $result1;
        }
        return $result2;
    }
    
    function Login($email, $password){
        global $db;

        $query = "SELECT * FROM akun WHERE Email = '$email'";
        $result = mysqli_query($db, $query);
        

        //check result tidak ada isi atau lebih dari satu
        if(!$result){
            return false;
        }
        // note: stuck sampai ke $result = null; hipotesis: adanya kemungkinan duplikate user, perlu dicheck;
        if(mysqli_num_rows($result) !== 1){
            echo "<script>
            alert('Email tidak ditemukan, coba registrasi bila tidak memiliki akun');
            </script>";
            return false;
        }

        //konfirmasi password
        $result = mysqli_fetch_assoc($result);
        $confirm = password_verify($password, $result["Password"]);
        $role = $result["Role"];
        
        $arr = [$confirm, $role];
        // var_dump($arr);die;
        if(!$arr[0]){
            return false;
        }
        return $arr;
    }
    
    function Registrasi($data){
        global $db;

        // menghubungkan kolom dengan data
        $username = strtolower(stripslashes($data["username"]));
        $nik = stripslashes($data["nik"]);
        $email = stripslashes($data["email"]);
        $password = mysqli_real_escape_string($db, $data["password"]);//123
        $password2 = mysqli_real_escape_string($db, $data["repassword"]);//1234

        // username sudah digunakan;
        $result = mysqli_query($db, "SELECT Nama_Lengkap FROM Akun WHERE Nama_Lengkap = '$username' or Email = '$email'");
        
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                 alert('nama lengkap atau email sudah digunakan');
                 </script>";
            return false;
        }
        
        // verifikasi password dan password2
        if($password !== $password2){
            echo"<script>
                 alert('Password tidak sesuai');
                 </script>";
            return false;
        }

        // var_dump($result);

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // memasukan data ke database
        mysqli_query($db, "INSERT INTO AKUN VALUES('', '$username', '$nik', '$email', '$password', 'peserta')");

        return mysqli_affected_rows($db);
    }

    function pendaftaran($data){
        global $db;

        //set data ke query
        $email = $_SESSION["email"];
        $telepon = $data["telepon"];
        $JK = $data["JK"];
        $tmpt = $data["tmpt"];
        $date = $data["date"];
        $domisili = $data["domisili"];

        // check compare nama lengkap dengan akun
        $result = mysqli_query($db, "select * from Akun as a where a.Email = '$email'");
        if(mysqli_num_rows($result) < 1){
            echo "<script>
            alert('Nama Belum Memiliki Akun')
            </script>";
            return false;
        }
        else{
            $result = mysqli_fetch_assoc($result);

            $akun_id = (int)$result["ID"];
        }

        $pasfoto = uploadpasfoto();
        $foto_ktp = uploadKTP();
        $file_pendukung = uploadberkas();

        // query ke database
        $query = "INSERT INTO peserta VALUES ('','$JK','$telepon', '$tmpt','$date','$domisili','$pasfoto','$foto_ktp', '$file_pendukung', 'belum konfirmasi' ,'$akun_id')";
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

    function uploadpasfoto(){
        $namaFile = $_FILES["pasfoto"]["name"];
        $ukuranFile = $_FILES["pasfoto"]["size"];
        $error = $_FILES["pasfoto"]["error"];
        $tmpName = $_FILES["pasfoto"]["tmp_name"];

        // cek apakah tidak ada file yang diupload
        if($error === 4){
            echo "<script>
                alert('pilih file pasfoto terlebih dahulu')
                </script>";
            return false;
        }

        // cek apakah yang diupload adalah file pdf
        $ekstensifilevalid = ['jpg','jpeg','png'];
        $ekstensifile = explode('.', $namaFile);
        $ekstensifile = strtolower(end($ekstensifile));

        //validasi ekstensi
        if(!in_array($ekstensifile, $ekstensifilevalid)){
            echo "<script>
                alert('format file pasfoto tidak sesuai, hanya menerima jpg, dan png')
                </script>";
            return false;
        }

        //cek ukuran file
        if($ukuranFile > 2000000){
            echo "<script>
                alert('ukuran file pasfoto melebihi kapasitas, hanya menerima 2MB')
                </script>";
            return false;
        }
        
        // lolos pengecekan
        $namaFileBaru = uniqid(); // rename file
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensifile;

        move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
        return($namaFileBaru);
        // var_dump($ekstensifile);die;
    }

    function uploadKTP(){
        $namaFile = $_FILES["foto-ktp"]["name"];
        $ukuranFile = $_FILES["foto-ktp"]["size"];
        $error = $_FILES["foto-ktp"]["error"];
        $tmpName = $_FILES["foto-ktp"]["tmp_name"];

        // cek apakah tidak ada file yang diupload
        if($error === 4){
            echo "<script>
                alert('pilih file Foto KTP terlebih dahulu')
                </script>";
            return false;
        }

        // cek apakah yang diupload adalah file pdf
        $ekstensifilevalid = ['jpg','jpeg','png'];
        $ekstensifile = explode('.', $namaFile);
        $ekstensifile = strtolower(end($ekstensifile));

        //validasi ekstensi
        if(!in_array($ekstensifile, $ekstensifilevalid)){
            echo "<script>
                alert('format file KTP tidak sesuai, hanya menerima jpg, dan png')
                </script>";
            return false;
        }

        //cek ukuran file
        if($ukuranFile > 2000000){
            echo "<script>
                alert('ukuran file KTP melebihi kapasitas, hanya menerima 2MB')
                </script>";
            return false;
        }
        
        // lolos pengecekan
        $namaFileBaru = uniqid(); // rename file
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensifile;

        move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
        return($namaFileBaru);
        // var_dump($ekstensifile);die;
    }

    function uploadberkas(){
        $namaFile = $_FILES["file-pendukung"]["name"];
        $ukuranFile = $_FILES["file-pendukung"]["size"];
        $error = $_FILES["file-pendukung"]["error"];
        $tmpName = $_FILES["file-pendukung"]["tmp_name"];

        // cek apakah tidak ada file yang diupload
        if($error === 4){
            echo "<script>
                alert('pilih file berkas terlebih dahulu')
                </script>";
            return false;
        }

        // cek apakah yang diupload adalah file pdf
        $ekstensifilevalid = 'pdf';
        $ekstensifile = explode('.', $namaFile);
        $ekstensifile = strtolower(end($ekstensifile));

        //validasi ekstensi
        if($ekstensifile !== $ekstensifilevalid){
            echo "<script>
                alert('format file berkas tidak sesuai, hanya menerima pdf')
                </script>";
            return false;
        }

        //cek ukuran file
        if($ukuranFile > 2000000){
            echo "<script>
                alert('ukuran file berkas melebihi kapasitas, hanya menerima 2MB')
                </script>";
            return false;
        }
        
        // lolos pengecekan
        $namaFileBaru = uniqid(); // rename file
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensifile;

        move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
        return($namaFileBaru);
        // var_dump($ekstensifile);die;
    }

    function update($email, $data){
        global $db;

        $nama = $data["nama"];
        $email_pengganti = $data["email"];
        $tlp = $data["telepon"];
        $JK = $data["JK"];
        $tmpt = $data["tmpt"];
        $tgl = $data["date"];
        $domisili = $data["domisili"];
        $nik = $data["nik"];

        $query = "SELECT * from Akun Where Email = '$email'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);

        $ID = $result["ID"];

        $query = "UPDATE Akun SET Nama_Lengkap = '$nama', Email = '$email_pengganti', NIK = '$nik' Where ID = '$ID'";
        $result = mysqli_query($db, $query);
        if( $result ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location:./profil.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }

        $query = "UPDATE peserta SET Tlp='$tlp', JK='$JK', TmptLahir='$tmpt', TglLahir='$tgl', Domisili='$domisili' WHERE Akun_ID = $ID";
        $result = mysqli_query($db, $query);
        if( $result ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location:./profil.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }
        var_dump($result); die;
    }

    function confirm($email){
        global $db;

        $query = "SELECT ID from Akun Where Email = '$email'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);

        $ID = $result["ID"];
        // var_dump($ID);die;

        $query = "SELECT * from Peserta Where Akun_ID = '$ID'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);
        // var_dump($result);die;

        $query = "UPDATE peserta SET status='menunggu verifikasi' WHERE Akun_ID = $ID";
        $result = mysqli_query($db, $query);
        // var_dump($result);die;
        
        return mysqli_affected_rows($db);
    }

    function security_admin($email){
        global $db;

        $query = "SELECT Role from Akun Where Email = '$email'";
        $result = mysqli_query($db, $query);
        $result = mysqli_fetch_assoc($result);
        $confirm = $result["Role"];
        // var_dump($confirm);die;
        if($confirm !== 'admin'){
            // var_dump($result);die;
            return false;
        }
        return true;
    }

    function allVerification(){
        global $db;

        $query = "SELECT P_ID, Nama_Lengkap, NIK, JK, TmptLahir, TglLahir, PasFoto, FotoKTP, Berkas, Status from Akun as a Join Peserta as p On a.ID = p.Akun_ID";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function canVerification(){
        global $db;

        $query = "SELECT P_ID, Nama_Lengkap, NIK, JK, TmptLahir, TglLahir, PasFoto, FotoKTP, Berkas, Status from Akun as a Join Peserta as p On a.ID = p.Akun_ID where p.Status = 'menunggu verifikasi'";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function verification($data){
        global $db;
        // var_dump($data);

        $query = "UPDATE PESERTA SET STATUS = 'Sudah Verifikasi' where P_ID = '$data'";
        $result = mysqli_query($db, $query);
        if(!$result){
            return false;
        }
        return true;
    }

    function reject($data){
        global $db;
        // var_dump($data);

        $query = "UPDATE PESERTA SET STATUS = 'Ditolak' where P_ID = '$data'";
        $result = mysqli_query($db, $query);
        if(!$result){
            return false;
        }
        return true;
    }
?>