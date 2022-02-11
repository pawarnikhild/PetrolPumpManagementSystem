<?php
include '../../PHP/connect.php';
$id = $_GET['id'];
// $table = $_GET['table'];
$sql = "DELETE FROM Employee WHERE employee_id = $id";
// echo $id;
// echo $table;
// echo $sql;
if($conn->query($sql)==TRUE)
{
    echo "<script> alert('Employee deleted succesfully')</script>";
    // header("location:../HTML/manageEmployee.php"); //
    echo '<script> window.location.href = "./manageEmployee.php"; </script>';
}
else
{
    echo "<script> alert('Error in deletion');</script>";
}


?>