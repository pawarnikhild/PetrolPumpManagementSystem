<?php
    // Starting session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>2st page</title>
    <link rel="stylesheet" href="../CSS/2nd.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <h1>You want to manage:</h1>
    <form  method="post" action="#">
    <div class="buttonContainer">
        <button type="submit" class="button" name="btn">Employee</button><br>
        <button type="submit" class="button" name="btn1">Supplier</button><br>
        <button type="submit" class="button" name="btn2">Stock</button><br>
    </div>
    </form>
</body>
</html>
<?php 
    if (isset($_POST['btn']))
    {
        Navigate();
    }
    else if(isset($_POST['btn1']))
    {
        Navigate1();
    }
    else if (isset($_POST['btn2']))
    {
        Navigate2();
    }

    function Navigate()
    {  
        $_SESSION["entity"] = "Employee";
        //  print_r($_SESSION);
        //  var_dump($_SESSION);
        //  echo '<script> window.location.href="addC.php"; </script>';
        echo '<script> window.location.href="3rd.html"; </script>';
    }
    function Navigate1()
    {  
        $_SESSION["entity"] = "Supplier";
        echo '<script> window.location.href="3rd.html"; </script>';
    }
    function Navigate2()
    {  
        $_SESSION["entity"] = "Stock";
        echo '<script> window.location.href="3rd.html"; </script>';
    }
     
     

?>