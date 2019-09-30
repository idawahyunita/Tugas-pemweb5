<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('db.php'); 

  $status = '';
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
      $query = "INSERT INTO mhs (npm, nama, ttl, umur, jenis_kelamin, alamat, no_tlf, goldar, agama) VALUES('$npm','$nama','$ttl','$umur','$jenis_kelamin','$alamat','$no_tlf','$goldar','$agama')";

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>SI-Ida Wahyunita</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Data Mahasiswa</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Mahasiswa</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <label>NPM</label>
              <input type="text" class="form-control" placeholder="NPM mahasiswa" name="npm" required="required">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama mahasiswa" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>Tempat, Tanggal Lahir</label>
              <input type="text" class="form-control" placeholder="TTL mahasiswa" name="ttl" required="required">
            </div>
            <div class="form-group">
              <label>Umur</label>
              <input type="text" class="form-control" placeholder="Umur mahasiswa" name="umur" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="custom-select" name="jenis_kelamin" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>No. Tlp</label>
              <input type="text" class="form-control" placeholder="No.Tlp mahasiswa" name="no_tlf" required="required">
            </div>
            <div class="form-group">
              <label>Golongan Darah</label>
              <input type="text" class="form-control" placeholder="Golongan Darah mahasiswa" name="goldar" required="required">
            </div>
            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" placeholder="Agama mahasiswa" name="agama" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>