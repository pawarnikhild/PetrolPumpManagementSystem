<?php
   
    $nameErr = $phoneNoErr = $addressErr = "";
    $name =  $phoneNo =  $address = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $name = test_input($_POST['name']);
        $phoneNo = test_input($_POST['phoneNo']);
        $address = test_input($_POST['address']);
        // //Saglyasathi ekach if loop madhe || saglya condition deta yetil ka baghne empty sathi fakt

        // Name validation
        if(empty($_POST['name']))
        {
            $nameErr = "Name is required";
        }
        else
        {
            $name = test_input($_POST['name']);
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
        }

        // Phone number validation
        if(empty($_POST['phoneNo']))
        {
            $phoneNoErr = "Phone number is required";
        }
        else
        {
            $phoneNo = test_input($_POST['phoneNo']);
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $phoneNo)) {  
                $phoneNoErr = "Only numeric value is allowed.";  
            }
        }

        // Address (empty)validation
        if(empty($_POST['address']))
        {
            $addressErr = "Address is required";
        }
        else
        {
            $address = test_input($_POST['address']);
        }

        // echo $nameErr;
        // echo $phoneNoErr;
        if($nameErr == "" && $phoneNoErr == "" && $addressErr == "") {  
            // echo "<h2>Your Input:</h2>";  
            // echo "Name: " .$name;  
            // echo "<br>";  
            // echo "Mobile No: " .$phoneNo;  
            // echo "<br>";  
            // echo "Address: " .$address;  
            // echo "<br>";  
            // echo "<br>";
            
            // echo "NameErr: " .$nameErr;  
            // echo "<br>";  
            // echo "Mobile NoErr: " .$phoneNoErr;  
            // echo "<br>";  
            // echo "AddressErr: " .$addressErr;  
            // echo "<br>";  
            echo '<script> console.log("Succes"); </script>';
            echo '<script> alert("Inserted all fields")</script>';

            require '../../PHP/connect.php';
            // var_dump($conn);

            // When we have given auto-incrementing primary key id in table(meaning we are not taking it as input from user) then we must
            // provide the names of the columns we want to fill. Example: 
            // insert into tabl_name (column_name2, column_name3) values (value2, value3)
            // So our table contains 8 columns and we are providing only 7 values along with their specific column name. And by auto-incremented 
            // id all 8 fields of table are getting fulfilled.
            $sql = "INSERT INTO Supplier
            (supplier_name, supplier_phoneno, supplier_address)
            VALUES ('$name', '$phoneNo', '$address')";

            if ($conn->query($sql) === TRUE)
            {
                // echo nl2br("Values inserted in table successfully\n");
                echo '<script> alert("New supplier added successfully")</script>';
                echo '<script> console.log("Values inserted in Login table successfully"); </script>';
                echo '<script> window.location.href="./manageSupplier.php"</script>';
            }
            else
            {
                die("Failed to create table $table : " . $con->connect_error);
                echo '<script> alert("Error in adding employye please try again")</script>';
                echo '<script> console.log("Failed to insert values in table<br>ERROR : $conn->connect_error"); </script>';
            }
            // echo '<script> console.log("Code is running"); </script>';

            // echo '<script> window.location.href = "2nd.php"; </script>';
            
        } else {  
            // echo "<h2>Your Input:</h2>";  
            // echo "Name: " .$name;  
            // echo "<br>";  
            // echo "Mobile No: " .$phoneNo;  
            // echo "<br>";  
            // echo "Address: " .$address;  
            // echo "<br>";  
            // echo "<br>";
            
            // echo "NameErr: " .$nameErr;  
            // echo "<br>";  
            // echo "Mobile NoErr: " .$phoneNoErr;  
            // echo "<br>";  
            // echo "AddressErr: " .$addressErr;  
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
    <title>Add Supplier</title>
    <link rel="stylesheet" href="../../CSS/addEmp.css">
</head>

<body>
    <div class="Container">
        <!-- <form method="post" action="./addEmpProcess.php" auto_complete="off"> -->
        <form method="post" aciton="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">    
            <h2>Supplier registration</h2>
            <div class="FlexC">
                <div class="NameandInputC">
                    <span class="inputName">Name</span><br>
                    <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $nameErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Phone Number</span><br>
                    <input type="text" name="phoneNo" placeholder="Phone no" value="<?php echo $phoneNo;?>">
                    <span class="error"> <?php echo $phoneNoErr; ?> </span>  
                </div>
            </div>
            <div class="NameandInputCforAddress">
                <span class="inputName">Address</span><br>
                <input type="text" name="address" placeholder="Address" value="<?php echo $address;?>">
                <span class="error"> <?php echo $addressErr; ?> </span>  
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
