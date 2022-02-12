<?php
    require '../../../PHP/connect.php';
    $sql = "SELECT supplier_id, supplier_name FROM Supplier";
    $result = $conn->query($sql);
    $sql1 = "SELECT stock_id, stock_name FROM Stock";
    $result1 = $conn->query($sql1);
    // var_dump($result);
    // var_dump($result1);

    // $nameErr = $phoneNoErr = $typeOfWorkErr = $emailErr = $addressErr = $birthDateErr = $genderErr = "";
    // $supplierName =  $phoneNo = $typeOfWork = $email = $address = $birthDate = $gender = "";
    $importDate = $supplierId = $stockId = $importPricePerLiter = $importQuantity = $importPrice ="";
    $importDateErr = $supplierIdErr = $stockIdErr = $importPricePerLiterErr = $importQuantityErr = $importPriceErr ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $importDate = test_input($_POST['importDate']);
        $supplierId = test_input($_POST['supplierId']);
        $stockId = test_input($_POST['stockId']);
        $importPricePerLiter = test_input($_POST['importPricePerLiter']);
        $importQuantity = test_input($_POST['importQuantity']);
        $importPrice = test_input($_POST['importPrice']);

        // importDate (Empty)validation
        if(empty($_POST['importDate']))
        {
            $importDateErr = "Import Date is required";
        }
        else
        {
            $importDate = test_input($_POST['importDate']);
        }

        // supplierId (Empty)validation
        if(empty($_POST['supplierId']))
        {
            $supplierIdErr = "Supplier Id is required";
        }
        else
        {
            $supplierId = test_input($_POST['supplierId']);
        }

        // stockId (Empty)validation
        if(empty($_POST['stockId']))
        {
            $stockIdErr = "stockId Id is required";
        }
        else
        {
            $stockId = test_input($_POST['stockId']);
        }

        // importPricePerLiter validation
        if(empty($_POST['importPricePerLiter']))
        {
            $importPricePerLiterErr = "importPricePerLiter is required";
        }
        else
        {
            $importPricePerLiter = test_input($_POST['importPricePerLiter']);
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $importPricePerLiter)) {  
                $importPricePerLiterErr = "Only numeric value is allowed.";  
            }
        }
        // importQuantity validation
        if(empty($_POST['importQuantity']))
        {
            $importQuantityErr = "Quantity is required";
        }
        else
        {
            $phoneNo = test_input($_POST['importQuantity']);
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $importQuantity)) {  
                $importQuantityErr = "Only numeric value is allowed.";  
            }
        }
        // importPrice validation
        if(empty($_POST['importPrice']))
        {
            $importPriceErr = "ImportPrice is required";
        }
        else
        {
            $phoneNo = test_input($_POST['importPrice']);
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $importPrice)) {  
                $importPriceErr = "Only numeric value is allowed.";  
            }
        }

        // echo $nameErr;
        // echo $phoneNoErr;
        // echo $genderErr;
        
    // $importDateErr = $supplierIdErr = $stockIdErr = $importPricePerLiterErr = $importQuantityErr = $importPriceErr ="";

        if($importDateErr == "" && $supplierIdErr == "" && $stockIdErr == "" && $importPricePerLiterErr == "" && $importQuantityErr == ""
           && $importPriceErr == "")
        {  
            // echo "Name: " .$name;  
            // echo "<br>";  
            // echo "Mobile No: " .$phoneNo;  
            // echo "<br>";  
            // echo "TypeOfWorkErr: " .$typeOfWork;
            // echo "<br>";  
            // echo "Email: " .$email;  
            // echo "<br>";  
            // echo "Address: " .$address;  
            // echo "<br>";  
            // echo "BirthDate: " .$birthDate;
            // echo "<br>";  
            // echo "Gender: " .$gender;
            // echo "<br>";
            // echo "<br>";
            
            // echo "NameErr: " .$nameErr;  
            // echo "<br>";  
            // echo "Mobile NoErr: " .$phoneNoErr;  
            // echo "<br>";  
            // echo "TypeOfWorkErr: " .$typeOfWorkErr;
            // echo "<br>";  
            // echo "EmailErr: " .$emailErr;  
            // echo "<br>";  
            // echo "AddressErr: " .$addressErr;  
            // echo "<br>";  
            // echo "BirthDateErr: " .$birthDateErr;
            // echo "<br>";  
            // echo "GenderErr: " .$genderErr;  
            // echo "<br>";
            echo '<script> console.log("Succes"); </script>';
            echo '<script> alert("Inserted all fields")</script>';

            require '../../../PHP/connect.php';
            // var_dump($conn);
            							

            $sql = "INSERT INTO Import
            (import_date, supplier_id, stock_id, import_price_per_liter, import_quantity, import_price)
            VALUES ('$importDate', '$supplierId', '$stockId', '$importPricePerLiter', '$importQuantity', '$importPrice')";

            if ($conn->query($sql) === TRUE)
            {
                // echo nl2br("Values inserted in table successfully\n");
                echo '<script> alert("New import record added successfully")</script>';
                echo '<script> console.log("Values inserted in Import table successfully"); </script>';
                echo '<script> window.location.href="./manageImport.php"</script>';
            }
            else
            {
                die("Failed to create table $table : " . $con->connect_error);
                echo '<script> alert("Error in adding import record please try again")</script>';
                echo '<script> console.log("Failed to insert values in table<br>ERROR : $conn->connect_error"); </script>';
            }
            // echo '<script> console.log("Code is running"); </script>';

            // echo '<script> window.location.href = "2nd.php"; </script>';
            
        } else {  
            // echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
            // echo "<h2>Your Input:</h2>";  
            // echo "Name: " .$name;  
            // echo "<br>";  
            // echo "Mobile No: " .$phoneNo;  
            // echo "<br>";  
            // echo "TypeOfWork: " .$typeOfWork;
            // echo "<br>";  
            // echo "Email: " .$email;  
            // echo "<br>";  
            // echo "Address: " .$address;  
            // echo "<br>";  
            // echo "BirthDate: " .$birthDate;
            // echo "<br>";  
            // echo "Gender: " .$gender;  
            // echo "<br>";
            // echo "<br>";
            
            // echo "NameErr: " .$nameErr;  
            // echo "<br>";  
            // echo "Mobile NoErr: " .$phoneNoErr;  
            // echo "<br>";  
            // echo "TypeOfWorkErr: " .$typeOfWorkErr;
            // echo "<br>";  
            // echo "EmailErr: " .$emailErr;  
            // echo "<br>";  
            // echo "AddressErr: " .$addressErr;  
            // echo "<br>";  
            // echo "BirthDateErr: " .$birthDateErr;
            // echo "<br>";  
            // echo "GenderErr: " .$genderErr;  
            // echo "<br>";

            // echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
            echo '<script> console.log("Failure"); </script>';
            echo '<script> alert("Error in entering values please check and try again")</script>';
            // $nameErr =""; $phoneNoErr =""; $typeOfWorkErr =""; $emailErr =""; $addressErr =""; $birthDateErr =""; $genderErr = "";
            // if($nameErr == "" && $phoneNoErr == "" && $typeOfWorkErr == "" && $emailErr == "" && $addressErr == "" && $birthDateErr = "" && $genderErr == "") {  
            //     echo '<script> console.log("All error values reset"); </script>';
                
            // } else {  
            //     // echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
            //     echo '<script> console.log("Failure in resetting error values"); </script>';
            // }  
        }  
        
    }
      
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    //   var_dump($name);
    //   var_dump($phoneNo);
    //   var_dump($typeOfWork);
    //   var_dump($email);
    //   var_dump($address);
    //   var_dump($birthDate);
    //   var_dump($gender);

    
    
