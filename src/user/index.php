<?php
ob_start();
$title = 'Aduan Masyarakat';

require '../../public/app.php';
require '../layouts/header.php';


// logic backend


// mengambil angka pengaduan dari database
$pengaduan = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id_pengaduan  DESC LIMIT 1");

// mengambil angka tanggapan dari database
$tanggapan = mysqli_query($conn, "SELECT * FROM tanggapan ORDER BY id_tanggapan DESC LIMIT 1");

// mengambil angka akun masyarakat dari database
$masyarakat = mysqli_query($conn, "SELECT * FROM masyarakat ORDER BY nik  DESC LIMIT 1");

ob_end_flush();
?> 


<nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3 shadow">
  <div class="container" data-aos="fade-down">
    <a class="navbar-brand" href="index.php">
      <i class="fas fa-atlas"></i> Aduan Masyarakat
    </a>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

      <ul class="navbar-nav">
        <a href="login.php" class="btn btn-outline-light mr-3">Masuk</a>
        <a href="register.php" class="btn btn-light">Daftar</a>
      </ul>
    </div>
  </div>
</nav>

<div class="bg-gradient-danger" style="border-bottom-right-radius: 100px; border-bottom-left-radius: 100px; padding:150px;">
  <div class="container d-flex justify-content-center" data-aos="zoom-in">
    <div class="text-center col-8 text-light" style="margin-top: -25px;">
      <h1>Aduan Masyarakat</h1>
      <p>penyampaian keluhan oleh masyarakat kepada pemerintah atas pelayanan
        yang tidak sesuai dengan standar pelayanan, atau pengabaian kewajiban
        dan/atau pelanggaran larangan. Penanganan pengaduan masyarakat adalah
        proses kegiatan yang meliputi penerimaan, pencatatan, penelaahan, tindak
        lanjut penyaluran tindaklanjut, pengarsipan, pemantauan dan pelaporan</p>
      <a href="login.php" class="btn btn-outline-light">Buat laporan sekarang!</a>
    </div>
  </div>
</div>

<div class="container" style="margin-top: -35px ;">
  <!-- Card -->
  <?php while ($row = mysqli_fetch_assoc($pengaduan)) : ?>
    <div class="row mb-3">
      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="500">
        <div class="card border-left-info border-bottom-info shadow-lg h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col ml-3">
                <div class="h5 mb-0 font-weight-bold text-info"><?= $row['id_pengaduan']; ?> Pengaduan</div>
              </div>
              <i class="fas fa-comment fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>

    <?php while ($row = mysqli_fetch_assoc($tanggapan)) : ?>
      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="700">
        <div class="card border-left-success border-bottom-success shadow-lg h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col ml-3">
                <div class="h5 mb-0 font-weight-bold text-success"><?= $row['id_tanggapan']; ?> Tanggapan</div>
              </div>
              <i class="fas fa-comments fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>

    <?php while ($row = mysqli_fetch_assoc($masyarakat)) : ?>
      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="900">
        <div class="card border-left-warning border-bottom-warning shadow-lg h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col ml-3">
                <div class="h5 mb-0 font-weight-bold text-warning"><? //= $row['nik']; 
                                                                    ?>2 Akun masyarakat</div>
              </div>
              <i class="fas fa-users fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile ?>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-6" data-aos="float-right">
          <div class="desc" style="margin-top: 130px;">
            <h4 class="text-justify text-gray-900">Buat laporan, aduan dan keluh kesah anda di website aduan masyarakat ini dan jangan meyebarkan berita hoax!</h4>
          </div>
        </div>
        <div class="col-6">
          <div class="img mt-5 ml-3" data-aos="float-left">
            <img src="../../assets/img/tulis2.svg" width="450" alt="">
          </div>
        </div>

        <div class="col-6" style="margin-top: -45px;">
          <div class="img" data-aos="float-right">
            <img src="../../assets/img/tulis3.svg" width="450" alt="">
          </div>
        </div>
        <div class="col-6" style="margin-top: -45px;">
          <div class="desc ml-3" style="margin-top: 130px;" data-aos="float-left">
            <h4 class="text-justify text-gray-900">Jangan lupa mengirimkan foto anda saat menyampaikan laporan, aduan ataupun keluh kesah anda di web ini.</h4>
          </div>
        </div>
        <div class="col-6" style="margin-top: -45px;">
          <div class="desc" style="margin-top: 130px;" data-aos="float-right">
            <h4 class="text-justify text-gray-900">Setelah menyapaikan laporan, aduan atau keluh kesah anda dapat menunggu tanggapan dengan santay.</h4>
          </div>
        </div>
        <div class="col-6" style="margin-top: -45px;" data-aos="float-left">
          <div class="img ml-3">
            <img src="../../assets/img/landing1.svg" width="450" alt="">
          </div>
        </div>
      </div>
    </div>
</div>


<!-- info -->
<div class="bg-gradient-danger py-5">
  <div class="container text-center text-light">
    <h1 class="mb-3">Info Pengaduan Masyarakat</h1>
    <a href="https://instagram.com/rell.orell_?igshid=Mzc0YWU1OWY=" class="btn btn-light mr-1">Chat admin</a>
    <a href="https://instagram.com/rell.orell_?igshid=Mzc0YWU1OWY=" class="btn btn-outline-light ml-1">Contact Developer</a>
  </div>
</div>


<!-- Testimonial -->
<div class="container py-5">
  <h2 class="text-center text-uppercase text-gray-900" data-aos="zoom-in-up">testimonial</h2>
  <hr class="bg-gradient-danger">
  <div class="row">
    <div class="col-4">
      <div class="card shadow-sm" data-aos="fade-up" data-aos-duration="500">
        <div class="card-body">
          <img src="../../assets/img/landing3.svg" width="35" class="rounded-circle" alt="">
          <span>Gojo Satoru</span> |
          <span>Web Developer</span>
          <hr class="bg-gradient-danger">
          <div class="card-text text-justify">
            " Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus incidunt voluptas, necessitatibus sapiente deleniti distinctio, tenetur maiores aut vero rerum, omnis error placeat repellat quaerat ipsam reprehenderit debitis sint praesentium?"
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card shadow-sm" data-aos="fade-up" data-aos-duration="700">
        <div class="card-body">
          <img src="../../assets/img/landing2.svg" width="35" class="rounded-circle" alt="">
          <span>Lee Haechan</span> |
          <span>Guru SMK</span>
          <hr class="bg-gradient-danger">
          <div class="card-text text-justify">
            " Lorem ipsum dolor sit amet consectetur adipisicing elit. Id aut, dolores aspernatur distinctio at neque, sint ab, atque eveniet repudiandae voluptate odio numquam optio quasi sapiente. Delectus adipisci ipsa molestias. "
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card shadow-sm" data-aos="fade-up" data-aos-duration="900">
        <div class="card-body">
          <img src="../../assets/img/landing1.svg" width="35" class="rounded-circle" alt="">
          <span>Aurellia Nur Fitria</span> |
          <span>Pelajar </span>
          <hr class="bg-gradient-danger">
          <div class="card-text text-justify">
            " Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eum doloremque magnam aliquid architecto iusto mollitia fugiat earum doloribus autem officia sunt quos eveniet ut dignissimos, voluptas quas beatae deserunt. "
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
<div class="bg-gray-400 py-3">
  <footer>
    <div class="text-center mt-2 text-gray-700">
      <h6>Copyright &copy; <?= date('Y') ?> Aurellia Nur Fitria</h6>
    </div>
  </footer>
</div>

<?php require '../layouts/footer.php'; ?>