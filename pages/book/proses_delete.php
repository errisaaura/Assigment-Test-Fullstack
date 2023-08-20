
<?php
include '../../helper/db.php';
session_start();

$id_book = $_GET['id_book'];

$sql = "
    DELETE FROM book
    WHERE id_book = '" . $id_book . "';
";


$result = mysqli_query($conn, $sql);
if ($result) {
    if ($_SESSION['role'] == "admin") {
        echo "<script>alert('Success delete book');location.href='daftar_book_admin.php';</script>";
    } elseif (($_SESSION['role'] == "member")) {
        echo "<script>alert('Success delete book');location.href='daftar_book_member.php';</script>";
    }
} else {
    echo "
            <script>
                alert('Failed delete book');
                
            </script>
        ";
    printf('Failed Delete book: ' . mysqli_error($conn));
    exit();
}
?>