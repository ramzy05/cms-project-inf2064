<?php require_once("./includes/db.php");

if (isset($_POST['theme'])) {

  $q = "SELECT id FROM identite LIMIT 1";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
  extract($row); //ici on a recuperer l'id des infos du site

  //changeons le theme
  $theme = $_POST['theme'];
  $updateQuery = " UPDATE identite SET theme = '$theme'
  WHERE id='$id'";
  $resultUpdate = mysqli_query($connexion, $updateQuery);
  $ouputMessage = $resultUpdate ? 'ok' : 'failed';
  echo $ouputMessage;
}
