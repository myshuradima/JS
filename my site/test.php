<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $mysql = new mysqli('localhost','root','','cars-db');
    $result = $mysql->query("SELECT * FROM `cars`");
    while($row = $result->fetch_assoc()){
      //print_r($row);
      echo '<div class style="background-color: #4CAF50; margin: 8px 20px; ">';
      echo"Username:" . $row['name'] . "<br />";
      echo "Date:" . $row['model'] . "<br />";
      echo $row['type'];
      echo "</div>";
    }
    $mysql->close();
     ?>
  </body>
</html>
