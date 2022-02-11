
<?php
    // This file is created to avoid repetation of database connection code.
    // function DBConnection()// For database connection
    // {
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "petrol4";
        // global $conn;
        $conn = new mysqli($host, $username, $password, $db);
        if (!$conn->connect_error)
        {
            // echo "Connected to MYSQL succesfully";
            // echo '<script> alert("Connection successful!"); </script>';
            echo '<script> console.log("connect.php : Connected successfully"); </script>';
            // echo $u;
            // if (isset($u, $p))
        } 
        else
        {
            echo "Failed to connect";
            echo '<script> alert("Failed to Connect!"); </script>';
            die("Failed to connect: " . $con->connect_error);
            
        }
        // echo "Funcion";
    // }
    // $a = "nikhil";
?>