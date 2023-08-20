<?php
include '../../helper/db.php';
require_once "../../layout/_top.php";
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List Book</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">List Book</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#ModalFormTambah">
                        <span class="icon text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Book</span>
                    </button>
                </div>

                <?php
                $sql = 'SELECT * FROM `book` inner join `user` on user.id_user = book.id_user ;';
                $result = mysqli_query($conn, $sql);
                ?>

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>description</th>
                                <th>User</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>description</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo "../../image/" . $data['image'] ?>" class="rounded mx-auto d-block" height="220px" width="150px">
                                    </td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['description']; ?></td>
                                    <td><?php echo $data['firstname']; ?></td>
                                    <td>
                                        <div class="action">
                                            <a href="form_update.php?id_book=<?php echo $data['id_book'] ?>" class="btn btn-sm btn-success text-light">
                                                <span class="icon text-white">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                            <a href="proses_delete.php?id_book=<?php echo $data['id_book'] ?>" class="btn btn-sm btn-danger text-light" onClick="return confirm('Are you sure to delete this book?');">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
    <?php
    require_once '../../layout/_bottom.php';
    ?>

    <!-- Modal Form -->
    <div class="modal fade" id="ModalFormTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Add Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Image">Image<span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                        </div>
                        <div class="mb-3">
                            <label for="email">Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="User">Users<span class="text-danger">*</span></label>
                            <select class="form-select form-select" name="id_user" aria-label=".form-select-sm example" required>
                                <!-- <option></option> -->
                                <?php

                                include "../../helper/db.php";
                                $sql = mysqli_query($conn, "select * from user");
                                while ($data_user = mysqli_fetch_array($sql)) {
                                    echo '<option value="' . $data_user['id_user'] . '"> "' . $data_user['firstname'] . '" </option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-primary mx-auto w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </html>