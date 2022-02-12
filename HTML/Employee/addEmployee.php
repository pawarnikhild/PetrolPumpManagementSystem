<?php
   
    $nameErr = $phoneNoErr = $typeOfWorkErr = $emailErr = $addressErr = $birthDateErr = $genderErr = "";
    $name =  $phoneNo = $typeOfWork = $email = $address = $birthDate = $gender = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $name = test_input($_POST['name']);
        $phoneNo = test_input($_POST['phoneNo']);
        $typeOfWork = test_input($_POST['typeOfWork']);
        $email = test_input($_POST['email']);
        $address = test_input($_POST['address']);
        $birthDate = test_input($_POST['birthDate']);
        $gender = test_input($_POST['gender']);
        
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

        // Type of work (empty)validation
        if(empty($_POST['typeOfWork']))
        {
            $typeOfWorkErr = "Type of Work is required";
        }
        else
        {
            $typeOfWork = test_input($_POST['typeOfWork']);
        }

        // Email validation
        if(empty($_POST['email']))
        {
            $emailErr = "Email is required";
        }
        else
        {
            $email = test_input($_POST['email']);
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
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

        // Birth date (empty)validation
        if(empty($_POST['birthDate']))
        {
            $birthDateErr = "Birth Date is required";
        }
        else
        {
            $birthDate = test_input($_POST['birthDate']);
            // $birthDate = date('d-m-Y', strtotime(($_POST['birthDate']))); // In sql db date is stored in 'YYYY-MM-DD' fromat we tried
            // to change format in this statement but it gives error, hence we are formatting date in manageEmployee.php file as 'DD-MM-YYYY'.
        }

        // Gender (empty)validation
        if(empty($_POST['gender']))
        {
            $genderErr = "Gender is required";
        }
        else
        {
            $gender = test_input($_POST['gender']);
        }
        // echo $nameErr;
        // echo $phoneNoErr;
        // echo $genderErr;
        if($nameErr == "" && $phoneNoErr == "" && $typeOfWorkErr == "" && $emailErr == "" && $addressErr == "" && $birthDateErr == "" && $genderErr == "") {  
            echo "Name: " .$name;  
            echo "<br>";  
            echo "Mobile No: " .$phoneNo;  
            echo "<br>";  
            echo "TypeOfWorkErr: " .$typeOfWork;
            echo "<br>";  
            echo "Email: " .$email;  
            echo "<br>";  
            echo "Address: " .$address;  
            echo "<br>";  
            echo "BirthDate: " .$birthDate;
            echo "<br>";  
            echo "Gender: " .$gender;
            echo "<br>";
            echo "<br>";
            
            echo "NameErr: " .$nameErr;  
            echo "<br>";  
            echo "Mobile NoErr: " .$phoneNoErr;  
            echo "<br>";  
            echo "TypeOfWorkErr: " .$typeOfWorkErr;
            echo "<br>";  
            echo "EmailErr: " .$emailErr;  
            echo "<br>";  
            echo "AddressErr: " .$addressErr;  
            echo "<br>";  
            echo "BirthDateErr: " .$birthDateErr;
            echo "<br>";  
            echo "GenderErr: " .$genderErr;  
            echo "<br>";
            echo '<script> console.log("Succes"); </script>';
            echo '<script> alert("Inserted all fields")</script>';

            require '../../PHP/connect.php';
            // var_dump($conn);

            // When we have given auto-incrementing primary key id in table(meaning we are not taking it as input from user) then we must
            // provide the names of the columns we want to fill. Example: 
            // insert into tabl_name (column_name2, column_name3) values (value2, value3)
            // So our table contains 8 columns and we are providing only 7 values along with their specific column name. And by auto-incremented 
            // id all 8 fields of table are getting fulfilled.
            $sql = "INSERT INTO Employee
            (employee_name, employee_phoneno, employee_typeofwork, employee_email, employee_address, employee_birthdate, employee_gender)
            VALUES ('$name', '$phoneNo', '$typeOfWork', '$email', '$address', '$birthDate', '$gender')";

            if ($conn->query($sql) === TRUE)
            {
                // echo nl2br("Values inserted in table successfully\n");
                echo '<script> alert("New employee added successfully")</script>';
                echo '<script> console.log("Values inserted in Login table successfully"); </script>';
                echo '<script> window.location.href="./manageEmployee.php"</script>';
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
    <title>Add Employee</title>
    <link rel="stylesheet" href="../../CSS/addEmp.css">
</head>

<body>
    <div class="Container">
        <!-- <form method="post" action="./addEmpProcess.php" auto_complete="off"> -->
        <form method="post" aciton="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">    
            <h2>Employee registration</h2>
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
                <div class="NameandInputC">
                    <span class="inputName">Type of Work</span><br>
                    <select name="typeOfWork" id="TypeofWork"  value="<?php echo $typeOfWorkErr;?>">
                        <option value="">--Please choose an option--</option>
                        <option value="Receptionist(Non-Technical)">Receptionist(Non-Technical)</option>
                        <option value="Technical">Technical</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="error"> <?php echo $typeOfWorkErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Email Address<br>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>"><br>
                        <span class="error"> <?php echo $emailErr; ?> </span>  
                </div>
                
            </div>
            <div class="NameandInputCforAddress">
                <span class="inputName">Address</span><br>
                <input type="text" name="address" placeholder="Address" value="<?php echo $address;?>">
                <span class="error"> <?php echo $addressErr; ?> </span>  
            </div>
            <div class="FlexC">
            <div class="NameandInputC">
                    <span class="inputName">Birth Date</span><br>
                    <input type="date" name="birthDate" placeholder="Birth date" value="<?php echo $birthDate;?>">
                    <span class="error"> <?php echo $birthDateErr; ?> </span>  
                </div>
                <div class="NameandInputC">
                    <span class="inputName">Gender</span><br>
                    <select name="gender" id="gender">
                        <option value="">--Please choose an option--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="error"> <?php echo $genderErr; ?> </span>  
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
