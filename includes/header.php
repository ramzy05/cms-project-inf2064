<?php 
            /* echo ("onjour"); */
  $q = "SELECT * FROM identite ";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
             
            
?>
<header>
    <nav>
    <div class="logo_cont">
      <a href="./index.php#hero"><img src="admin/db_files/logo/<?php echo $row['logo'] ; ?>" alt="" class = "logo"></a>
      <h4 class="nom_mairie"><?php echo $row['nom_mairie'] ;?></h4>
    </div>
      <!-- <div class="logo"><a href="#hero">M<span>a</span><span>i</span><span>r</span><span>i</span><span>e</span></a></div> -->
      <ul>
        <li class="links"><a href="./index.php#hero">Accueil</a></li>
        <div class="dropdown">
          <li class="dropbtn links_drop">Présentation</li>
          <div class="dropdown-content">
          <li><a href="./index.php#histoire">Notre Histoire</a></li>
          <li><a href="./index.php#conseil">Conseil Municipal</a></li>
          <li><a href="./index.php#personnel">Personnel</a></li>
          <li><a href="./index.php#mission">Missions</a></li>
          </div>
        </div>
        <li class="links"><a href="./projet.php">Projets</a></li>
        <li class="links"><a href="./activite.php">Activités</a></li>
        <div class="dropdown">
          <li class="dropbtn links_drop">Annonces</li>
          <div class="dropdown-content">
          <li><a href="./mariage.php">Mariages</a></li>
          <li><a href="./decret.php">Décret</a></li>
          <li><a href="./.marche_p.php">Marchés publiques</a></li>
          </div>
        </div>
        <li class="links"><a href="./annonce.php">Annonces</a></li>
        <li class="links"><a href="./tourisme.php">Tourisme</a></li>
        <li class="links"><a href="./publicite.php">Publicité</a></li>
      </ul>
      <button><a href="./admin/settings.php">Admin</a></button>
      <!--  <div id="sign_in_up_container">
        <button><a href="">Sign up</a></button>
      </div> -->
    </nav>
  </header>
