<?php
ob_start();
session_start();

$title = 'Generate Laporan';

require '../../public/app.php';
require '../layouts/header.php';
require '../layouts/navAdmin.php';


// logic backend

$query = "SELECT * FROM (( tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan )
                          INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas )";

$result = mysqli_query($conn, $query);

ob_end_flush();
?> 


<div class="row">
  <div class="col-6">
    <form class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" data-aos="zoom-in">
      <div class="input-group mt-2">
        <input type="text" class="form-control bg-gray-300 border-0 small" placeholder="Search NIK..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-danger" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-6">
    <div class="d-flex justify-content-end">
      <div class="card shadow col-6 py-2" data-aos="zoom-in">
        <a href="../layouts/download.php" class="d-block card-header " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="generate">
          <h6 class="m-0 font-weight-bold text-danger">Tutup Laporan</h6>
        </a>
      </div>
    </div>
  </div>
</div>

<hr>

<div class="row">

  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <div class="col-6">
      <div class="card shadow mb-4" data-aos="fade-up">
        <!-- Card Content - Collapse -->
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h6 class="m-0 font-weight-bold text-danger mt-2">NIK : <?= $row['nik']; ?></h6>
            </div>
            <div class="col-6">
              <div class="d-sm-flex align-items-center justify-content-end">
                <a href="../layouts/download.php?id_pengaduan=<?= $row['id_pengaduan']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                  <i class="fas fa-download fa-sm text-white-50"></i> 
                  Generate Report</a>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse show" id="generate">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <h6 class="text-danger font-weight-bold">Foto : <img src="../../assets/foto/<?= $row['foto']; ?>" width="80"></h6>
              </div>
              <div class="col-8">
                <h6> <span class="text-danger font-weight-bold">Tanggal Pengaduan :</span> <?= $row['tgl_pengaduan']; ?></h6>
                <h6> <span class="text-danger font-weight-bold">Tanggal Tanggapan :</span> <?= $row['tgl_tanggapan']; ?></h6>
              </div>
            </div>
            <hr class="bg-danger">
            <h6><span class="text-danger font-weight-bold">Laporan :</span> <?= $row['isi_laporan']; ?></h6>
            <h6><span class="text-danger font-weight-bold">Tanggapan :</span> <?= $row['tanggapan']; ?></h6>
            <hr class="bg-danger">
            <div class="row">
              <div class="col-8 mt-2">
                <h5> <span class="text-danger font-weight-bold">Di tanggapi dari :</span> <?= $row['nama_petugas']; ?></h5>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-end">
                  <a href="preview.php?id_tanggapan=<?= $row['id_tanggapan']; ?>" class="btn btn-outline-danger">Preview</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>

</div>


<?php require '../layouts/footer.php'; ?>