<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exerciceSQL";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT first_name, last_name, email FROM `table 2` WHERE first_name='daniel'";
foreach  ($conn->query($sql) as $row) {
    print $row['first_name'] . "\t";
    print  $row['last_name'] . "\t";
    print $row['email'] . "\n";
       }
 }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
