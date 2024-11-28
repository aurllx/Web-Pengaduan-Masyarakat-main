<?php
ob_start();
require '../../public/app.php';

if (!isset($_SESSION['nama'])) {
    header('location: ../layouts/blocked.php');
}
ob_end_flush();
?> 

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../user/dashboard.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-passport"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Form Pengaduan</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if ($title === "Dashboard") echo "active"; ?>">
            <a class="nav-link" href="../user/dashboard.php">
                <i class="fas fa-users"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Fiture
        </div>

        <!-- Nav Item - Buat Laporan -->
        <li class="nav-item <?php if ($title === "Buat Laporan") echo "active"; ?>">
            <a class="nav-link" href="../user/buatLaporan.php">
                <i class="fas fa-edit"></i>
                <span>Buat Laporan</span></a>
        </li>

        <!-- Nav Item - Buat Laporan -->
        <li class="nav-item <?php if ($title === "Laporan Belum Terverify") echo "active"; ?>">
            <a class="nav-link" href="../user/blmverify.php">
                <i class="fas fa-pen"></i>
                <span>Laporan Belum Terverify</span></a>
        </li>


        <!-- Nav Item - Laporan masyarakat -->
        <li class="nav-item <?php if ($title === "Laporan") echo "active"; ?>">
            <a class="nav-link" href="../user/lihatLaporan.php">
                <i class="fas fa-book-open"></i>
                <span>Laporan masyarakat</span></a>
        </li>

        <!-- Nav Item - Tanggapan -->
        <li class="nav-item <?php if ($title === "Tanggapan") echo "active"; ?>">
            <a class="nav-link" href="../user/tanggapan.php">
                <i class="fas fa-bookmark"></i>
                <span>Tanggapan</span></a>
        </li>

        <!-- Nav Item - Generate -->
        <li class="nav-item <?php if ($title === "Generate Laporan") echo "active"; ?>">
            <a class="nav-link" href="../user/generate.php">
                <i class="fas fa-folder-open"></i>
                <span>Generate Laporan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Logout
        </div>

        <!-- Nav Item - My Profile -->
        <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt "></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->



    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none ">
                    <i class="fa fa-bars"></i>
                </button>

                <h3 class="text-gray-800 ml-3"><?= $title; ?></h3>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown ">

                        <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 middle"><?= $_SESSION['nama']; ?></span>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <i class="fas fa-fw fa-seedling text-danger"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            <h6 class="dropdown-header">Data</h6>

                            <a class="dropdown-item list-group-item-danger" href="" data-toggle="modal" data-target="#profileModal">
                                <i class="fas fa-fw fa-user mr-2 text-danger"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>

                            <h6 class="dropdown-header">Logout</h6>

                            <a class="dropdown-item list-group-item-danger" href="../user/logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-fw fa-sign-out-alt mr-2 text-danger"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- End of Topbar -->

            <div class="container">

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Yakin Ingin Keluar</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body text-dark">Pilih "Keluar" di bawah ini jika Anda yakin untuk Keluar dari sesi Anda saat ini.</div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" href="../user/logout.php">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- profile Modal-->
                <?php
                $result = mysqli_query($conn, "SELECT * FROM masyarakat");
                ?>
                <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="text-danger"><?= $_SESSION["nama"]; ?></h4>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="d-flex justify-content-center">
                                <div class="modal-body">
                                    <form action="" method="POST">

                                        <?php $row = mysqli_fetch_assoc($result) ?>

                                        <div class="form-group">
                                            <label for="nik" class="text-lg">NIK</label>
                                            <input type="text" class="form-control mb-2" name="nik" value="<?= $_SESSION["nik"]; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="text-lg">Username</label>
                                            <input type="text" class="form-control mb-2" name="username" value="<?= $_SESSION["username"]; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="telp" class="text-lg">Telepon</label>
                                            <input type="text" class="form-control mb-2" name="telp" value="<?= $_SESSION["telp"]; ?>" readonly>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="../user/lupaPassw.php?nik=<?= $row['nik']; ?>" class="text-decoration-none text-sm text-danger float-right">Lupa Password?</a>
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            </div>

                        </div>
                    </div>
                </div>