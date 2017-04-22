<?php
$user_id = $_POST['username'];
$user_pass = $_POST['password1'];

include '../db_config/connection.php';

$sql = "UPDATE user_info SET password='$user_pass' WHERE user_id='$user_id' or email='$user_id'";

if ($conn->query($sql) === TRUE) {
   include '../db_config/connection.php';
   $sql = "DELETE FROM tokens WHERE user='$user_id'";

if ($conn->query($sql) === TRUE) {
header("location:../?message=Password updated successfully");
} else {
header("location:./?error=Could not update your password");
}

$conn->close();
} else {
header("location:./?error=Could not update your password");
}

$conn->close();

?>