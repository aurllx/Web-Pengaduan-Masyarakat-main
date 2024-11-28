<?php
ob_start();

$title = 'Register';

require '../../public/app.php';
require '../layouts/Lheader.php';


// Logic Backend

if (isset($_POST['submit'])) {

  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $telp = $_POST['telp'];

  $sql = mysqli_query($conn, "INSERT INTO masyarakat VALUES('$nik','$nama','$user','$pass','$telp')");

  if ($sql)
    header("location: login.php");
}

ob_end_flush();
?> 

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto" style="background-color: #d9dddc;">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg">
        <div class="p-5">

          <!-- <a href="index.php" class="fas fa-fw fa-arrow-left text-danger text-decoration-none"></a> -->

          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
          </div>

          <hr class="bg-danger">

          <form class="user" method="post" action="">
            <div class="form-group">
              <input type="text" class="form-control border border-danger rounded-pill" name="nik" placeholder="NIK..." required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control border border-danger rounded-pill" name="nama" placeholder="Nama Lengkap..." required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control border border-danger rounded-pill" name="username" placeholder="Username..." required>
            </div>

            <div class="form-group">
              <input type="password" class="form-control border border-danger rounded-pill" name="password" placeholder="Password..." required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control border border-danger rounded-pill" name="telp" placeholder="No Telepon..." required>
            </div>

            <hr>

            <button type="submit" name="submit" class="btn btn-danger shadow-sm py-2 col-12 rounded-pill">
              Registrasi Akun
            </button>

          </form>

          <hr class="bg-danger">

          <div class="text-center">Sudah Punya Akun?
            <a class="text-md text-danger text-decoration-none" href="login.php">Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require '../layouts/Lfooter.php'; ?>