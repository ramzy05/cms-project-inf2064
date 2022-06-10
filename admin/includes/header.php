<?php
/* echo ("onjour"); */
$q = "SELECT * FROM identite ";
$result = mysqli_query($connexion, $q);
$row = mysqli_fetch_assoc($result);

//
?>
<header>
  <nav>
    <div class="logo_cont">
      <a href="../index.php#hero"><img src="./db_files/logo/<?php echo $row['logo']; ?>" alt="" class="logo"></a>
      <h4 class="nom_mairie"><?php echo $row['nom_mairie']; ?></h4>
    </div>
    <ul>
      <li class="links"><a href="../index.php">Voir le site</a></li>
    </ul>
    <?php
    if (isset($_SESSION['username'])) {
      echo '<button><a href="../logout.php">Logout</a></button>';
    } else {

      echo '<button><a href="../login.php">Login</a></button>';
    }
    ?>
  </nav>
</header>