<?php
$insert = false;
if(isset($_POST['name'])){
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
    $roll = $_POST['roll'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $diagnosis = $_POST['diagnosis'];
    $allergy = $_POST['allergy'];
    $medicine = $_POST['medicine'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $sql = "INSERT INTO `hospital`.`medical_record` (`name`, `roll`, `age`, `phone`, `diagnosis`, `allergy`,`medicine`,`date1`,`date2`)
     VALUES ('$name', '$roll', '$age', '$phone', '$diagnosis','$allergy', '$medicine' ,'$date1','$date2');";
  
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
    <title>Student Health Record</title>
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
            font-size: 20px;
            width: 30%;
            margin: 11px 0px;
            padding: 7px;
        }

        form {
            
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btn {
            color: white;
            background: purple;
            padding: 8px 12px;
            font-size: 20px;
            border: 2px solid white;
            border-radius: 14px;
            cursor: pointer;
        }

        .bg {
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.6;
        }

        .submitMsg {
            color: green;
        }
    </style>


</head>

<body>
    


    <img class="bg"
        src=assets\401985.jpg
        alt="AIIMS">
    <div class="container">
        <h1>Student Health Record</h1><br/><br/>
            
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks Doctor for the entry</p>";
        }
    ?>
            <form action="medical_record.php" method="post">
                <input type="text" name="name" placeholder="Student's Name"><br />
                <input type="number" name="roll" placeholder="Student's Roll number"><br />


                <input type="number" name="age" placeholder="Student's Age"><br />

               
                
                <input type="phone" name="phone" placeholder="Enter your phone"><br />

                <input type="text" name="diagnosis" placeholder="Diagnosis found"><br />

                <input type="text" name="allergy" placeholder="Any Allergies"><br />

                <textarea name="medicine" placeholder="Please enter all the medicine prescribed"></textarea><br/><br/>

                <b> Medical leave from </b>
                
                <input type="date" name="date1">  <b>to</b>
                <input type="date" name="date2"><br/><br/>
                
                
                <button class="btn">Submit</button>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>