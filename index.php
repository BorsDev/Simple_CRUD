<?php
    require_once "config/db.config.php";
    $data_sql = "SELECT * FROM user";
    $data_query = mysqli_query($conn, $data_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>

    <!--style from vendor-->
    <link rel="stylesheet" href="vendor/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--custom styling-->
    <link rel="stylesheet" href="Style/style.css">

</head>
<body>
    <!--header-->
    <section id="header">
    </section>
    <!--!header-->

    <!--body-->
    <section id="body">
        <!--Form submit-->
        <div class="container py-2 px-2">
            <h2 class="text-center py-2">Form Pendaftaran</h2>
            <form action="php/submit.act.php" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="inputnama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="inputnama" placeholder="Nama" required>
                    </div>
                    <div class="form-group col">
                        <label for="inputalamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Alamat" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-success mt-2">Submit!!</button>
            </form>
        </div>

        <!--Table data-->
        <div class="container py-2 px-2">
            <h2 class="text-center">Tabel Data</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-3">Nama</th>
                        <th class="col-sm-6">Alamat</th>
                        <th class="col-sm-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($data = mysqli_fetch_array($data_query)){
                ?>
                    <tr>
                        <td><?php echo $data['U_ID'];?></td>
                        <td><?php echo $data['U_NAME'];?></td>
                        <td><?php echo $data['U_ADDRESS'];?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $data['U_ID'];?>">Edit</button>

                            <div class="modal fade" id="modalEdit<?php echo $data['U_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="php/edit.act.php?user_id=<?php echo $data['U_ID'];?>" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="editnama">Nama</label>
                                                        <input type="text" class="form-control" id="editnama" placeholder="Nama" name="editnama" value="<?php echo $data['U_NAME'];?>" required>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="editalamat">Alamat</label>
                                                        <input type="text" class="form-control" id="editalamat" placeholder="Alamat" name="editalamat" value="<?php echo $data['U_ADDRESS'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary ">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteID" class="btn btn-danger">Delete</button>

                            <div class="modal fade" id="deleteID" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="php/delete.act.php?user_id=<?php echo $data['U_ID'];?>" class="btn btn-danger">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    <!--!body-->

    <!--footer-->
    <section id="footer">
    </section>
    <!--!footer-->

    <!--script from vendoor-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="vendor/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/fontawesome.min.js" integrity="sha512-KCwrxBJebca0PPOaHELfqGtqkUlFUCuqCnmtydvBSTnJrBirJ55hRG5xcP4R9Rdx9Fz9IF3Yw6Rx40uhuAHR8Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--custom js-->
    <script src="Javascript/app.js"></script>
</body>
</html>