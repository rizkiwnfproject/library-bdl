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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>PBDL Latihan 3</title>
</head>

<body style="font-family: Poppins, sans-serif;">

    <div class="container" style="margin-top: 40px; ">
        <div class="card" style="margin-bottom: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <center>
                <h1 style="margin-bottom: 25px; margin-top: 40px; ">Praktikum Basis Data Lanjut</h1>
                <h4 style="margin-bottom: 25px;">Latihan Nomor 3</h4>
            </center>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-striped" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                            <thead style="background-color:black; color:white;">
                                <tr>
                                    <th scope="col" style="text-align: center">NRP Mahasiswa</th>
                                    <th scope="col" style="text-align: center">Nama Mahasiswa</th>
                                    <th scope="col" style="text-align: center">ID Buku</th>
                                    <th scope="col" style="text-align: center">Nama Buku</th>
                                    <th scope="col" style="text-align: center">Tanggal Pinjam</th>
                                    <th scope="col" style="text-align: center">Tanggal Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = ociparse($con, "SELECT * FROM TRANSAKSI_PEMINJAMAN");
                                oci_execute($sql);
                                while (ocifetch($sql)) { ?>
                                    <tr>
                                        <th scope="row" style="text-align: center">
                                            <?php echo ociresult($sql, "ID_MAHASISWA");
                                            $idmhs = ociresult($sql, "ID_MAHASISWA");
                                            ?></th>
                                        <?php
                                        $sql2 = ociparse($con, "SELECT * FROM MAHASISWA WHERE NRP = $idmhs");
                                        oci_execute($sql2);
                                        while (ocifetch($sql2)) { ?>
                                            <td style="text-align: center"><?php echo ociresult($sql2, "NAMA") ?></td>
                                        <?php
                                        }
                                        ?>
                                        <td style="text-align: center">
                                            <?php echo ociresult($sql, "ID_BUKU");
                                            $idbuku = ociresult($sql, "ID_BUKU");
                                            ?></td>
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
                        <button type="button" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#deletetransaksi">
                            Delete
                        </button>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#updatetransaksi">
                            Update
                        </button>
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
                                    </div>
                                    <button type="submit" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 15px; width:94%;" name="submit" id="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>