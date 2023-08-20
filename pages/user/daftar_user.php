<?php
include '../../helper/db.php';
require_once "../../layout/_top.php";
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">List User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#ModalFormTambah">
                        <span class="icon text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add User</span>
                    </button>
                </div>
                <?php
                $sql = 'select * from `user`';
                $result = mysqli_query($conn, $sql);

                ?>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $data['firstname']; ?></td>
                                    <td><?php echo $data['lastname']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['role']; ?></td>
                                    <td><?php echo $data['birthday_date']; ?></td>
                                    <td><?php echo $data['phone']; ?></td>
                                    <td>
                                        <div class="action">
                                            <a href="form_update.php?id_user=<?php echo $data['id_user'] ?>" class="btn btn-sm btn-success text-light">
                                                <span class="icon text-white">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                            <a href="proses_delete.php?id_user=<?php echo $data['id_user'] ?>" class="btn btn-sm btn-danger text-light" onClick="return confirm('Are you sure to delete this user?');">
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

</div>

<!-- Modal Form -->
<div class="modal fade" id="ModalFormTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="proses_tambah.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Form Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="firstname">Firstname<span class="text-danger">*</span></label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname">
                    </div>
                    <div class="mb-3">
                        <label for="lastname">Lastname<span class="text-danger">*</span></label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter Lastname">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="Password">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password">
                    </div>
                    <div class="mb-3">
                        <label for="lastname">Role<span class="text-danger">*</span></label>
                        <select class="form-select form-select" name="role" aria-label=".form-select-sm example">
                            <option selected>--Choose Role--</option>
                            <option>admin</option>
                            <option>member</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="birthday_date">Birthday Date<span class="text-danger">*</span></label>
                        <input type="date" name="birthday_date" class="form-control" id="birthday_date" placeholder="Enter Birthday Date">
                    </div>
                    <div class="mb-3">
                        <label for="Phone">Phone<span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
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