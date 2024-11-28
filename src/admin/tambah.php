<?php
ob_start();
session_start();

$title = 'Tambah Petugas';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navAdmin.php';


if (isset($_POST["submit"])) {

  $nama = $_POST["nama_petugas"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $telp = $_POST["telp"];
  $level = $_POST["level"];

  $query = mysqli_query($conn, "INSERT INTO petugas VALUES ('', '$nama', '$username', '$password', '$telp', '$level')");


  if ($query) {
    $sukses = true;
  } else {
    $error = true;
  }
  // if (addPetugas($_POST) > 0) {
  //   $sukses = true;
  // } else {
  //   echo mysqli_error($conn);
  // }
}

ob_end_flush();
?> 


<?php if (isset($sukses)) : ?>

  <div class="alert alert-success alert-dismissible fade show " role="alert">
    <h5 class="text-dark mt-2">Akun Petugas Berhasil Dibuat!</h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-dark">&times;</span>
    </button>
  </div>

<?php endif; ?>

<?php if (isset($error)) : ?>

  <div class="alert alert-danger alert-dismissible fade show " role="alert">
    <h6 class="text-dark mt-2">Akun petugas gagal dibuat</h6>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-dark">&times;</span>
    </button>
  </div>

<?php endif; ?>
<div class="p-5">
  <div class="row">
    <div class="col-6">
      <div class="image">
        <img src="../../assets/img/hpilus.svg" width="450" alt="">
      </div>
    </div>
    <div class="col-6">
      <form action="" method="POST">
        <hr class="bg-gradient-danger">
        <div class="form-group">
          <input type="text" class="form-control py-4 shadow-sm rounded-pill " placeholder="Nama Petugas" name="nama_petugas" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control py-4 shadow-sm rounded-pill " placeholder="Username" name="username" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control py-4 shadow-sm rounded-pill " placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control py-4 shadow-sm rounded-pill " placeholder="No telepon" name="telp" required>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control py-4 shadow-sm rounded-pill " value="petugas" name="level">
        </div>
        <hr class="bg-gradient-danger">
        <div class="float-right">
          <a href="petugas.php" type="button" class="btn btn-outline-secondary shadow-sm py-2">Close</a>
          <button type="submit" class="btn btn-primary shadow-sm py-2" name="submit">Registrasi</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php require '../layouts/footer.php'; ?>