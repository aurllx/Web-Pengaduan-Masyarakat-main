<?php
ob_start();
session_start();

$title = 'Buat Laporan';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navUser.php';

if (isset($_POST["submit"])) {

  $tgl = date('Y/m/d');
  $nik = $_POST['nik'];
  $isi = $_POST['isi_laporan'];
  $foto = $_FILES['foto']['name'];
  $file = $_FILES['foto']['tmp_name'];
  $status = $_POST["status"];

  $query = mysqli_query($conn, "INSERT INTO pengaduan VALUES ('', '$tgl', '$nik', '$isi', '$foto', '$status')");
  move_uploaded_file($file, "../../assets/foto/" . $foto);

  if ($query) {
    $sukses = true;
  } else {
    $error = true;
  }
}

ob_end_flush();
?> 


<h3 class="text-gray-900" data-aos="fade-left">Buat laporan keluh kesah anda disini</h3>
<hr class="bg-gradient-danger">
<div class="card border-bottom-danger shadow" data-aos="fade-up">
  <div class="card-body">
    <div class="container">
      <?php if (isset($sukses)) : ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <h5 class="text-dark mt-2">Aduan atau laporan sedang di proses, Terima kasih!.</h5>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-dark">&times;</span>
          </button>
        </div>

      <?php endif; ?>

      <?php if (isset($error)) : ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <h6 class="text-dark mt-2">Maaf aduan atau laporan anda gagal di proses</h6>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-dark">&times;</span>
          </button>
        </div>

      <?php endif; ?>
      <div class="row">
        <div class="col-4">
          <div class="image">
            <img src="../../assets/img/bl.svg" width="300" alt="">
          </div>
        </div>
        <div class="col-8 mt-2">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-row mb-3">
              <div class="col">
                <label for="tanggal" class="text-lg">Tanggal</label>
                <input type="text" class="form-control mb-2" name="tgl_pengaduan" value="<?php echo date('Y/m/d'); ?>" readonly>

                <label for="nik" class="text-lg">NIK</label>
                <input type="text" class="form-control mb-2" name="nik" value="<?= $_SESSION['nik']; ?>" readonly>

                <label for=" foto" class="text-lg">Foto</label>
                <input type="file" class="form-control-file" name="foto" accept=".jpg' .jpeg, .png, .gif">
                <p class="text-danger float-right"> *tipe : .jpg, .jpeg, .png, .gif</p>
              </div>
              <div class="col">
                <label for="isi">Isi laporan</label>
                <textarea class="form-control" rows="5" name="isi_laporan" required></textarea>

                <div class="form-check">
                  <input type="hidden" name="status" value="proses">
                </div>

                <div class="button mt-4">
                  <button class="btn btn-primary" name="submit">Submit</button>
                  <button type="reset" class="btn btn-outline-warning">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



<?php require '../layouts/footer.php'; ?>