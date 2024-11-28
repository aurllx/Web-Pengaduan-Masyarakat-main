<?php
ob_start();
session_start();

$title = 'Tanggapan';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navAdmin.php';


// logic backend

$id = $_GET["id_pengaduan"];

$result = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = $id");


if (isset($_POST["submit"])) {

	$id = $_POST["id_pengaduan"];
	$tgl = date('Y/m/d');
	$tanggapan = $_POST["tanggapan"];
	$id_petugas = $_POST["id_petugas"];

	$query = mysqli_query($conn, "INSERT INTO tanggapan VALUES ('', '$id', '$tgl', '$tanggapan', '$id_petugas')");

	if ($query) {
		$sukses = true;
	} else {
		$error = true;
	}
}

ob_end_flush();
?> 

<div class="d-flex justify-content-center">

  <div class="card w-75 shadow">
    <div class="card-body">
      <?php if (isset($sukses)) : ?>
        <div class="alert alert-success alert-dismissible fade show" data-aos="zoom-in" role="alert">
          <h6 class="text-dark mt-2">Berhasil menanggapi, Terima kasih sudah menanggapi aduan masyarakat </h6>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-dark">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <?php if (isset($error)) : ?>
        <div class="alert alert-danger alert-dismissible fade show " data-aos="zoom-in" role="alert">
          <h6 class="text-dark mt-2">Maaf Laporan sudah di tanggapi</h6>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-dark">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-6">
          <div class="image">
            <img src="../../assets/img/tanggap.svg" width="350" alt="">
          </div>
        </div>
        <div class="col-6">
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="" method="POST">
              <div class="form-row mb-2">

                <input type="hidden" name="id_pengaduan" value="<?= $row['id_pengaduan']; ?>">

                <div class="col">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="nik" value="<?= $row['nik']; ?>" readonly>
                </div>

                <div class="col">
                  <label>Tanggal Tanggapan</label>
                  <input class="form-control mb-2" name="tgl_pengaduan" value="<?php echo date('Y/m/d'); ?>" readonly>
                </div>

              </div>
              <div class="form-group">
                <label>Aduan</label>
                <textarea type="text" class="form-control" name="isi_laporan" readonly><?= $row['isi_laporan']; ?></textarea>
              </div>

              <div class="form-group">
                <label>Tanggapan</labeld1>
                  <textarea type="text" class="form-control" name="tanggapan" required></textarea>
              </div>

              <div class="form-group" required>
                <select name="id_petugas" id="petugas" class="form-control" required> 
                  <option disabled selected>Pilih Petugas</option>
                  <option value="1" required>Admin</option>
                  <option value="2" required>Petugas</option>
                </select>
              </div>

              <button type="submit" name="submit" class="btn btn-primary float-right">Tanggapi</button>

            </form>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require '../layouts/footer.php'; ?>