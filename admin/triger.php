<?php
include '../koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

                                    <td style="text-align: center"><?php echo ociresult($sql, "ID_BUKU"); $idbuku =  ociresult($sql, "ID_BUKU");?></td>
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
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>