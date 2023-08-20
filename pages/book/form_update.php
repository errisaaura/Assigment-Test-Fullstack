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
    <h3 style="text-align: center;">Form Update Book</h3>
    <form action="proses_update.php?id_book=<?php echo $_GET['id_book'] ?>" method="post" enctype="multipart/form-data">
        <?php
        $sql = 'select * FROM book WHERE id_book = ' . $_GET['id_book'];
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="mb-3">
            <label for="Image">Image<span class="text-danger">*</span></label>
            <input type="file" name="image" class="form-control" id="image" value="<?php echo $data['image'] ?>">
        </div>
        <div class="mb-3">
            <label for="title">Title<span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $data['title'] ?>">
        </div>
        <div class="mb-3">
            <label for="description">Description<span class="text-danger">*</span></label>
            <textarea class="form-control" name="description" id="description" rows="4"><?php echo $data['description'] ?> </textarea>
        </div>

        <button type="submit" style="margin-left: 30px;" class="btn btn-primary">Update</button>
    </form>
</body>

</html>