<?php
session_start();

if (isset($_SESSION['username'])) {
  unset($_SESSION['username']);
}

if (isset($_SESSION['rang'])) {
  unset($_SESSION['rang']);
}


header("Location: ./");
die;
