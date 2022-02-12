<?php 
require '../../PHP/connect.php';
$sql = "SELECT * FROM Stock";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<head>
    <title>Manage Stock</title>
    <link rel="stylesheet" href="../../CSS/manage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h1>Manage Stock</h1>
    </div>
    <form method="post">
        <div class="flex">
            <button class="btn" type="submit" name="btn">Manage Import</button>
            <button class="btn" type="submit" name="btn1">Manage Export</button>
        </div>
    </form>
    <h2>Current Stock data</h2>
    <table>
        <tr>
            <th>Id</td>
            <th>Fuel type</td>
            <th>Date</td>
            <th>Quantity</td>
            <!-- <th>Actions</th> -->
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
                        <td> <?php echo $row["stock_id"]; ?> </td>
                        <td> <?php echo $row["stock_date"]; ?> </td>
                        <td> <?php echo $row["stock_name"]; ?> </td>
                        <td> <?php echo $row["stock_quantity"]; ?> </td>
                        <!-- <td>2</td>
                        <td>Petrol</td>
                        <td>05-02-2022</td>
                        <td>2000Ltr</td>
                        <td>
                            <a href="./updateSupplier.php?id=<?php echo $row["supplier_id"];?>" id='edit'> <i class='fas fa-pen' ></i></a>
                            <i class='fas fa-trash-alt' id='delete'></i>
                            <a href="./deleteSupplier.php?id=<?php echo $row["supplier_id"];?>" id='delete'> <i class='fas fa-trash' ></i></a>
                        </td> -->
                    </tr>
        <?php            
                }   
            }
            else
            {
                echo "<th colspan='8' style='margin-top: 50px;'> There is no data in databse(ERROR: table stock is not created)</th>";
            }
        ?>
    </table>
</body>
</html>
<?php
    if(isset($_POST['btn']))
    {
        echo '<script> window.location.href="./Import/manageImport.php"</script>';
    }
    if(isset($_POST['btn1']))
    {
        echo '<script> window.location.href="./Export/manageExport.php"</script>';
    }
?>