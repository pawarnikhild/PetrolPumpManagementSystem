<?php
include '../../PHP/connect.php';
$id = $_GET['id'];
// $table = $_GET['table'];
$sql = "DELETE FROM Supplier WHERE supplier_id = $id";
// echo $id;
// echo $table;
// echo $sql;
if($conn->query($sql)==TRUE)
{
    echo "<script> alert('Supplier deleted succesfully')</script>";
    // header("location:../HTML/manageEmployee.php"); //
    echo '<script> window.location.href = "./manageSupplier.php"; </script>';
}
else
{
    echo "<script> alert('Error in deletion');</script>";
}


?>