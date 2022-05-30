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
      <a href="../index.php#hero"><img src="./db_files/logo/<?php echo $row['logo'] ;?>" alt="" class = "logo"></a>
      <h4 class="nom_mairie"><?php echo $row['nom_mairie'] ;?></h4>
    </div>
      <ul>
        <li class="links"><a href="../index.php">Voir le site</a></li>
       <!--  <li class="links"><a href="#histoire">Histoire</a></li>
        <li class="links"><a href="#conseil">Conseil Municipal</a></li>
        <li class="links"><a href="#mission">Missions</a></li> -->
      </ul>
        <button><a href="#">Sign In</a></button>
     <!--  <div id="sign_in_up_container">
        <button><a href="">Sign up</a></button>
      </div> -->
    </nav>
  </header>