<?php 
            /* echo ("onjour"); */
  $q = "SELECT * FROM identite ";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
             
            //
?>
<header>
    <nav>
    <a href="../index.php#hero"><img src="./db_imgs/<?php echo $row['logo'] ;?>" alt="" class = "logo"></a>
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