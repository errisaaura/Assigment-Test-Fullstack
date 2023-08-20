
<?php
include '../../helper/db.php';

$id_user = $_GET['id_user'];

$sql = "
    DELETE FROM user
    WHERE id_user = '" . $id_user . "';
";


$result = mysqli_query($conn, $sql);
if ($result) {
    echo "
            <script>
                alert('Success delete user');
                document.location.href = 'daftar_user.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Failed delete user');
                
            </script>
        ";
    printf('Failed Delete User: ' . mysqli_error($conn));
    exit();
}
?>