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
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // Following code is for validation and assignment after validation of variables
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
            $stockIdErr = "Stock Id is required";
        }
        else
        {
            $stockId = test_input($_POST['stockId']);
        }

        // importPricePerLiter validation
        if(empty($_POST['importPricePerLiter']))
        {
            $importPricePerLiterErr = "ImportPricePerLiter is required";
        }
        else
        {
            $importPricePerLiter = test_input($_POST['importPricePerLiter']);
            echo "<script>
            console.log('After php');
            var jIPPL = '<?php echo $importPricePerLiter;?>';
            console.log('adsfadsf');
            console.log('jIPPL: '+jIPPL);
             </script>";
            // echo "<script> console.log('asdfasdf');</script>";
            echo "<script> 
            console.log('2nd');
            // console.log('adsfadsf');
            // var jIPPL = undefined;
            // jIPPL = '<? php echo $importPricePerLiter;?>';
            var jPPL = <?php echo json_encode($importPricePerLiter); ?>;
            console.log('jPPL:' jPPL);
            </script>";
            echo "<script>
            console.log('adsfadsf');
            var jIPPL = <? php echo $importPricePerLiter?>;
            console.log('adsfadsf');
            console.log('jIPPL: '+jIPPL);
             </script>";
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
            $importQuantity = test_input($_POST['importQuantity']);
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $importQuantity)) {  
                $importQuantityErr = "Only numeric value is allowed.";  
            }
        }
        // importPrice validation
        $importPrice = $_COOKIE['Cookie'];
        if(empty($_POST['importPrice']))
        {
            $importPriceErr = "ImportPrice is required";
        }
        else
        {
            $importPrice = test_input($_POST['importPrice']);
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $importPrice)) {  
                $importPriceErr = "Only numeric value is allowed.";  
            }
        }

        // echo $phoneNo;
        // echo "<br>";  
        echo $importPrice;
        // echo "<br>";  
        // echo $importPriceErr;
        echo "<script>
            console.log('In php');
            var jIPPL = <?php echo $importPricePerLiter?>;
            console.log('adsfadsf');
            console.log('jIPPL: '+jIPPL);
             </script>";

        if($importDateErr == "" && $supplierIdErr == "" && $stockIdErr == "" && $importPricePerLiterErr == "" &&
           $importQuantityErr == "" && $importPriceErr == "")
        {  
            // echo "Name: " .$name;  
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
                // echo '<script> window.location.href="./manageImport.php"</script>';
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
            // echo "NameErr: " .$nameErr;  
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
      
    //   var_dump($name);
    //   var_dump($phoneNo);
    //   var_dump($typeOfWork);
    //   var_dump($email);
    //   var_dump($address);
    //   var_dump($birthDate);
    //   var_dump($gender);
    
?>
<!-- <script>
            var jIPPL = '<?php echo $importPricePerLiter;?>';
            console.log('jIPPL: '+jIPPL);
            var jQ = '<?php echo $importQuantity?>';
            console.log('jQ: '+jQ);
            var importPirce = jIPPL * jQ;
            console.log('importPirce: '+importPirce);
            var element = document.getElementById('importPrice');
            console.log(element);
</script> -->
<script>
            function calculateImportPrice()
            {
                document.getElementById("importPrice").style.backgroundColor = "white";
                // var jIPPL = '<?php echo $importPricePerLiter;?>';
                var jIPPL = document.getElementById('importPricePerLiter').value;
                console.log('jIPPL: '+jIPPL);
                // var jQ = '<?php echo $importQuantity?>';
                var jIQ = document.getElementById('importQuantity').value;
                console.log('jQ: '+jIQ);
                var jIP = jIPPL * jIQ;
                console.log('jIP: '+jIP);
                document.getElementById('importPrice').value = jIP;
                document.cookie = "Cookie = "+jIP;
                
                // var element = document.getElementById('importPrice').value = importPirce;
                console.log(element);
                // document.getElementById("importPrice").style.backgroundColor = "white";
                // document.getElementById("importPrice").style.backgroundColor = "white";
            }
            function chngeColor()
            {
                document.getElementById("importPrice").style.backgroundColor = "#cfe0fc";
            }
    </script>
    
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
                    <input id="importPricePerLiter" type="text" name="importPricePerLiter" placeholder="Price Per Liter"
                     value="<?php echo $importPricePerLiter;?>" onkeydown="chngeColor()" onkeyup="calculateImportPrice()">
                    <span class="error"> <?php echo $importPricePerLiterErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Quantity</span><br>
                    <input id = "importQuantity" type="text" name="importQuantity" placeholder="Quantity"
                     value="<?php echo $importQuantity;?>" onkeydown="chngeColor()" onkeyup="calculateImportPrice()">
                    <span class="error"> <?php echo $importQuantityErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Total Price</span><br>
                    <input id="importPrice" type="text" name="importPrice" placeholder="Total Price"
                     value="<?php echo $importPrice;?>" disabled>
                    <span class="error"> <?php echo $importPriceErr; ?> </span>  
                </div>
            </div>
            <div class="buttonC">
                <button type="submit" value="Register" name="btn">Register</button>
            </div>
        </form>
    </div>
    <!-- <script>
            function calculateImportPrice()
            {
                document.getElementById("importPrice").style.backgroundColor = "white";
                // var jIPPL = '<?php echo $importPricePerLiter;?>';
                var jIPPL = document.getElementById('importPricePerLiter').value;
                console.log('jIPPL: '+jIPPL);
                // var jQ = '<?php echo $importQuantity?>';
                var jIQ = document.getElementById('importQuantity').value;
                console.log('jQ: '+jIQ);
                var jIP = jIPPL * jIQ;
                console.log('jIP: '+jIP);
                document.getElementById('importPrice').value = jIP;
                // var element = document.getElementById('importPrice').value = importPirce;
                console.log(element);
                // document.getElementById("importPrice").style.backgroundColor = "white";
                // document.getElementById("importPrice").style.backgroundColor = "white";
            }
            function chngeColor()
            {
                document.getElementById("importPrice").style.backgroundColor = "#9ec1fa";
            }
    </script> -->
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
