<?php
include '../../helper/db.php';
session_start();

// $id_user = $_GET['id_user'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$birthday_date = $_POST['birthday_date'];
$phone = $_POST['phone'];

$sql = "update user set firstname='" . $firstname . "', lastname='" . $lastname . "', email='" . $email . "', birthday_date='" . $birthday_date . "', phone='" . $phone . "' where id_user='" . $_SESSION['id_user'] . "' ";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo "<script>
        alert('Success update user!');
        document.location.href = './profile.php';
    </script>
    ";
} else {
    echo
    "<script>
            alert('Failed update user!');
        </script>
        ";
    printf('Failed update user: ' . mysqli_error($conn));
    exit();
}
