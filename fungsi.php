<?php
    include 'koneksi.php';

    function tambah_data ($data, $_files){

        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $foto = $_files['foto']['name'];
        $alamat = $data['alamat'];

        $dir = "img/";
        $tmpFile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpFile, $dir.$foto);

        $query = "INSERT INTO tb_siswa VALUES(null,'$nisn','$nama_siswa','$jenis_kelamin','$foto','$alamat')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data, $files){
        $id_siswa = $data['id_siswa'];
        $nisn = $data['nisn'];
        $nama_siswa = $data['nama_siswa'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
    
        // Dapatkan informasi siswa
        $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);
    
        // Mendapatkan file foto baru
        $fotoBaru = $files['foto']['name'];
    
        if ($fotoBaru != "") {
            // Jika ada foto baru, hapus foto lama
            unlink("img/" . $result['foto_siswa']);
            // Tentukan foto baru
            $foto = $fotoBaru;
            // Pindahkan foto baru ke folder
            move_uploaded_file($files['foto']['tmp_name'], 'img/' . $foto);
        } else {
            // Jika tidak ada foto baru, gunakan foto yang lama
            $foto = $result['foto_siswa'];
        }
    
        // Lakukan update ke database
        $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto_siswa='$foto' WHERE id_siswa='$id_siswa';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $id_siswa = $data['hapus'];

    $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    //var_dump($result);

    unlink("img/".$result['foto_siswa']);

    $query= "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

    }
?>