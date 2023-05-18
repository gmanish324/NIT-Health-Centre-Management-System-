<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
header("location: index.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>

<title>Welcome Doctor</title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>

<b id="logout"><a href="logout.php">Log Out</a></b>
<br/><br/>
<b id="welcome1" ><a href="medical_record.php">Student Medical profile</a></b>
</div>
<div>
<table>
<tr>

<th>S.no</th>
<th>Name</th>
<th>Age</th>
<th>phone</th>
<th>Appointment Date</th>
<th>Status</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "hospital");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT sno,name,age,phone,date FROM trip order by status desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo 
"<tr><td>" 
. $row["sno"]. 
"</td><td>" 
. $row["name"] . 
 "</td><td>"
 . $row["age"]. 
"</td><td>" 
. $row["phone"]. 
"</td><td>" 
. $row["date"]. 
"</td></tr>";
}


echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</div>
</body>
</html>