<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- <link rel="stylesheet" href="/CSS/login.css"> -->
    <!-- <link rel="stylesheet" href="C:/xampp/htdocs/petrol/CSS/login.css"> -->
    <link rel="stylesheet" href="../CSS/login.css">
</head>

<body>
    <!-- <h1>I am Nikhil</h1> -->
    <div class="loginBox">
        <img src="../Images/avtar.png" class="avatar">
        <h1>Login here</h1>
        <form action="#" method="post">
            <div clas="FaltuCenter">
                <p>Username</p>
                <input type="text" name="uname" placeholder="Enter username"><br>
                <p>Password</p>
                <input type="text" name="pname" placeholder="Enter password"><br>
                <!-- <input type="submit" name="" value="Login"> -->
                <button type="submit" name="btn">Login</button>
                <!-- <button type="submit" name="btn1" >Func</button> -->
                <!-- onclick="alrt()" -->
            </div>
            <a href="#">Lost your password</a><br>
            <a href="#">Don't have an account?</a>

        </form>
     </div>

</body>

</html>
<?php
// Nusta onclick="fLogin()" lihilyane function run hot nahi.
// This is code to run fucking function on button click which uses name attribute.
// Here post method is used so tag <form method="post"> is necessary.
// if (array_key_exists('btn', $_POST)) 
if (isset($_POST['btn'])) // also this can be used for the same
{
    fLogin();
    // func();
}
elseif(isset($_POST['btn1']))
{
    func();
    // fLogin();
}

function func()
{
    echo '<script> alert("Function func is called!") </script>'; 
}
function fLogin()
{
    // For database connection
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "petrol";

// For login authentication
    $u = "";
    $p = "";
    $u = $_POST['uname'];
    // $u = "nikhil";
    $p = $_POST['pname'];
    // $conn = new mysqli($host, $username, $password, $db);
    // if (!$conn->connect_error)
    // {
    //     // echo "Connection succesfully";
    //     // echo '<script> alert("Connection successful!"); </script>';
    //     echo '<script> console.log("Console : Connection successful!"); </script>';
    //     // echo $u;
    //     // if (isset($u, $p))
    // DBConnection();
    require '../PHP/connect.php';
        if(!empty($u) || !empty($p))
        {
            // echo "you have setted values";
            $sql = "select * from login where username = '" . $u . "' AND password = '" . $p . "' limit 1";
            // echo '<script> console.log('$u','$p'); </script>';
            // echo $sql;
            $res = $conn->query($sql);
            // print_r($res);
            if ($res->num_rows > 0) {
                echo '<script> console.log("Query ran successfully!"); </script>';
                // echo "You have logged in successfully!";
                // echo '<script> alert("You have logged in successfully!");
                // window.location.href = "2nd.php"; </script>';

                echo '<script> window.location.href = "2nd.php"; </script>';
                
                // exit();
            } else {
                echo '<script> alert("Invalid credentials! Please try again")</script>';
                // exit();
            }
        } else {
            echo '<script> alert("You have not entered input!")</script>';
        }
    // } 
    // else
    // {
    //     echo '<script> alert("Failed to Connect!"); </script>';
    //     die("Failed to connect: " . $con->connect_error);
        
    // }
}

// https://www.w3schools.com/php/php_form_validation.asp


function alrt()
{
    echo '<script> alert("Button pressed"); </script>';
}

?>
