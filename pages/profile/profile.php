<?php

include "../../helper/db.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../dist/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        #layoutSidenav_content {
            background: #f7f7ff;
            margin-top: 50px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253/65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5 rem !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <?php
    include "../../layout/_header.php";
    ?>

    <div id="layoutSidenav">
        <?php
        include "../../layout/_sidenav.php"
        ?>

        <div id="layoutSidenav_content">
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center mt-5 mb-3">
                                        <?php
                                        $sql = 'select * FROM user WHERE id_user = ' . $_SESSION['id_user'];
                                        $result = mysqli_query($conn, $sql);
                                        $data = mysqli_fetch_assoc($result);
                                        ?>

                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        <div class="mt-3">
                                            <h4><?php echo $data['firstname'] ?></h4>
                                            <p class="text-secondary mb-1"><?php echo $_SESSION['role'] ?></p>
                                            <p></p>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFormEditPassword">Edit Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="proses_update.php?id_user=<?php echo $_SESSION['id_user'] ?>" method="post">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Firstname</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="firstname" class="form-control" value="<?php echo $data['firstname'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Lastname</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="lastname" class="form-control" value="<?php echo $data['lastname'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'] ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Birthday Date</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="date" name="birthday_date" class="form-control" value="<?php echo $data['birthday_date'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="ModalFormEditPassword" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="update_password.php?id_user=<?php echo  $_SESSION['id_user'] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Edit Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-primary mx-auto w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../dist/assets/demo/chart-area-demo.js"></script>
    <script src="../../dist/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../dist/js/datatables-simple-demo.js"></script>
</body>

</html>