<?php
$conn=mysqli_connect('localhost','root','','book_management');

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>