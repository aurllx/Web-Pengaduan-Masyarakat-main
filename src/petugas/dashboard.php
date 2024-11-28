<?php
ob_start();
session_start();

$title = 'Dashboard';

require '../layouts/header.php';
require '../layouts/navPetugas.php';

ob_end_flush();
?> 


<div class="d-flex justify-content-center text-center py-5" data-aos="zoom-in">
  <div class="content col-8">
    <i class="fas fa-atlas fa-5x mb-2"></i>
    <h1 class="mb-3">Welcome back to the <span class="text-danger">Pengaduan</span> web <br>
      <span class="text-danger">happy work </span>and activities.
    </h1>
    <a href="laporan.php" class="btn btn-danger btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-book-open"></i>
      </span>
      <span class="text">Lihat Laporan</span>
    </a>
  </div>
</div>



<?php require '../layouts/footer.php'; ?>