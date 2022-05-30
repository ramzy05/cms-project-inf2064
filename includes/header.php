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
        <li class="links"><a href="#hero">Accueil</a></li>
        <div class="dropdown">
          <li class="dropbtn links_drop">Présentation</li>
          <div class="dropdown-content">
          <li><a href="#histoire">Notre Histoire</a></li>
          <li><a href="#conseil">Conseil Municipal</a></li>
          <li><a href="#personnel">Personnel</a></li>
          <li><a href="#mission">Missions</a></li>
          </div>
        </div>
        <li class="links"><a href="#histoire">Projets</a></li>
        <li class="links"><a href="#conseil">Activités</a></li>
        <li class="links"><a href="#mission">Annonces</a></li>
        <li class="links"><a href="./personnel.php">Tourisme</a></li>
        <li class="links"><a href="./personnel.php">Publicité</a></li>
      </ul>
      <button><a href="./admin/settings.php">Admin</a></button>
      <!--  <div id="sign_in_up_container">
        <button><a href="">Sign up</a></button>
      </div> -->
    </nav>
  </header>
