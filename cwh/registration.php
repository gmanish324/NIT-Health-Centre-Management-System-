<?php
$insert = false;
if(!empty(($_POST['name'])))
{
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $status=$_POST['status'];
    $sql = "INSERT INTO `hospital`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`,`date`,`status`)
     VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp(),'$date','$status');";
  
    if($con->query($sql) == true){
      
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Registration form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;

            
        }

        .container {
            max-width: 80%;
            padding: 34px;
            margin: auto;
        }

        .container h1 {
            text-align: center;
    border-radius: 10px 10px 0 0;
    margin: -10px -40px;
    padding: 15px;
    color: black;
    font-size: 90px;
        }

        p {
            text-align: center;
    border-radius: 10px 10px 0 0;
    margin: -10px -40px;
    padding: 15px;
    color: red;
    font-size: 25px;
    font-weight: bold;
        }

        input,
        textarea {

            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
            width: 50%;
            margin: 11px 0px;
            padding: 7px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btn {
            width: 250px;
            color: white;
            background: purple;
            padding: 8px 12px;
            font-size: 30px;
            border: 2px solid white;
            border-radius: 14px;
            cursor: pointer;
        }

        .bg {
            width: 130%;
            position: absolute;
            z-index: -1;
            opacity: 0.6;
        }

        .submitMsg {
            color: yellow;
            
        }
    </style>


</head>

<body>
    


    <img class="bg"
        src="assets\motherteresa.png"
        alt="AIIMS">
    <div class="container">
        <h1>Welcome to Patient Registration Portal</h1>
            <p>Enter your details and submit this form </p>
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. Please wait for doctor to confirm your appointment</p>";
        }
    ?>
            <form action="registration.php" method="post">
                <input type="text" name="name" placeholder="Enter your name"><br />
                <input type="text" name="age" placeholder="Enter your Age"><br />
                <input type="text" name="gender" placeholder="Enter your gender"><br />
                <input type="email" name="email" placeholder="Enter your email"><br />
                <input type="phone" name="phone" placeholder="Enter your phone"><br />
                <input type="date" name="date"><br />
                <textarea name="desc" cols="30" rows="10" placeholder="Enter your symptoms"></textarea>
    </br>
                <div><h2><b>Priority:</b></h2>
                <select name="status">
                    <option>Choose Priority</option>
                    <option   value="1">Low</option>
                    <option value="2">Normal</option>
                    <option value="3">Emergency</option>
                </select>
                
             </div></br></br>

                <button class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>