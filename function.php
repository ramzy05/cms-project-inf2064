<?php
require_once('./includes/db.php');

function signup($username, $password)
{
  /* get id of user */
  $q = "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$password', '$password')";
  $result = mysqli_query($connexion, $q);
  if ($result) return true;

  return false;
}
