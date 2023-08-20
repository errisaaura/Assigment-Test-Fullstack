<?php
include '../../helper/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Poppins';
        }

        .mb-3 {
            padding-left: 20px;
            padding-right: 20px;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 20px;
            text-decoration: underline grey 2px;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center;">Form Update Petugas</h3>
    <form action="proses_update.php?id_user=<?php echo $_GET['id_user'] ?>" method="post">
        <?php
        $sql = 'select * FROM user WHERE id_user = ' . $_GET['id_user'];
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="mb-3">
            <label for="firsyname">Firstname<span class="text-danger">*</span></label>
            <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $data['firstname'] ?>">
        </div>
        <div class="mb-3">
            <label for="lastname">Lastname<span class="text-danger">*</span></label>
            <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $data['lastname'] ?>">
        </div>
        <div class="mb-3">
            <label for="email">Email<span class="text-danger">*</span></label>
            <input type="text" name="email" class="form-control" id="email" value="<?php echo $data['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="lastname">Role<span class="text-danger">*</span></label>
            <select class="form-select form-select" name="role" aria-label=".form-select-sm example" required>
                <option>admin</option>
                <option>member</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="birthday_date">Birthday Date<span class="text-danger">*</span></label>
            <input type="date" name="birthday_date" class="form-control" id="birthday_date" value="<?php echo $data['birthday_date'] ?>">
        </div>
        <div class="mb-3">
            <label for="Phone">Phone<span class="text-danger">*</span></label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $data['phone'] ?>">
        </div>
        <button type="submit" style="margin-left: 30px;" class="btn btn-primary">Update</button>
    </form>
</body>

</html>