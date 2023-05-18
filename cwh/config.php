<?php 

 
    $server = "localhost";
    $username = "root";
    $password = "";

   
    $conn = mysqli_connect($server, $username, $password,"hospital");

   
    if(!$conn){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
   



?>