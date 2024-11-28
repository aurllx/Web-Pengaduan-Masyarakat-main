<?php
ob_start();
session_start();

$title = 'verify';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navPetugas.php';


// logic backednd

$id = $_GET['id_pengaduan'];

$verify = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = $id");

if (isset($_POST['submit'])) {

  $status = $_POST["status"];

  $query = mysqli_query($conn, "UPDATE pengaduan SET status = '$status' where id_pengaduan = '$id'");

  if ($query) {
    $sukses = true;
  } else {
    $error = true;
  }
}

ob_end_flush();
?> 



<div class="d-flex justify-content-center mt-5">
  <div class="card shadow w-25" data-aos="fade-up">
    <div class="card-body">
      
      <h4 class="text-center text-danger">Verifikasi</h4>
      
            <?php if (isset($sukses)) : ?>
              <div class="alert alert-success alert-dismissible fade show" data-aos="zoom-in" role="alert">
                <h6 class="text-dark mt-2">Verifikasi berhasil</h6>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" class="text-dark">&times;</span>
                </button>
              </div>
            <?php endif; ?>
      
            <?php if (isset($error)) : ?>
              <div class="alert alert-danger alert-dismissible fade show " data-aos="zoom-in" role="alert">
                <h6 class="text-dark mt-2">Gagal di verifikasi</h6>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" class="text-dark">&times;</span>
                </button>
              </div>
            <?php endif; ?>

      <hr class="bg-gradient-danger">
      <form action="" method="POST" enctype="multipart/form-data">
        <?php while ($row = mysqli_fetch_assoc($verify)) : ?>

          <div class="form-group">
            <input type="hidden" class="form-control" name="id_pengaduan" value="<?= $row['id_pengaduan']; ?>">
          </div>

          <!-- <div class="form-group">
            <input type="hidden" class="form-control" value="<?//= $row['foto']; ?>" name="foto">
          </div> -->

          <div class="form-group">
            <input type="hidden" name="status" value="selesai" id="">
          </div>

          <div class="form-group">
            <label>Tanggal Pengaduan</label>
            <input type="text" class="form-control" value="<?= $row['tgl_pengaduan']; ?>" name="tgl_pengaduan" readonly>
          </div>

          <div class="form-group">
            <label>NIK</label>
            <input type="number" class="form-control" value="<?= $row['nik']; ?>" name="nik" readonly>
          </div>

          <div class="form-group">
            <label>Isi laporan</label>
            <input type="text" class="form-control" value="<?= $row['isi_laporan']; ?>" name="isi_laporan" readonly>
          </div>

          <div class="form-group">
            <label>Bukti Foto </label><br>
            <div>
              <img src="../../assets/foto/<?= $row['foto']; ?>" width="80">
            </div>
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-outline-primary float-right" id="submit">Verify</button>
          </div>
        <?php endwhile; ?>
      </form>
    </div>
  </div>
</div>



<?php require '../layouts/footer.php'; ?>