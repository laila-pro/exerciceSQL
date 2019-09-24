<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RECHRCHE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <h4>Lancez votre recherche</h4>
      <form class="" action="formulaire.php" method="get">
        <select name="choix">
            <option value="nom-palmer">Afficher tous les gens dont le nom est palmer</option>
            <option value="femmes">Afficher toutes les femmes</option>
            <option value="etat-N">Tous les états dont la lettre commence par N</option>
            <option value="google">Tous les emails qui contiennent google</option>
            <option value="repartition-par-etat">Répartition par Etat et le nombre d’enregistrement par état (croissant)</option>
          </select>
        <input type="submit" value="Submit">
      </form>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "exerciceSQL";
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo $_GET['choix'];
        if (isset($_GET['choix'])) {
          switch ($_GET['choix']){
            case "nom-palmer":
            // rechercher le name palmer
              $sql="SELECT first_name, last_name, email, gender, country_code FROM `table 2` WHERE last_name='palmer'";
            break;
            case "femmes":
            //chercher les femmes
              $sql="SELECT * FROM `table 2` WHERE gender='Female'";
            break;
            case "etat-N":
              $sql="SELECT * FROM `table 2` WHERE country_code like 'N%'";
            break;
            case "google":
              $sql="SELECT * FROM `table 2` WHERE email like '%google%'";
            break;
            case "repartition-par-etat":
              $sql="SELECT country_code, count(country_code)  as NBRcountry FROM `table 2` group by country_code order by NBRcountry ASC";

            break;
          }

          switch ($_GET['choix']){
            case "repartition-par-etat":
              echo '<table class="table">
              <thead>
              <tr>
              <th>COUNTRY</th>
              <th>NBR</th>
              </tr>
              </thead>';
              foreach  ($conn->query($sql) as $row) {
                print "<td>".$row['country_code'] . "</td>";
                print "<td>".$row['NBRcountry'] . "</td>";
                echo "</tr>";
              }
            break;
            default:
            echo '<table class="table">
            <tr>
            <th>Firstname</th>
            <th>name</th>
            <th>email</th>
            <th>Gender</th>
            <th>Code Etat</th>
            </tr>';

              foreach  ($conn->query($sql) as $row) {
                print "<td>".$row['first_name'] . "</td>";
                print  "<td>".$row['last_name'] . "</td>";
                print "<td>".$row['email'] . "</td>";
                print "<td>".$row['gender'] . "</td>";
                print "<td>".$row['country_code'] . "</td>";
                 echo "</tr>";
              }
            break;
          }
        }

      }
      catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
        $conn = null;

      }//$_REQUEST permet de stocker la valeur de mon choix
?>

  </body>
  </html>
