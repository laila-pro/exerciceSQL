<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exerciceSQL";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('sylvain', 'Espina', 's.espinamagdalina@codeur.online')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('boris', 'debos', 's.espinamagdalina@codeur.online')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Eddy', 'Morlon', 's.espinamagdalina@codeur.online')");

    // commit the transaction
    $conn->commit();
    echo "New enregistrement created successfully";
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
