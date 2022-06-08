<?php require_once("./includes/db.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mairie</title>
  <link rel="stylesheet" href="./css/fonts.css">
  <!-- <link rel="stylesheet" href="./css/personnel.css"> -->
  <?php
  $q = "SELECT theme FROM identite LIMIT 1";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
  extract($row);


  ?>
  <link rel="stylesheet" href="./css/<?php echo $theme ?>">
</head>

<body>