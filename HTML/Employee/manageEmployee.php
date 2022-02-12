<?php 
require '../../PHP/connect.php';
$sql = "SELECT * FROM Employee";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<head>
    <title>Manage Employee</title>
    <link rel="stylesheet" href="../../CSS/manage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h1>Manage Employee</h1>
    </div>
    <form method="post">
        <button class="btn" type="submit" name="btn">Add Employee</button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone no.</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Address</th>
            <th>Birth date</th>
            <th>Gender</th>
            <th>Actions</th>
        </tr>
        <?php
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    // echo "<tr><td>".$row["employee_name"]."</td>";
                    // echo "<td>".$row["employee_phoneno"]."</td>";
                    // echo "<td>".$row["employee_typeofwork"]."</td>";
                    // echo "<td>".$row["employee_email"]."</td>";
                    // echo "<td>".$row["employee_address"]."</td>";
                    // echo "<td>".$row["employee_birthdate"]."</td>";
                    // echo "<td>".$row["employee_gender"]."</td>";
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
                        <td > <?php echo $row["employee_id"]; ?> </td>
                        <td> <?php echo $row["employee_name"]; ?> </td>
                        <td> <?php echo $row["employee_phoneno"]; ?> </td>
                        <td> <?php echo $row["employee_typeofwork"]; ?> </td>
                        <td> <?php echo $row["employee_email"]; ?> </td>
                        <td> <?php echo $row["employee_address"]; ?> </td>
                        <td> <?php echo date('d/m/Y', strtotime($row["employee_birthdate"])); ?> </td>
                        <td> <?php echo $row["employee_gender"]; ?> </td>
                        <td>
                            <!-- <div class='actions'> -->
                            <!-- $dBirthDate = date('d-m-Y', strtotime($row["employee_birthdate"])); -->
                            <a href="./updateEmployee.php?id=<?php echo $row["employee_id"];?>" id='edit'> <i class='fas fa-pen' ></i></a>
                            <!-- <i class='fas fa-trash-alt' id='delete'></i> -->
                            <a href="./deleteEmployee.php?id=<?php echo $row["employee_id"];?>" id='delete'> <i class='fas fa-trash' ></i></a>

                            <!-- </div> -->
                        </td>
                    </tr>
        <?php            
                }   
            }
            else
            {
                echo "<th colspan='9' style='margin-top: 50px;'> There is no data in databse please click Add Employye button to insert</th>";
                // colspan is given 9 because we have 9 columns including id and action and it takes space even no of columns in upper
                // row is less.
            }
        ?>
        <!-- <tr>
            <td>Nikhil Dipakkumar Pawar</td>
            <td>9822094932</td>
            <td>Receptionist</td>
            <td>pawarnikhild@gmail.com</td>
            <td>Pune</td>
            <td>1998</td>
            <td>Male</td>
            <td>
                <div class="actions">
                <i class="fas fa-pen" id="edit"></i>
                <i class="fas fa-trash-alt" id="delete"></i>
                <i class="fas fa-trash" id="delete"></i>
                </div>
            </td>
        </tr>
        <tr>
            <td>Nikhil</td>
            <td>9822094932</td>
            <td>Receptionist</td>
            <td>Nikhil@gmail.com</td>
            <td>Pune</td>
            <td>1998</td>
            <td>Male</td>
            <td>
                <div class="actions">
                <i class="fas fa-pen" id="edit"></i>
                <i class="fas fa-trash-alt" id="delete"></i>
                <i class="fas fa-trash" id="delete"></i>
                </div>
            </td>
        </tr>
        <tr>
            <td>Nikhil</td>
            <td>9822094932</td>
            <td>Receptionist</td>
            <td>Nikhil@gmail.com</td>
            <td>Pune</td>
            <td>1998</td>
            <td>Male</td>
            <td>
                <div class="actions">
                <i class="fas fa-pen" id="edit"></i>
                <i class="fas fa-trash-alt" id="delete"></i>
                <i class="fas fa-trash" id="delete"></i>
                </div>
            </td>
        </tr>
        <tr>
            <td>Nikhil</td>
            <td>9822094932</td>
            <td>Receptionist</td>
            <td>Nikhil@gmail.com</td>
            <td>Pune</td>
            <td>1998</td>
            <td>Male</td>
            <td>
                <div class="actions">
                <i class="fas fa-pen" id="edit"></i>
                <i class="fas fa-trash-alt" id="delete"></i>
                <i class="fas fa-trash" id="delete"></i>
                </div>
            </td>
        </tr> -->
    </table>
</body>
</html>
<?php
    if(isset($_POST['btn']))
    {
        echo '<script> window.location.href="./addEmployee.php"</script>';
    }
?>