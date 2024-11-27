<?php

include '../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Halaman Admin</title>
</head>

<body>
    <!-- Modal Create Buku -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buatbuku">
        Buat Buku
    </button>

    <!-- Modal Buat Buku -->
    <div class="modal fade" id="buatbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Modal Create Mhs -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buatmhs">
        Buat Mhs
    </button>

    <!-- Modal Buat Mhs -->
    <div class="modal fade" id="buatmhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </div>
                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>  
    <!-- Modal Create Transaksi Peminjaman -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buattransaksi">
        Buat Transaksi
    </button>

    <!-- Modal Transaksi Peminjaman -->
    <div class="modal fade" id="buattransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="ExTanggalKembali" style="margin-bottom: 10px;">Tanggal Peminjaman Buku</label>
                            <input type="date" class="form-control" id="InputTanggalKembali" name="tanggalKembali" placeholder="Masukkan Tanggal Kembali Buku" required>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <a href="readtransaksi.php"><button type="button" class="btn btn-primary">
        READ TRANSAKSI
    </button></a>

</body>

</html>