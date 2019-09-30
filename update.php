<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('db.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['npm'])) {
          //query SQL
          $npm_upd = $_GET['npm'];
          $query = "SELECT * FROM mhs WHERE npm = '$npm_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }  
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $npm = $_POST['npm'];
      $nama = $_POST['nama'];
      $ttl = $_POST['ttl'];
      $umur = $_POST['umur'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $alamat = $_POST['alamat'];
      $no_tlf = $_POST['no_tlf'];
      $goldar = $_POST['goldar'];
      $agama = $_POST['agama'];
      //query SQL
      $sql = "UPDATE mhs SET nama='$nama', ttl='ttl', umur='umur', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_tlf='no_tlf', goldar='goldar', agama='agama' WHERE npm='$npm'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: index.php?status='.$status);
  }
  

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          

          <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
          <form action="update.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>NPM</label>
              <input type="text" class="form-control" placeholder="NPM mahasiswa" name="npm" value="<?php echo $data['npm'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama mahasiswa" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>ttl</label>
              <input type="text" class="form-control" placeholder="Ttl mahasiswa" name="ttl" value="<?php echo $data['ttl'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Umur</label>
              <input type="text" class="form-control" placeholder="Umur mahasiswa" name="umur" value="<?php echo $data['umur'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="custom-select" name="jenis_kelamin" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="L" <?php echo $data['jenis_kelamin']=='L' ? "selected" : "" ?>>Laki-Laki</option>
                <option value="P" <?php echo $data['jenis_kelamin']=='P' ? "selected" : "" ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" required="required"><?php echo $data['alamat'];  ?></textarea>
            </div>
            <div class="form-group">
              <label>No.Tlp</label>
              <input type="text" class="form-control" placeholder="No.Tlp mahasiswa" name="no_tlf" value="<?php echo $data['no_tlf'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Goldar</label>
              <input type="text" class="form-control" placeholder="Golongan Darah mahasiswa" name="goldar" value="<?php echo $data['goldar'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" placeholder="Agama mahasiswa" name="agama" value="<?php echo $data['agama'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>