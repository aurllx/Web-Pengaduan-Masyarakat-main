<?php
ob_start();

$title = 'Login | Petugas';

require '../../public/app.php';
require '../layouts/Lheader.php';



if (isset($_POST['submit'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['nama_petugas'] = $row['nama_petugas'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['telp'] = $row['telp'];

    if ($_SESSION['level'] = $row['level'] == 'admin') {
      header("location:../admin/dashboard.php");
    } else if ($_SESSION['level'] = $row['level'] == 'petugas') {
      header("location:dashboard.php");
    }
  } else {
    $error = true;
  }
}

ob_end_flush();
?> 


<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-lg-5">

    <div class="card o-hidden border-0 shadow-lg my-5 bg-light">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">

              <!-- <a href="../user/login.php" class="fas fa-fw fa-arrow-left float-left text-danger" style="text-decoration: none;"></a> -->

              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Petugas</h1>
              </div>

              <?php if (isset($error)) : ?>

                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <h6 class="text-dark mt-2">Maaf username atau password anda salah</h6>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-dark">&times;</span>
                  </button>
                </div>

              <?php endif; ?>

              <hr class="bg-gradient-danger">

              <form class="user" method="post" action="">
                <div class="form-group">
                  <input type="text" class="form-control border border-danger rounded-pill" id="username" name="username" placeholder="Username..." required>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control border border-danger rounded-pill" id="password" name="password" placeholder="Password..." required>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input border border-danger" id="customCheck" name="customCheck">
                    <label class="custom-control-label" for="customCheck" name="customCheck" >Remember Me</label>
                  </div>
                </div>

                <button type="submit" name="submit" class="btn btn-danger shadow-lg form-control rounded-pill text-xl-start">
                  Masuk
                </button>

                <hr class="bg-gradient-danger">

                <div class="text-center">Login Sebagai
                  <a class="text-md text-danger text-decoration-none" href="../user/login.php"> Masyarakat!</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php require '../layouts/Lfooter.php'; ?>