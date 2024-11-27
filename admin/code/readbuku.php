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
                                    <th scope="col" style="text-align: center">ID Buku</th>
                                    <th scope="col" style="text-align: center">Nama Buku</th>
                                    <th scope="col" style="text-align: center">Pengarang</th>
                                    <th scope="col" style="text-align: center">Eksemplar</th>
                                    <th scope="col" style="text-align: center">Waktu Penerbitan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = ociparse($con, "SELECT * FROM BUKU");
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
                        <button type="button" class="btn btn-danger" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#deletebuku">
                            Delete
                        </button>
                        <button type="button" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; width:auto; text-align:right; float:right;" data-bs-toggle="modal" data-bs-target="#updatebuku">
                            Update
                        </button>
                        <!-- Modal Update Mhs -->
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
                                                <input type="number" class="form-control" id="InputNRP" name="id" placeholder="Masukkan ID Buku" required>
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
                        <!-- Modal Transaksi Peminjaman -->
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
                                                <input type="number" class="form-control" id="InputNRP" name="id" placeholder="Masukkan ID Buku" required>
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
        </div>
    </div>
</body>

</html>