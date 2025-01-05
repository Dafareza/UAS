<?php
      include 'koneksi.php';

      $query = "SELECT * fROM tb_siswa;";
      $sql = mysqli_query($conn, $query);
      $no = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="-utf-8">
    <!--Bootstraps-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>

<!--Font-->
<link rel="stylesheet" href="font/css/font-awesome.min.css">

<!--Data tables-->
<link rel="stylesheet" type="text/css" href="datatables/datatables.css">
<script type="text/javascript" src="datatables/datatables.js"></script>

    <title>Pendaftaran Siswa baru</title>
</head>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dt').DataTable();
  }
);
</script>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            PENDAFTARAN SISWA BARU SDN KARANGJATI
          </a>
        </div>
      </nav>

      <!--judul-->
      
     <div class="container">
        <h1 class="mt-4">Data Siswa Baru</h1>
        <figure>
          <blockquote class="blockquote">
            <p>Pendaftaran Siswa Baru</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            <cite title="Source Title">SDN KARANGJATI</cite>
          </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah
        </a>
        <div class="table-responsive">
            <table id="dt" class="table align-middle cell-border">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th>NISN</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Foto Siswa</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                     while($result = mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                  <td><center> 
                      <?php echo ++$no; ?>.
                  </center></td>
                  <td> 
                      <?php echo $result['nisn']; ?>
                  </td>
                  <td> 
                      <?php echo $result['nama_siswa']; ?>
                  </td>
                  <td> 
                      <?php echo $result['jenis_kelamin']; ?>
                  </td>
                  <td>
                    <img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 100px;">
                  </td>
                  <td>
                      <?php echo $result['alamat']; ?>
                  </td>
                  <td>
                    <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut???')">
                        <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                      <?php
                     }
                     ?>
                <tr class="align-bottom"> 
                </tr>
                </tbody>
            </table>
        </div>
     </div>
</body>
</html>