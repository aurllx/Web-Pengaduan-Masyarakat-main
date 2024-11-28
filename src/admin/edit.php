<?php
ob_start();
session_start();

$title = 'Edit Petugas';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navAdmin.php';

$id = $_GET["id_petugas"];

$result = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = $id");

if (isset($_POST["submit"])) {

  $id = $_POST["id_petugas"];
  $nama = $_POST["nama_petugas"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $telp = $_POST["telp"];
  $level = $_POST["level"];

  $query = mysqli_query($conn, "UPDATE petugas SET
                nama_petugas = '$nama',
                username = '$username',
                password = '$password',
                telp = '$telp',
                level = '$level'
                WHERE id_petugas = '$id'
                ");

  if ($query) {
    $sukses = true;
  } else {
    $error = true;
  }
}

ob_end_flush();
?> 


<?php if (isset($sukses)) : ?>

  <div class="alert alert-success alert-dismissible fade show " role="alert">
    <h5 class="text-dark mt-2">Akun Petugas Berhasil Diubah!</h5>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-dark">&times;</span>
    </button>
  </div>

<?php endif; ?>

<?php if (isset($error)) : ?>

  <div class="alert alert-danger alert-dismissible fade show " role="alert">
    <h6 class="text-dark mt-2">Maaf akun petugas gagal diubah</h6>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="text-dark">&times;</span>
    </button>
  </div>

<?php endif; ?>
<div class="p-5">
  <div class="row">

    <div class="col-6">
      <div class="image">
        <img src="../../assets/img/office.svg" width="450" alt="">
      </div>
    </div>

    <div class="col-6">
      <form action="" method="POST">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

          <hr class="bg-gradient-danger">

          <div class="form-group">
            <input type="hidden" class="form-control py-4 shadow-sm rounded-pill" value="<?= $row['id_petugas']; ?>" name="id_petugas">
          </div>

          <div class="form-group">
            <input type="text" class="form-control py-4 shadow-sm rounded-pill" value="<?= $row['nama_petugas']; ?>" name="nama_petugas">
          </div>

          <div class="form-group">
            <input type="text" class="form-control py-4 shadow-sm rounded-pill" value="<?= $row['username']; ?>" name="username">
          </div>

          <div class="form-group">
            <input type="password" class="form-control py-4 shadow-sm rounded-pill" value="<?= $row['password']; ?>" name="password">
          </div>

          <div class="form-group">
            <input type="text" class="form-control py-4 shadow-sm rounded-pill" value="<?= $row['telp']; ?>" name="telp">
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control py-4 shadow-sm rounded-pill" value="<?= $row['level']; ?>" name="level">
          </div>

          <hr class="bg-gradient-danger">

          <div class="float-right">
            <a href="petugas.php" type="button" class="btn btn-outline-secondary shadow-sm py-2">Close</a>
            <button class="btn btn-primary shadow-sm py-2" name="submit">Edit</button>
          </div>

        <?php endwhile; ?>
      </form>
    </div>
  </div>
</div>


<?php require '../layouts/footer.php'; ?>