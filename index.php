  <?php
  include 'koneksi.php'
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustakaan Modern</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/iconbook.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Template Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


  <!-- =======================================================
  * Template Name: eNno - v4.7.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">KaRen</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#data">Data</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Tim</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="margin-bottom: 120px;">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Perpustakaan di Era Milenial</h1>
          <h2>Mengupayakan Untuk Meningkatkan Minat Baca Masyarakat dalam Negeri</h2>
          <div class="d-flex">
            <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#login">Login</a>
            <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#filter" style="margin-left: 10px;">Data Peminjaman</a>
            <!-- Modal Signup -->
            <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="login.php" name="kirim">
                      <div class="form-group" style="margin-bottom: 5px; ">
                        <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                        <?php
                        $nrp = ociparse($con, "SELECT NRP FROM USER_LOGIN");
                        ociexecute($nrp);
                        ?>
                        <select class="form-control" name="nrp" required>
                          <option selected>Nomor Identitas</option>
                          <?php
                          while (ocifetch($nrp)) {
                            echo "<option value=" . ociresult($nrp, "NRP") . ">" . ociresult($nrp, "NRP") . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group" style="margin-bottom: 5px; ">
                        <label for="ExInputENAME" style="margin-bottom: 10px;">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Masukkan Password" required>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Login</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Modal Filter -->
            <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="index.php#data" name="kirim">
                      <div class="form-group" style="margin-bottom: 5px; ">
                        <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                        <?php
                        $nrp = ociparse($con, "SELECT ID_MAHASISWA FROM TRANSAKSI_PEMINJAMAN");
                        ociexecute($nrp);
                        ?>
                        <select class="form-control" name="nrp" required>
                          <option selected>Nomor Identitas</option>
                          <?php
                          while (ocifetch($nrp)) {
                            echo "<option value=" . ociresult($nrp, "ID_MAHASISWA") . ">" . ociresult($nrp, "ID_MAHASISWA") . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submitfilter" id="submit">Cari</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/book3.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/team.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Buku merupakan jendela dunia</h3>
            <p class="fst-italic">
              Buku merupakan sumber berbagai informasi yang dapat membuka wawasan kita tentang berbagai hal seperti ilmu pengetahuan, ekonomi, sosial, budaya, politik, maupun aspek-aspek kehidupan lainnya. berikut manfaat membaca buku :
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Dapat Menstimulasi Mental</li>
              <li><i class="bi bi-check-circle"></i> Menambah Wawasan dan Pengetahuan</li>
              <li><i class="bi bi-check-circle"></i> Melatih Ketrampilan untuk Berfikir dan Menganalisa</li>
            </ul>
            <p>
              Dengan banyaknya manfaat dalam membaca buku, mari menjadi generasi milenial yang berkembang dengan membaca buku
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <?php
            $hitung = 0;
            $jummhs = ociparse($con, "SELECT * FROM MAHASISWA");
            ociexecute($jummhs);
            while (ocifetch($jummhs)) {
              $hitung++;
            }
            ?>
            <span data-purecounter-start="0" data-purecounter-end="<?= $hitung ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Jumlah Pengguna</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <?php
            $hitungbuku = 0;
            $jumbuku = ociparse($con, "SELECT * FROM BUKU");
            ociexecute($jumbuku);
            while (ocifetch($jumbuku)) {
              $hitungbuku++;
            }
            ?>
            <span data-purecounter-start="0" data-purecounter-end="<?= $hitungbuku ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Jumlah Buku</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Aktivitas</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <?php
            $hitungbuku = 0;
            $jumbuku = ociparse($con, "SELECT * FROM TRANSAKSI_PEMINJAMAN");
            ociexecute($jumbuku);
            while (ocifetch($jumbuku)) {
              $hitungbuku++;
            }
            ?>
            <span data-purecounter-start="0" data-purecounter-end="<?= $hitungbuku ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Peminjaman</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Data Section ======= -->
    <section id="data" class="services section-bg">
      <div class="container">
        <div class="section-title">
          <span>Data Peminjaman</span>
          <h2>Data Peminjaman</h2>
        </div>
        <div class="row">
          <div class="col">
            <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
              <thead style="background-color:black; color:white;">
                <tr>
                  <th scope="col" style="text-align: center">NRP</th>
                  <th scope="col" style="text-align: center">Nama </th>
                  <th scope="col" style="text-align: center">ID Buku</th>
                  <th scope="col" style="text-align: center">Nama Buku</th>
                  <th scope="col" style="text-align: center">Tanggal Pinjam</th>
                  <th scope="col" style="text-align: center">Tanggal Kembali</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_POST['submitfilter'])) {
                  $NRP = $_POST['nrp'];
                  $hitung = 0;
                  $sql = ociparse($con, "SELECT * FROM TRANSAKSI_PEMINJAMAN WHERE ID_MAHASISWA = $NRP");
                  oci_execute($sql);
                  while (ocifetch($sql)) { ?>
                    <tr>
                      <th scope="row" style="text-align: center">
                        <?php
                        echo ociresult($sql, "ID_MAHASISWA");
                        $idmhs = ociresult($sql, "ID_MAHASISWA");
                        ?>
                      </th>
                      <?php
                      $sql2 = ociparse($con, "SELECT * FROM MAHASISWA WHERE NRP = $idmhs");
                      oci_execute($sql2);
                      while (ocifetch($sql2)) { ?>
                        <td style="text-align: center"><?php echo ociresult($sql2, "NAMA") ?></td>
                      <?php
                      }
                      ?>
                      <td style="text-align: center">
                        <?php
                        echo ociresult($sql, "ID_BUKU");
                        $idbuku = ociresult($sql, "ID_BUKU");
                        ?>
                      </td>
                      <?php
                      $sql3 = ociparse($con, "SELECT * FROM BUKU WHERE ID = $idbuku");
                      oci_execute($sql3);
                      while (ocifetch($sql3)) { ?>
                        <td style="text-align: center"><?php echo ociresult($sql3, "NAMA_BUKU") ?></td>
                      <?php
                      }
                      ?>
                      <td style="text-align: center"><?php echo ociresult($sql, "TANGGAL_PINJAM") ?></td>
                      <td style="text-align: center"><?php echo ociresult($sql, "TANGGAL_KEMBALI") ?></td>
                    </tr>
                <?php
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Data Section END ======= -->
    <!-- <hr style="background-color: #444444;color:#444444"> -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <span>Perpustakaan Modern</span>
          <h2>Perpustakaan Modern</h2>
          <p>Fasilitas yang terdapat di perpustakaan modern</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Ruang Yang Luas</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Buku yang tersusun rapi</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Waktu Yang Fleksible</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Internet Yang Cepat</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4><a href="">Petugas Yang Ramah</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-house"></i></div>
              <h4><a href="">Tempat Yang Nyaman</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team ">
      <div class="container">

        <div class="section-title">
          <span>Team</span>
          <h2>Team</h2>
          <p>Tim pembuat dari Website Perpustakaan untuk Masyarakat</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-auto" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="member">
              <img src="assets/img/team/taehyung.png" alt="">
              <h4>Aidzar Al-Zikri</h4>
              <span>Frontend</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut
                aut
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-auto" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="member">
              <img src="assets/img/team/winter.jpg" alt="">
              <h4>Rakhsandrina A</h4>
              <span>Backend</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch m-auto" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="member">
              <img src="assets/img/team/chanyeol.jpg" alt="">
              <h4>Renaldi Putra</h4>
              <span>Marketing</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section id="contact">
    <footer id="footer">

      <div class="footer-top">

        <div class="container">

          <div class="row  justify-content-center">
            <div class="col-lg-6">
              <h3>KaRen</h3>
              <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi
                placeat.</p>
            </div>
          </div>

          <div class="row footer-newsletter justify-content-center">
            <div class="col-lg-6">
              <form action="" method="post">
                <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
              </form>
            </div>
          </div>

          <div class="social-links">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>

        </div>
      </div>

      <div class="container footer-bottom clearfix">
        <div class="copyright">
          &copy; Copyright <strong><span>KaRen</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer>
  </section><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>