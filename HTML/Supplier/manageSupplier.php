<?php 
require '../../PHP/connect.php';
$sql = "SELECT * FROM Supplier";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<head>
    <title>Manage Supplier</title>
    <link rel="stylesheet" href="../../CSS/manage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h1>Manage Supplier</h1>
    </div>
    <form method="post">
        <button class="btn" type="submit" name="btn">Add Supplier</button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone no.</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    // echo "<tr><td>".$row["supplier_name"]."</td>";
                    // echo "<td>".$row["supplier_phoneno"]."</td>";
                    // echo "<td>".$row["supplier_address"]."</td>";
                    // echo"<td>";
                    // echo "<div class='actions'>";
                    // echo "<i class='fas fa-pen' id='edit'></i>";
                    // echo "<i class='fas fa-trash-alt' id='delete'></i>";
                    // // echo "<i class='fas fa-trash' id='delete'></i>";
                    // echo "</div>";
                    // echo "</td>";
                    // echo "</tr>";
        ?>
                    <tr>
                        <td > <?php echo $row["supplier_id"]; ?> </td>
                        <td> <?php echo $row["supplier_name"]; ?> </td>
                        <td> <?php echo $row["supplier_phoneno"]; ?> </td>
                        <td> <?php echo $row["supplier_address"]; ?> </td>
                        <td>
                            <!-- <div class='actions'> -->
                            <!-- $dBirthDate = date('d-m-Y', strtotime($row["supplier_birthdate"])); -->
                            <a href="./updateSupplier.php?id=<?php echo $row["supplier_id"];?>" id='edit'> <i class='fas fa-pen' ></i></a>
                            <!-- <i class='fas fa-trash-alt' id='delete'></i> -->
                            <a href="./deleteSupplier.php?id=<?php echo $row["supplier_id"];?>" id='delete'> <i class='fas fa-trash' ></i></a>

                            <!-- </div> -->
                        </td>
                    </tr>
        <?php            
                }   
            }
            else
            {
                echo "<th colspan='8' style='margin-top: 50px;'> There is no data in databse please click Add Supplier button to insert</th>";
            }
        ?>
    </table>
</body>
</html>
<?php
    if(isset($_POST['btn']))
    {
        goToAddSupplier();
    }
    function goToAddSupplier()
    {
        echo '<script> window.location.href="./addSupplier.php"</script>';
    }
?>