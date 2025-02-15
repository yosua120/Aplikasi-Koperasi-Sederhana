<?php

  include 'dbconfig.php';
  $query = "SELECT * FROM member";
  
  $statement = $pdo->prepare($query);
  $statement->execute();
  $members = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Koperasi Simpan Pinjam</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Koperasi</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Esra</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                Admin
              </h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="create.php">
          <i class="bi bi-grid"></i>
          <span>Create</span>
        </a>
      </li><!-- End Create Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <p>Anggota Peminjam</p>
              <div class="table-responsive">
                <table class="table dataTable">
                  <tr>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Alamat</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Akhir</th>
                    <th>Aksi</th>
                  </tr>
                  <?php foreach ($members as $member) { 
                    if($member['status'] == 'pinjam') {
                      ?>
                  <tr>
                    <td>
                      <?= $member['nama'] ?>
                    </td>
                    <td>
                      <?= $member['nik'] ?>
                    </td>
                    <td>
                      <?= $member['alamat'] ?>
                    </td>
                    <td>
                      <?= $member['jmlh_pinjam'] ?>
                    </td>
                    <td>
                      <?= $member['tgl_mulai'] ?>
                    </td>
                    <td>
                      <?= $member['tgl_akhir'] ?>
                    </td>
                    <td>
                      <a href="show.php?id=<?= $member['id'] ?>" class="btn btn-primary">Detail</a>
                      <a href="edit.php?id=<?= $member['id'] ?>" class="btn btn-success">Edit</a>
                      <a href="delete.php?id=<?= $member['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>

                  </tr>
                  <?php } } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <p>Anggota Tabungan</p>
                <table class="table dataTable">
                  <tr>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Alamat</th>
                    <th>Jumlah Tabungan</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Akhir</th>
                    <th>Aksi</th>
                  </tr>
                  <?php foreach ($members as $member) { 
                    if($member['status'] == 'tabung') {
                      ?>
                  <tr>
                    <td>
                      <?= $member['nama'] ?>
                    </td>
                    <td>
                      <?= $member['nik'] ?>
                    </td>
                    <td>
                      <?= $member['alamat'] ?>
                    </td>
                    <td>
                      <?= $member['jmlh_tabung'] ?>
                    </td>
                    <td>
                      <?= $member['tgl_mulai'] ?>
                    </td>
                    <td>
                      <?= $member['tgl_akhir'] ?>
                    </td>
                    <td>
                      <a href="show.php?id=<?= $member['id'] ?>" class="btn btn-primary">Detail</a>
                      <a href="edit.php?id=<?= $member['id'] ?>" class="btn btn-success">Edit</a>
                      <a href="delete.php?id=<?= $member['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <?php } } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>