<html>
    <head>
        <title>ImpSampleCodes</title>
        <link rel="stylesheet" href="../CSS/exp.css">
    </head>
    <body>
        <!-- <form method="post">
        <button type="submit" name="btn">GO</button> -->
    </form>
    </body>
</html>
<?php

//--------------------------------------------------------------------------------------------------------------------------------------
// Database connection code
//--------------------------------------------------------------------------------------------------------------------------------------
Echo "<h2>Code for Database Connection</h2>";
$host = "localhost";
$username = "root";
$password = "";
$db = "petrol";

// 1) MYSQLi object-oriented
Echo "<h3>MYSQLi object-oriented</h3>";
$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error)
{
    die("Failed to connect: " . $conn->connect_error);
}
else
{
    echo nl2br("Connected successfully!\n");
}
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    // echo "<TABLE border = '1'>";
    while($row = $result->fetch_assoc())
    {
        echo "id: " . $row["id"] . " Name: " . $row["name"] . " Password: " . $row["password"] . "<br>";
        
        // echo "<tr><td>" . "id" . $row["id"] . "</td>";
        // echo "<td>" . " - Name: " . $row["name"] . "</td>";
        // echo "<td>" . " Password: " . $row["password"] . "</td></tr>";
    }
    // echo "</TABLE>";
}
else
{
    echo nl2br("0 result\n");
}

if($conn->close()) 
    echo "Connection closed succesfully!";
else
    echo "Failed to close conncetion";


// 2) MYSQLi procedural
Echo "<h3>MYSQLi procedural</h3>";
$conn = mysqli_connect($host, $username, $password);
if(!$conn)
{
    die("Failed to connect: " . mysqli_connect_error());
}
else
{
    echo "Connected successfully!";
}


?>