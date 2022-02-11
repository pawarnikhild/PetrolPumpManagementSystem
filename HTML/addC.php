<?php
    // Starting session
    session_start();
    $Entity = $_SESSION["entity"];
?>
<html>

<head>
    <title>Add Constant</title>
    <link rel="stylesheet" href="../CSS/addEmp.css">
</head>

<body>
    <div class="Container">
        <?php echo "<h2>$Entity Registration</h2>"; ?>
        <!-- <h2>Employee registration</h2> -->
        <div class="FlexC">
            <div class="NameandInputC">
                <span class="inputName">Name</span><br>
                <input type="text" name="" placeholder="Name">
            </div>
            <div class="NameandInputC">
                <span class="inputName">Phone Number</span><br>
                <input type="text" placeholder="Phone no">
            </div>
            <div class="NameandInputC">
                <span class="inputName">Email Address<br>
                    <input type="email" placeholder="Email"><br>
            </div>
            <div class="NameandInputC">
                <span class="inputName">Birth Date</span><br>
                <input type="date" placeholder="Birth date">
            </div>
        </div>
        <div class="NameandInputCforAddress">
            <span class="inputName">Address</span><br>
            <input type="text" placeholder="Address">
        </div>
        <div class="FlexC">
            <div class="NameandInputC">
                <span class="inputName">Gender</span><br>
                <select name="gender" id="gender">
                    <option value="">--Please choose an option--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="NameandInputC">
                <span class="inputName">Type of Work</span><br>
                <select name="TypeofWork" id="TypeofWork">
                    <option value="">--Please choose an option--</option>
                    <option value="Receptionist(Non-Technical)">Receptionist(Non-Technical)</option>
                    <option value="Technical">Technical</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="buttonC">
        <button type="submit" value="Register">Register</button>
        </div>
        <!-- Gender:<br>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other -->



    </div>
</body>

</html>