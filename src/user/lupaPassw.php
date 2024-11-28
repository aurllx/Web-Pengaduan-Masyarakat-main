<?php
ob_start();
session_start();

$title = 'Lupa Password';

require '../layouts/header.php';
require '../layouts/navUser.php';

$nik = $_GET["nik"];

$result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE nik = $nik");

if (isset($_POST["submit"])) {

    $password = $_POST["password"];

    $query = mysqli_query($conn, "UPDATE masyarakat SET
                password = '$password',
                WHERE nik = '$nik'
                ");

    if ($query) {
        $sukses = true;
    } else {
        $error = true ;
    }
}

ob_end_flush();
?> 

<?php if (isset($sukses)) : ?>

    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <h5 class="text-dark mt-2">Password Anda Berhasil Diubah!</h5>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-dark">&times;</span>
        </button>
    </div>

<?php endif; ?>

<?php if (isset($error)) : ?>

    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <h6 class="text-dark mt-2">Maaf Password Anda gagal diubah</h6>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-dark">&times;</span>
        </button>
    </div>

<?php endif; ?>

<div class="d-flex justify-content-center mt-5">
    <div class="card shadow w-25" data-aos="fade-up">
        <div class="card-body">
            
            <a href="../user/dashboard.php" class="text-decoration-none text-sm float-right">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </a>

            <h4 class="text-center text-danger">Ubah Password</h4>

            <hr class="bg-gradient-danger">

            <form action="" method="POST">

                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="password" value="<?= $row['password']; ?>">
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Baru.." required>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-danger float-right" id="submit">Ubah</button>
                    </div>
                <?php endwhile; ?>
            </form>
        </div>
    </div>
</div>


<?php require '../layouts/footer.php'; ?>