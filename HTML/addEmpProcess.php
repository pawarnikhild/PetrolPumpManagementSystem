<!DOCTYPE html>
<head>
    <title>addEmplProcess.php</title>
</head>
<body>
    
</body>
</html>
<?php
    $dName = $_POST['name'];
    $dPhoneNo = $_POST['phoneNo'];
    $dTypeOfWork = $_POST['typeOfWork'];
    $dEmail = $_POST['email'];
    $dAddress = $_POST['address'];
    $dBirthDate = $_POST['birthDate'];
    $dGender = $_POST['gender'];
    // echo $dName;
    // echo $dPhoneNo;
    // echo $dtypeOfWork;
    // echo $dEmail;
    // echo $dAddress;
    // echo $dBirthDate;
    // echo $dGender;
    echo $dName;
    echo nl2br("$dName \n");
    echo nl2br("$dPhoneNo \n");
    echo nl2br("$dTypeOfWork \n");
    echo nl2br("$dEmail \n");
    echo nl2br("$dAddress \n");
    echo nl2br("$dBirthDate \n");
    echo nl2br("$dGender \n");
    // $dName =  $dPhoneNo = $dDesignation = $dEmail = $dAddress = $dBirthDate = $dGender = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // $dName = test_input($_POST['name']);
        // $dPhoneNo = test_input($_POST['phoneNo']);
        // $dTypeOfWork = test_input($_POST['typeOfWork']);
        // $dEmail = test_input($_POST['email']);
        // $dAddress = test_input($_POST['address']);
        // $dBirthDate = test_input($_POST['birthDate']);
        // $dGender = test_input($_POST['gender']);
        
        // //Saglyasathi ekach if loop madhe || saglya condition deta yetil ka baghne empty sathi fakt
        if(empty($_POST['name']))
        {
            $dNameErr = "Name is required";
        }
        else
        {
            $dName = test_input($_POST['name']);
        }

        if(($_POST['phoneNo']))
        {
            $dNameErr = "PhoneNo is required";
        }
        else
        {
            $dPhoneNo = test_input($_POST['phoneNo']);
        }

        if(empty($_POST['typeOfWork']))
        {
            $dNameErr = "TypeOfWork is required";
        }
        else
        {
            $dTypeOfWork = test_input($_POST['typeOfWork']);
        }

        if(empty($_POST['email']))
        {
            $dNameErr = "Email is required";
        }
        else
        {
            $dEmail = test_input($_POST['email']);
        }

        if(empty($_POST['Address']))
        {
            $dNameErr = "address is required";
        }
        else
        {
            $dAddress = test_input($_POST['address']);
        }

        if(empty($_POST['birthDate']))
        {
            $dNameErr = "BirthDate is required";
        }
        else
        {
            $dBirthDate = test_input($_POST['birthDate']);
        }

        if(empty($_POST['gender']))
        {
            $dNameErr = "Gender is required";
        }
        else
        {
            $dGender = test_input($_POST['gender']);
        }
        
    }
      
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    //   var_dump($dName);
    //   var_dump($dPhoneNo);
    //   var_dump($typeOfWork);
    //   var_dump($dEmail);
    //   var_dump($dAddress);
    //   var_dump($dBirthDate);
    //   var_dump($dGender);

    
    require '../PHP/connect.php';
    // var_dump($conn);

    // When we have given auto-incrementing primary key id in table(meaning we are not taking it as input from user) then we must
    // provide the names of the columns we want to fill. Example: 
    // insert into tabl_name (column_name2, column_name3) values (value2, value3)
    // So our table contains 8 columns and we are providing only 7 values along with their specific column name. And by auto-incremented 
    // id all 8 fields of table are getting fulfilled.
    $sql = "INSERT INTO Employee
    (employee_name, employee_phoneno, employee_typeofwork, employee_email, employee_address, employee_birthdate,
     employee_gender)
    VALUES ('$dName', '$dPhoneNo', '$dTypeOfWork', '$dEmail', '$dAddress', '$dBirthDate', '$dGender')
    
    ";

    if ($conn->query($sql) === TRUE)
    {
        echo nl2br("Values inserted in table successfully\n");
        echo '<script> console.log("Table Login created successfully"); </script>';
        // echo '<script> window.location.href="./manageEmployee.php"</script>';
    }
    else
    {
        die("Failed to create table $table : " . $con->connect_error);
        echo '<script> console.log("Failed to insert values in table<br>ERROR : $conn->connect_error"); </script>';
    }


    // if(isset($_POST['btn']))
    // {
    //     addEmployee();
    // }

    // function addEmployee()
    // {   
    //     // require '../PHP/connect.php';
    //     // echo $dName;
        
    //     // echo '<script> window.location.href="./addEmployee.php"</script>';
    // }
?>