<?php require "config/config.php";?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Training</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="reg_form">
    <?php
        if(isset ($_POST['register']))
        {
            $first_name = trim(mysqli_real_escape_string($conn, string: $_POST['first_name']));
            $middle_name = trim(mysqli_real_escape_string($conn, string: $_POST['middle_name']));
            $last_name = trim(mysqli_real_escape_string($conn, string: $_POST['last_name']));
            $email = trim(mysqli_real_escape_string($conn, string: $_POST['email']));
            $phone_number = trim(mysqli_real_escape_string($conn, string: $_POST['phone_number']));
            $country = trim(mysqli_real_escape_string($conn, string: $_POST['country']));
            $state = trim(mysqli_real_escape_string($conn, string: $_POST['state']));
            $lga = trim(mysqli_real_escape_string($conn, string: $_POST['lga']));

            date_default_timezone_set("Africa/Lagos");
            $date = date('1 M d, Y');
            $time = date('h:ia');

            //Select
            $select = mysqli_query($conn, "SELECT * FROM students where email='$email'");
            if(mysqli_num_rows($select)>0)
            {
                echo "Already Registered!";
            }

            else{
                $insert = mysqli_query($conn, "INSERT INTO students (first_name,middle_name,last_name,email,phone_number,country,state,lga,date,time) VALUES('$first_name','$middle_name','$last_name','$email','$phone_number','$country','$state','$lga','$date','$time')");
                if($insert)
                {
                    echo "Successfully Registered";
                }
            }
           
        }


     ?>
    <h3>Students' Register</h3>
    <form action="#" method="POST">
  
        <Input type="text" class="input_control" name="first_name" placeholder="Enter First Name" required>
        <Input type="text" class="input_control" name="middle_name" placeholder="Enter Middle Name" required> 
        <Input type="text" class="input_control" name="last_name" placeholder="Enter Last Name" required>
        <Input type="email" class="input_control" name="email" placeholder="Enter Email" required>
        <Input type="Tel" class="input_control" name="phone_number" placeholder="Enter Phone Number" required>
        <Input type="text" class="input_control" name="country" placeholder="Enter Your Country" required>
        <Input type="text" class="input_control" name="state" placeholder="Enter Your State" required>
        <Input type="text" class="input_control" name="lga" placeholder="Enter Your LGA" required>   
        <button name="register">Register</button>   
</form>
</div>
</body>
</html>