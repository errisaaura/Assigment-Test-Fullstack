<?php
include '../../helper/db.php';
session_start();

$id_user = $_GET['id_user'];
$password = md5($_POST['password']);


$sql = "update user set password='" . $password . "' where id_user='" . $_SESSION['id_user'] . "' ";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>
        alert('Success change password user!');
        document.location.href = './profile.php';
    </script>
    ";
} else {
    echo
    "<script>
            alert('Failed change password user!');
        </script>
        ";
    printf('Failed change password user: ' . mysqli_error($conn));
    exit();
}
