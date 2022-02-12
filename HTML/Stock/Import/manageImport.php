<?php 
require '../../../PHP/connect.php';
// $sql = "SELECT * FROM Import";
$sql = "SELECT I.import_id, I.import_date, I.import_price_per_liter, I.import_quantity, I.import_price,  Su.supplier_id,
        Su.supplier_name, St.stock_id, St.stock_name FROM Import AS I INNER JOIN Supplier AS Su ON I.supplier_id = Su.supplier_id
        INNER JOIN Stock AS St ON I.stock_id = St.stock_id";
$result = $conn->query($sql);
// var_dump($result);echo "<br>";
?>

<!DOCTYPE html>
<head>
    <title>Manage Import</title>
    <link rel="stylesheet" href="../../../CSS/manage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h1>Manage Import</h1>
    </div>
    <form method="post">
        <button class="btn" type="submit" name="btn">Import Fuel</button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Import date</th>
            <th>Supplier id</th>
            <th>Supplier name</th>
            <th>stock id</th>
            <th>stock name</th>
            <th>import price per liter</th>
            <th>import quantity</th>
            <th>import price</th>
            <!-- <th>Phone no.</th>
            <th>Actions</th> -->
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
                        <td> <?php echo $row["import_id"]; ?> </td>
                        <td> <?php echo date('d/m/Y', strtotime($row["import_date"])); ?> </td>
                        <td> <?php echo $row["supplier_id"]; ?> </td>
                        <td> <?php echo $row["supplier_name"]; ?> </td>
                        <td> <?php echo $row["stock_id"]; ?> </td>
                        <td> <?php echo $row["stock_name"]; ?> </td>
                        <td> <?php echo $row["import_price_per_liter"]; ?> </td>
                        <td> <?php echo $row["import_quantity"]; ?> </td>
                        <td> <?php echo $row["import_price"]; ?> </td>
                        <!-- <td> -->
                            <!-- <div class='actions'> -->
                            <!-- $dBirthDate = date('d-m-Y', strtotime($row["supplier_birthdate"])); -->
                            <!-- <a href="./updateSupplier.php?id=<?php echo $row["supplier_id"];?>" id='edit'> <i class='fas fa-pen' ></i></a> -->
                            <!-- <i class='fas fa-trash-alt' id='delete'></i> -->
                            <!-- <a href="./deleteSupplier.php?id=<?php echo $row["supplier_id"];?>" id='delete'> <i class='fas fa-trash' ></i></a> -->

                            <!-- </div> -->
                        <!-- </td> -->
                    </tr>
        <?php            
                }   
            }
            else
            {
                echo "<th colspan='8' style='margin-top: 50px;'> There is no data in databse please click Import Fuel button to insert</th>";
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
        echo '<script> window.location.href="./importFuel.php"</script>';
    }
?>