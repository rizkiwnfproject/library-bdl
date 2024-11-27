<?php
session_start();
if (!isset($_SESSION['user_is_logged_in']) || $_SESSION['user_is_logged_in'] !== true) {
    header('location: ../index.php');
    exit;
}
include '../koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin-Perpustakaan Modern</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/iconbook.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="index.html">KaRen</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#mahasiswa">Mahasiswa</a></li>
                    <li><a class="nav-link scrollto" href="#buku">Buku</a></li>
                    <li><a class="nav-link scrollto" href="#transaksi">Transaksi</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
                    <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal" data-bs-target="#triggertransaksi">Trigger</a></li>
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
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="../assets/img/book3.jpg" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ======= Modal Trigger Start ======= -->
    <div class="modal fade" id="triggertransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aktivitas di Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                        <thead style="background-color:black; color:white;">
                            <tr>
                                <th scope="col" style="text-align: center">NRP</th>
                                <th scope="col" style="text-align: center">Nama</th>
                                <th scope="col" style="text-align: center">ID Buku</th>
                                <th scope="col" style="text-align: center">Nama Buku</th>
                                <th scope="col" style="text-align: center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = ociparse($con, "SELECT * FROM TGR_TRANSAKSI ORDER BY NRP");
                            oci_execute($sql);
                            while (ocifetch($sql)) { ?>
                                <tr>
                                    <th scope="row" style="text-align: center"><?php echo ociresult($sql, "NRP");
                                                                                $idmhs = ociresult($sql, "NRP"); ?></th>

                                    <?php
                                    $sql2 = ociparse($con, "SELECT * FROM MAHASISWA WHERE NRP = $idmhs");
                                    oci_execute($sql2);
                                    while (ocifetch($sql2)) { ?>
                                        <td style="text-align: center"><?php echo ociresult($sql2, "NAMA") ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td style="text-align: center"><?php echo ociresult($sql, "ID_BUKU");
                                                                    $idbuku =  ociresult($sql, "ID_BUKU"); ?></td>
                                    <?php
                                    $sql3 = ociparse($con, "SELECT * FROM BUKU WHERE ID = $idbuku");
                                    oci_execute($sql3);
                                    while (ocifetch($sql3)) { ?>
                                        <td style="text-align: center"><?php echo ociresult($sql3, "NAMA_BUKU") ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td style="text-align: center"><?php echo ociresult($sql, "STATUS") ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= Modal Trigger End ======= -->


    <!-- ======= Section Mahasiswa Start ======= -->
    <section id="mahasiswa" class="service " style="margin-bottom: 120px;">

        <div class="container ">
            <div class="section-title">
                <span>Data Mahasiswa</span>
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#deletemhs">
                        Delete
                    </button>
                    <button type="button" class="btn btn-warning" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right; color:white;" data-bs-toggle="modal" data-bs-target="#updatemhs">
                        Update
                    </button>
                    <button type="button" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#createmhs">
                        Create
                    </button>
                    <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                        <thead style="background-color:black; color:white;">
                            <tr>
                                <th scope="col" style="text-align: center">NRP Mahasiswa</th>
                                <th scope="col" style="text-align: center">Nama Mahasiswa</th>
                                <th scope="col" style="text-align: center">Alamat</th>
                                <th scope="col" style="text-align: center">Email</th>
                                <th scope="col" style="text-align: center">Password</th>
                                <th scope="col" style="text-align: center">Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = ociparse($con, "SELECT * FROM MAHASISWA ORDER BY NRP");
                            oci_execute($sql);
                            while (ocifetch($sql)) { ?>
                                <tr>
                                    <th scope="row" style="text-align: center"><?php echo ociresult($sql, "NRP") ?></th>
                                    <td style="text-align: center"><?php echo ociresult($sql, "NAMA") ?></td>
                                    <td style="text-align: center"><?php echo ociresult($sql, "ALAMAT") ?></td>
                                    <td style="text-align: center"><?php echo ociresult($sql, "EMAIL") ?></td>
                                    <td style="text-align: center"><?php echo ociresult($sql, "PASSWORD") ?></td>
                                    <?php
                                    $idjurus = ociresult($sql, "ID_JURUSAN");
                                    $idjurusan = ociparse($con, "SELECT * FROM JURUSAN WHERE ID = " . $idjurus);
                                    ociexecute($idjurusan);
                                    while (ocifetch($idjurusan)) {
                                    ?>
                                        <td style="text-align: center"><?php echo ociresult($idjurusan, "NAMA_JURUSAN") ?></td>
                                </tr>
                        <?php
                                    }
                                } ?>
                        </tbody>
                    </table>
                    <!-- Modal Create Mahasiswa -->
                    <div class="modal fade" id="createmhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buat Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="createmhs.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                                            <input type="number" class="form-control" id="InputNRP" name="nrp" placeholder="Masukkan NRP" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExNama" style="margin-bottom: 10px;">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" id="InputNama" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExAlamat" style="margin-bottom: 10px;">Alamat</label>
                                            <input type="text" class="form-control" id="InputAlamat" name="alamat" placeholder="Masukkan Alamat Mahasiswa" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExEmail" style="margin-bottom: 10px;">Email Address</label>
                                            <input type="text" class="form-control" id="InputEmail" name="email" placeholder="Masukkan Email Address" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputENAME" style="margin-bottom: 10px;">Password</label>
                                            <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Masukkan Password" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputENAME" style="margin-bottom: 10px;">Jurusan</label>
                                            <?php
                                            $jurusan = ociparse($con, "SELECT * FROM JURUSAN");
                                            oci_execute($jurusan);
                                            ?>
                                            <select class="form-control" name="jurusan" required>
                                                <option selected>JURUSAN</option>
                                                <?php
                                                while (ocifetch($jurusan)) {
                                                    echo "<option value=" . ociresult($jurusan, "ID") . ">" . ociresult($jurusan, "NAMA_JURUSAN") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Update Mhs -->
                    <div class="modal fade" id="updatemhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="updatemhs.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                                            <?php
                                            $nrpmhs = ociparse($con, "SELECT NRP FROM MAHASISWA");
                                            oci_execute($nrpmhs);
                                            ?>
                                            <select class="form-control" name="nrp" required>
                                                <option selected>NRP Mahasiswa</option>
                                                <?php
                                                while (ocifetch($nrpmhs)) {
                                                    echo "<option value=" . ociresult($nrpmhs, "NRP") . ">" . ociresult($nrpmhs, "NRP") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExNama" style="margin-bottom: 10px;">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" id="InputNama" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExAlamat" style="margin-bottom: 10px;">Alamat</label>
                                            <input type="text" class="form-control" id="InputAlamat" name="alamat" placeholder="Masukkan Alamat Mahasiswa" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExEmail" style="margin-bottom: 10px;">Email Address</label>
                                            <input type="text" class="form-control" id="InputEmail" name="email" placeholder="Masukkan Email Address" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputENAME" style="margin-bottom: 10px;">Password</label>
                                            <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Masukkan Password" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputENAME" style="margin-bottom: 10px;">Jurusan</label>
                                            <?php
                                            $jurusan = ociparse($con, "SELECT * FROM JURUSAN");
                                            oci_execute($jurusan);
                                            ?>
                                            <select class="form-control" name="jurusan" required>
                                                <option selected>JURUSAN</option>
                                                <?php
                                                while (ocifetch($jurusan)) {
                                                    echo "<option value=" . ociresult($jurusan, "ID") . ">" . ociresult($jurusan, "NAMA_JURUSAN") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-info" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete Mahasiswa -->
                    <div class="modal fade" id="deletemhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Mahasiswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="deletemhs.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP</label>
                                            <?php
                                            $nrpmhs = ociparse($con, "SELECT NRP FROM MAHASISWA");
                                            oci_execute($nrpmhs);
                                            ?>
                                            <select class="form-control" name="nrp" required>
                                                <option selected>NRP Mahasiswa</option>
                                                <?php
                                                while (ocifetch($nrpmhs)) {
                                                    echo "<option value=" . ociresult($nrpmhs, "NRP") . ">" . ociresult($nrpmhs, "NRP") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Section Mahasiswa End ======= -->

    <!-- ======= Section Buku Start ======= -->

    <section id="buku" class="services section-bg" style="margin-bottom: 120px;">
        <div class="container">
            <div class="section-title">
                <span>Data Buku</span>
                <h2>Data Buku</h2>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#deletebuku">
                        Delete
                    </button>
                    <button type="button" class="btn btn-warning" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right; color:white;" data-bs-toggle="modal" data-bs-target="#updatebuku">
                        Update
                    </button>
                    <button type="button" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#createbuku">
                        Create
                    </button>
                    <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                        <thead style="background-color:black; color:white;">
                            <tr>
                                <th scope="col" style="text-align: center">ID Buku</th>
                                <th scope="col" style="text-align: center">Nama Buku</th>
                                <th scope="col" style="text-align: center">Pengarang</th>
                                <th scope="col" style="text-align: center">Eksemplar</th>
                                <th scope="col" style="text-align: center">Waktu Penerbitan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = ociparse($con, "SELECT * FROM BUKU ORDER BY ID");
                            oci_execute($sql);
                            while (ocifetch($sql)) { ?>
                                <tr>
                                    <th scope="row" style="text-align: center"><?php echo ociresult($sql, "ID") ?></th>
                                    <td style="text-align: center"><?php echo ociresult($sql, "NAMA_BUKU") ?></td>
                                    <td style="text-align: center"><?php echo ociresult($sql, "PENGARANG") ?></td>
                                    <td style="text-align: center"><?php echo ociresult($sql, "EKSEMPLAR") ?></td>
                                    <td style="text-align: center"><?php echo ociresult($sql, "WAKTU_PENERBITAN") ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                    <!-- Modal Create Buku -->
                    <div class="modal fade" id="createbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buat Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="createbuku.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExIDBuku" style="margin-bottom: 10px;">ID Buku</label>
                                            <input type="number" class="form-control" id="InputIDBuku" name="id" placeholder="Masukkan ID Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExNamaBuku" style="margin-bottom: 10px;">Nama Buku</label>
                                            <input type="text" class="form-control" id="InputNamaBuku" name="namabuku" placeholder="Masukkan Nama Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExPengarangBuku" style="margin-bottom: 10px;">Pengarang Buku</label>
                                            <input type="text" class="form-control" id="InputPengarangBuku" name="pengarangBuku" placeholder="Masukkan Nama Pengarang Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExEksemplar" style="margin-bottom: 10px;">Eksemplar</label>
                                            <input type="number" class="form-control" id="InputEksemplar" name="eksemplar" placeholder="Masukkan Eksemplar Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExTanggalTerbit" style="margin-bottom: 10px;">Tanggal Penerbitan Buku</label>
                                            <input type="date" class="form-control" id="InputTanggalTerbit" name="tanggalterbit" placeholder="Masukkan Tanggal Terbit Buku" required>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Update Buku -->
                    <div class="modal fade" id="updatebuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="updatebuku.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">ID Buku</label>
                                            <?php
                                            $idbuku = ociparse($con, "SELECT ID FROM BUKU");
                                            oci_execute($idbuku);
                                            ?>
                                            <select class="form-control" name="id" required>
                                                <option selected>ID Buku</option>
                                                <?php
                                                while (ocifetch($idbuku)) {
                                                    echo "<option value=" . ociresult($idbuku, "ID") . ">" . ociresult($idbuku, "ID") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExNama" style="margin-bottom: 10px;">Nama Buku</label>
                                            <input type="text" class="form-control" id="InputNama" name="namabuku" placeholder="Masukkan Nama Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExAlamat" style="margin-bottom: 10px;">Pengarang</label>
                                            <input type="text" class="form-control" id="InputAlamat" name="pengarangBuku" placeholder="Masukkan Nama Pengarang" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExEmail" style="margin-bottom: 10px;">Eksemplar</label>
                                            <input type="number" class="form-control" id="InputEmail" name="eksemplar" placeholder="Masukkan Eksemplar" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputENAME" style="margin-bottom: 10px;">Tanggal Terbit</label>
                                            <input type="date" class="form-control" id="InputPassword" name="tanggalterbit" placeholder="Masukkan Tanggal Terbit Buku" required>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete Buku -->
                    <div class="modal fade" id="deletebuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Buku</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="deletebuku.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">ID Buku</label>
                                            <?php
                                            $idbuku = ociparse($con, "SELECT ID FROM BUKU");
                                            oci_execute($idbuku);
                                            ?>
                                            <select class="form-control" name="id" required>
                                                <option selected>ID Buku</option>
                                                <?php
                                                while (ocifetch($idbuku)) {
                                                    echo "<option value=" . ociresult($idbuku, "ID") . ">" . ociresult($idbuku, "ID") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Section Buku End ======= -->
    <!-- ======= Section Transaksi Start ======= -->
    <section id="transaksi" style="margin-bottom: 120px;">
        <div class="container">
            <div class="section-title">
                <span>Data Peminjaman</span>
                <h2>Data Peminjaman</h2>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#deletetransaksi">
                        Delete
                    </button>
                    <button type="button" class="btn btn-warning" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right; color:white;" data-bs-toggle="modal" data-bs-target="#updatetransaksi">
                        Update
                    </button>
                    <button type="button" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#createtransaksi">
                        Create
                    </button>
                    <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                        <thead style="background-color:black; color:white;">
                            <tr>
                                <th scope="col" style="text-align: center">NRP Mahasiswa</th>
                                <th scope="col" style="text-align: center">Nama</th>
                                <th scope="col" style="text-align: center">Jurusan</th>
                                <th scope="col" style="text-align: center">ID Buku</th>
                                <th scope="col" style="text-align: center">Nama Buku</th>
                                <th scope="col" style="text-align: center">Tanggal Pinjam</th>
                                <th scope="col" style="text-align: center">Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = ociparse($con, "SELECT * FROM TRANSAKSI_PEMINJAMAN ORDER BY ID_MAHASISWA");
                            oci_execute($sql);
                            while (ocifetch($sql)) { ?>
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        <?php echo ociresult($sql, "ID_MAHASISWA");
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

                                    <?php
                                    $idjurusan = ociparse($con, "SELECT * FROM MAHASISWA WHERE NRP = $idmhs ");
                                    ociexecute($idjurusan);
                                    while(ocifetch($idjurusan)){
                                        $id_jurusan = ociresult($idjurusan, "ID_JURUSAN");
                                    }
                                    $jurusan = ociparse($con, "SELECT NAMA_JURUSAN FROM JURUSAN WHERE ID = " . $id_jurusan);
                                    oci_execute($jurusan);
                                    while (ocifetch($jurusan)) { ?>
                                        <td style="text-align: center"><?php echo ociresult($jurusan, "NAMA_JURUSAN") ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td style="text-align: center">
                                        <?php echo ociresult($sql, "ID_BUKU");
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
                            } ?>
                        </tbody>
                    </table>
                    <!-- Modal Create Transaksi Peminjaman -->
                    <div class="modal fade" id="createtransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buat Transaksi Peminjaman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="createpeminjaman.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP Mahasiswa</label>
                                            <?php
                                            $nrpmhs = ociparse($con, "SELECT NRP FROM MAHASISWA");
                                            oci_execute($nrpmhs);
                                            ?>
                                            <select class="form-control" name="nrp" required>
                                                <option selected>NRP Mahasiswa</option>
                                                <?php
                                                while (ocifetch($nrpmhs)) {
                                                    echo "<option value=" . ociresult($nrpmhs, "NRP") . ">" . ociresult($nrpmhs, "NRP") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">ID Buku</label>
                                            <?php
                                            $idbuk = ociparse($con, "SELECT ID FROM BUKU");
                                            oci_execute($idbuk);
                                            ?>
                                            <select class="form-control" name="idbuku" required>
                                                <option selected>ID Buku</option>
                                                <?php
                                                while (ocifetch($idbuk)) {
                                                    echo "<option value=" . ociresult($idbuk, "ID") . ">" . ociresult($idbuk, "ID") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExTanggalpinjam" style="margin-bottom: 10px;">Tanggal Peminjaman Buku</label>
                                            <input type="date" class="form-control" id="InputTanggalpinjam" name="tanggalpinjam" placeholder="Masukkan Tanggal Pinjam Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExTanggalKembali" style="margin-bottom: 10px;">Tanggal Kembali Buku</label>
                                            <input type="date" class="form-control" id="InputTanggalKembali" name="tanggalKembali" placeholder="Masukkan Tanggal Kembali Buku" required>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Update Transaksi Peminjaman -->
                    <div class="modal fade" id="updatetransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Transaksi Peminjaman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="updatetransaksi.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP Mahasiswa</label>
                                            <?php
                                            $nrpmhs = ociparse($con, "SELECT * FROM TRANSAKSI_PEMINJAMAN");
                                            oci_execute($nrpmhs);
                                            ?>
                                            <select class="form-control" name="nrp" required>
                                                <option selected>NRP Mahasiswa</option>
                                                <?php
                                                while (ocifetch($nrpmhs)) {
                                                    echo "<option value=" . ociresult($nrpmhs, "ID_MAHASISWA") . ">" . ociresult($nrpmhs, "ID_MAHASISWA") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">ID Buku</label>
                                            <?php
                                            $idbuk = ociparse($con, "SELECT ID FROM BUKU");
                                            oci_execute($idbuk);
                                            ?>
                                            <select class="form-control" name="idbuku" required>
                                                <option selected>ID Buku</option>
                                                <?php
                                                while (ocifetch($idbuk)) {
                                                    echo "<option value=" . ociresult($idbuk, "ID") . ">" . ociresult($idbuk, "ID") . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExTanggalpinjam" style="margin-bottom: 10px;">Tanggal Peminjaman Buku</label>
                                            <input type="date" class="form-control" id="InputTanggalpinjam" name="tanggalpinjam" placeholder="Masukkan Tanggal Pinjam Buku" required>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExTanggalKembali" style="margin-bottom: 10px;">Tanggal Kembali Buku</label>
                                            <input type="date" class="form-control" id="InputTanggalKembali" name="tanggalKembali" placeholder="Masukkan Tanggal Kembali Buku" required>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Hapus Transaksi Peminjaman -->
                    <div class="modal fade" id="deletetransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi Peminjaman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="deletetransaksi.php" name="kirim">
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">NRP Mahasiswa</label>
                                            <?php
                                            $idtransaksi = ociparse($con, "SELECT ID_MAHASISWA FROM TRANSAKSI_PEMINJAMAN");
                                            $nrpresult;
                                            oci_execute($idtransaksi);
                                            ?>
                                            <select class="form-control" name="nrp" required>
                                                <option selected>NRP Mahasiswa</option>
                                                <?php
                                                while (ocifetch($idtransaksi)) {
                                                    echo "<option value=" . ociresult($idtransaksi, "ID_MAHASISWA") . ">" . ociresult($idtransaksi, "ID_MAHASISWA") . "</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px; ">
                                            <label for="ExInputNRP" style="margin-bottom: 10px;">ID Buku</label>
                                            <?php
                                            $idbukuku = ociparse($con, "SELECT ID_BUKU FROM TRANSAKSI_PEMINJAMAN");
                                            oci_execute($idbukuku); ?>
                                            <select class="form-control" name="idbuku" required>
                                                <option selected>ID Buku</option>
                                                <?php
                                                while (ocifetch($idbukuku)) {
                                                    echo "<option value=" . ociresult($idbukuku, "ID_BUKU") . ">" . ociresult($idbukuku, "ID_BUKU") . "</option>";
                                                }
                                                ?>
                                            </select>
                                            
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Section Transaksi End ======= -->
    </main>
    <!-- ======= Footer ======= -->
    <section id="contact" style="margin-bottom: 100px;">
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



    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>