?>

<html>

<head>
    <title>Import Fuel</title>
    <link rel="stylesheet" href="../../../CSS/addEmp.css">
</head>

<body>
    <div class="Container">
        <!-- <form method="post" action="./addEmpProcess.php" auto_complete="off"> -->
        <form method="post" aciton="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">    
            <h2>Import Fuel</h2>
            <div class="FlexC">
                <div class="NameandInputC">
                        <span class="inputName">Import Date</span><br>
                            <input type="date" name="importDate" placeholder="Import date" value="<?php echo $importDate;?>">
                        <span class="error"> <?php echo $importDateErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Supplier Name</span><br>
                    <select name="supplierId" id="SupplierName"  value="<?php echo $supplierId;?>">
                        <option value="">--Please choose an option--</option>
                        <?php
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    // echo "<tr><td>".$row["supplier_name"]."</td>";
                                    // echo $row["supplier_name"];
                        ?>
                        <option value="<?php echo $row["supplier_id"]; ?>"><?php echo $row["supplier_id"]." ". $row["supplier_name"]; ?></option>
                        <?php            
                                }   
                            }
                            else
                            {
                                echo "Error";
                        ?>        
                                <option value="error">Error else loop is getting executed</option>
                        <?php        
                            }
                        ?>    
                    </select>
                    <span class="error"> <?php echo $supplierIdErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Fuel Type</span><br>
                    <select name="stockId" id="StockName"  value="<?php echo $stockId;?>">
                        <option value="">--Please choose an option--</option>
                        <?php
                            if($result1->num_rows > 0)
                            {
                                while($row1 = $result1->fetch_assoc())
                                {
                                    // echo "<tr><td>".$row["supplier_name"]."</td>";
                        ?>
                        <option value="<?php echo $row1["stock_id"]; ?>"><?php echo $row1["stock_name"]; ?></option>
                        <?php            
                                }   
                            }
                            else
                            {
                                echo "Error";
                        ?>        
                                <option value="error">Error else loop is getting executed</option>
                        <?php        
                            }
                        ?>    
                    </select>
                    <span class="error"> <?php echo $stockIdErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Price Per Liter</span><br>
                    <input type="text" name="importPricePerLiter" placeholder="Price Per Liter" value="<?php echo $importPricePerLiter;?>">
                    <span class="error"> <?php echo $importPricePerLiterErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Quantity</span><br>
                    <input type="text" name="importQuantity" placeholder="Quantity" value="<?php echo $importQuantity;?>">
                    <span class="error"> <?php echo $importQuantityErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Total Price</span><br>
                    <input type="text" name="importPrice" placeholder="Total Price" value="<?php echo $importPrice;?>">
                    <span class="error"> <?php echo $importPriceErr; ?> </span>  
                </div>
            </div>
            <div class="buttonC">
                <button type="submit" value="Register" name="btn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php  
    // echo '<script> console.log("After code is running"); </script>';
    // if(isset($_POST['submit'])) {  
    // if($nameErr == "" && $phoneNoErr == "" && $typeOfWorkErr == "" && $emailErr == "" && $addressErr == "" && $birthDateErr = "" && $genderErr == "") {  
    //     // echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
    //     // echo "<h2>Your Input:</h2>";  
    //     // echo "Name: " .$name;  
    //     // echo "<br>";  
    //     // echo "Email: " .$email;  
    //     // echo "<br>";  
    //     // echo "Mobile No: " .$mobileno;  
    //     // echo "<br>";  
    //     // echo "Website: " .$website;  
    //     // echo "<br>";  
    //     // echo "Gender: " .$gender;  
    //     echo '<script> console.log("Succes"); </script>';
    //     echo '<script> alert("Inserted all fields")</script>';
    //     echo '<script> window.location.href = "2nd.php"; </script>';
        
    // } else {  
    //     // echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    //     echo '<script> console.log("Failure"); </script>';
    //     echo '<script> alert("All fields are to be filled")</script>';
    // }  
    // }  
?>  
