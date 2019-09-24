<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RECHRCHE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exerciceSQL";

    try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       // set the PDO error mode to exception
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       ?>
       <!---Tableau--->
       <h1>RECHERCHE</h1>
       <table class="table table-bordered">
<tr>
	<th>Firstname</th>
	<th>name</th>
	<th>email</th>
	<th>Gender</th>
  <th>Code Etat</th>
</tr>
<?php
// rechercher le name palmer
//     $sql="SELECT first_name, last_name, email, gender FROM `table 2` WHERE last_name='palmer'";
//chercher les femmes
// $sql="SELECT first_name, last_name, email, gender FROM `table 2` WHERE gender='female'";
// echo "<tr>";
//         print "<td>".$row['first_name'] . "</td>";
//         print  "<td>".$row['last_name'] . "</td>";
//         print "<td>".$row['email'] . "</td>";
//         print "<td>".$row['gender'] . "</td>";
//         print "<td>".$row['country_code'] . "</td>";
//               echo "</tr>";
//            }
///-------------------------------
//recherche les etat dont le nom commence par note
// $sql="SELECT * FROM `table 2` WHERE country_code like 'N%'";
//compter country et order coissant
// $sql="SELECT country_code, count(country_code)  as NBRcountry FROM `table 2` group by country_code order by NBRcountry ASC";
//     foreach  ($conn->query($sql) as $row) {
// echo "<tr>";
//
//         print "<td>".$row['country_code'] . "</td>";
//         print "<td>".$row['NBRcountry'] . "</td>";
//               echo "</tr>";
//            }
//            //-----------------------------------
//
     $sql= INSERT INTO 'table 2' values(1001,'laila','provost','lprovost@codeur.online','femme');
     $conn->exec($sql);
   }
    catch(PDOException $e)
       {
       echo $sql . "<br>" . $e->getMessage();
       }

    $conn = null;
    ?>
  </table>
  </body>
</html>
