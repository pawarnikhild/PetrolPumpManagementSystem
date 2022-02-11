<!DOCTYPE html>
<head>
    <title>createDB</title>
</head>
<body>
    
</body>
</html>
<?php

// This file is executed first in the whole project. This file creates all tables that are required for project.
// --------------------------------------------------------------------------------------------------------------------------------
// Creating MySQL connection
// --------------------------------------------------------------------------------------------------------------------------------    
    $host = "localhost";
    $username = "root";
    $password = "";
    
    $conn = new mysqli($host, $username, $password);
    if (!$conn->connect_error)
    {
        echo nl2br("Connected to MYSQL succesfully \n");
        echo '<script> console.log("Connected successfully"); </script>';
    }
    else
    {
        die("Failed to connect: $conn->connect_error");
        echo '<script> console.log("Failed to connect<br>ERROR : $conn->connect_error"); </script>';
    }

// --------------------------------------------------------------------------------------------------------------------------------
// Checking database exists else Creating database 
// --------------------------------------------------------------------------------------------------------------------------------
    $dbname = "petrol6";
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql)===TRUE)
    {
        echo nl2br("Database $dbname created successfully \n");
        echo '<script> console.log("Database created successfully"); </script>';
    }
    else
    {
        echo nl2br("Failed to create database $dbname: $con->connect_error \n");
        echo '<script> console.log("Failed to create database"); </script>';
        echo '<script> console.log("Failed to create database\nERROR : $conn->connect_error"); </script>';
        die("Failed to create database $dbname : " . $con->connect_error);
    }

// --------------------------------------------------------------------------------------------------------------------------------
// Checking tables exists else Creating tables
// --------------------------------------------------------------------------------------------------------------------------------
    // Function createTable is created to avoid repetation of code because we need this code every time when we create a new table.
    function createTable($conn, $table, $sql)
    {
        if ($conn->query($sql) === TRUE)
        {
            echo nl2br("Table $table created successfully \n");
            echo '<script> console.log("Table Login created successfully"); </script>';
        }
        else
        {
            die("Failed to create table $table : " . $con->connect_error);
            echo '<script> console.log("Failed to create database<br>ERROR : $conn->connect_error"); </script>';
        }
    }    

    $conn = new mysqli($host, $username, $password, $dbname);
    // In writing queries there are two ways(syntax).
    // 1) SQL Server / Oracle / MS Access:

    // Table 1: Login
    $table = "Login";
    $sql = "CREATE TABLE $table(
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(16) NOT NULL
        )";  
    createTable($conn, $table, $sql);
    // -----------------------------------------------
    // // 2) MySQL:
    // $table = "Login";
    // $sql = "CREATE TABLE $table(
    //     id INT AUTO_INCREMENT,
    //     username VARCHAR(30) NOT NULL,
    //     password VARCHAR(16) NOT NULL,
    //     PRIMARY KEY(id)
    //     )";
    // createTable($conn, $table, $sql);
    // // We are using first(SQL Server) syntax method in whole project.

    // Table 2: Employee
    $table = "Employee";
    $sql = "CREATE TABLE Employee(
        employee_id INT AUTO_INCREMENT PRIMARY KEY,
        employee_name VARCHAR(30) NOT NULL,
        employee_phoneno VARCHAR(13) NOT NULL,
        employee_typeofwork VARCHAR(30),
        employee_email VARCHAR(50),
        employee_address VARCHAR(300),
        employee_birthdate DATE,
        employee_gender VARCHAR(6)
        )";
    createTable($conn, $table, $sql);

    // Table 3: Supplier
    $table = "Supplier";
    $sql = "CREATE TABLE Supplier(
        supplier_id INT AUTO_INCREMENT PRIMARY KEY,
        supplier_name VARCHAR(30) NOT NULL,
        supplier_phoneno VARCHAR(13) NOT NULL,
        supplier_address VARCHAR(300)
        )";
    createTable($conn, $table, $sql);
    
    // Table 4: Stock
    $table = "Stock";
    $sql = "CREATE TABLE Stock(
        stock_id INT AUTO_INCREMENT PRIMARY KEY,
        stock_date DATE NOT NULL,
        stock_name VARCHAR(30) NOT NULL,
        stock_quantity INT NOT NULL
        )";
    createTable($conn, $table, $sql);

    // Table 5: Import(Supplier_Stock) // This table is created because supplier and stock tables have many to many relationship
    $table = "Import";
    $sql = "CREATE TABLE Import(
        import_id INT PRIMARY KEY,
        import_date DATE,
        supplier_id INT,
        stock_id INT,
        FOREIGN KEY (supplier_id) REFERENCES Supplier(supplier_id),
        FOREIGN KEY (stock_id) REFERENCES Stock(stock_id),

        -- supplier_id INT FOREIGN KEY REFERENCES Supplier(supplier_id),
        -- stock_id INT FOREIGN KEY REFERENCES Stock(stock_id),
        import_price_per_liter INT NOT NULL,
        import_quantity INT NOT NULL,
        impoert_price INT NOT NULL
        
        )";
    createTable($conn, $table, $sql);

    // Table 6: Export(Supplier_Stock) 
    // This table should have stock_id in it. So we think Stock table has one to many relationship with Export table.
    $table = "Export";
    $sql = "CREATE TABLE Export(
        export_id INT PRIMARY KEY,
        export_date DATE,
        stock_id INT,
        FOREIGN KEY (stock_id) REFERENCES Stock(stock_id),
        -- stock_id INT FOREIGN kEY REFERENCES Stock(stock_id),
        export_price_per_liter INT NOT NULL,
        export_quantity INT NOT NULL,
        export_price INT NOT NULL
        )";
    createTable($conn, $table, $sql);

// --------------------------------------------------------------------------------------------------------------------------------
// Inserting default values in Login table
// --------------------------------------------------------------------------------------------------------------------------------
    $sql = "INSERT INTO Login (id, username, password) VALUES (1, 'nik', 123)";
    if ($conn->query($sql) === TRUE)
    {
        echo nl2br("Default values inserted in table Login successfully \t \t \t Id: 1 Username: nik Password: 123 \n");
        echo '<script> console.log("Default values inserted successfully \n Id: 1 Username: nik Password: 123"); </script>';
    }
    else
    {
        die("Failed to insert default values in table Login : " . $con->connect_error);
        echo '<script> console.log("Failed to insert default values \nERROR : $conn->connect_error"); </script>';
    }

// --------------------------------------------------------------------------------------------------------------------------------
// Inserting default values in Stock table
// --------------------------------------------------------------------------------------------------------------------------------
$date = date('Y/m/d');
echo $date;

$sql = "INSERT INTO Stock (stock_id, stock_date, stock_name, stock_quantity) VALUES 
(1, '$date', 'Petrol', 0),
(2, '$date', 'Disel', 0),
(3, '$date', 'CNG', 0),
(4, '$date', 'Other', 0)";
if ($conn->query($sql) === TRUE)
{
    echo nl2br("\nDefault values inserted in table Stock successfully\n");
    echo '<script> console.log("Default values inserted successfully"); </script>';
}
else
{
    die("Failed to insert default values in table Stock : " . $con->connect_error);
    echo '<script> console.log("Failed to insert default values \nERROR : $conn->connect_error"); </script>';
}

?>
