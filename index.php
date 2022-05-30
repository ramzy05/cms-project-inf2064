<!-- head -->
<?php require_once("./includes/head.php"); ?>

<!-- end head -->

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  
  <!-- end header section -->
  
  <!-- main  -->
  <main>
  <?php require_once("./includes/db.php"); ?>

    <!-- end main  -->
    <!-- hero section -->
    <section id="hero">

      <div class="hero container">
  
        <h1 class="hero_title"> <?php 
          /* echo ("onjour"); */
          $q = "SELECT * FROM identite ";
          $result = mysqli_query($connexion, $q);
          $row = mysqli_fetch_assoc($result);
          echo $row['msg_welcome'];
          
    ?></h1><!-- <h1 class="hero_title"><span class="mairie_name"> Yaoundé</span></h1> -->
      </div>
    </section>
    <!-- end hero section -->
  
    <!-- presentation section -->
    <section id="histoire">
      <div class="histoire container">
        <div class="hist_content">
          <h2 class="title">Notre Histoire</h2>
          <p class="hist_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore minima ratione temporibus magni voluptatum placeat maxime, qui earum nulla doloribus neque culpa harum deserunt mollitia necessitatibus ex explicabo, iste eos. neque culpa harum deserunt mollitia necessitatibus ex explicabo, iste eos. neque culpa harum deserunt mollitia necessitatibus ex explicabo, iste eos.</p>
        </div>
      </div>
      
    </section>
    <!-- end presentation section -->

    <!-- conseil section -->
    <section id="conseil">
      <div class="conseil card_person container">
        <div class="conseil_descrip">
          <h2 class="title">Le Conseil Municipal</h2>
          <?php 
            /* echo ("onjour"); */
              $q = "SELECT * FROM conseil ";
              $num_row = mysqli_num_rows(mysqli_query($connexion, $q));
              $result = mysqli_query($connexion, $q);
             
            
            ?><p>Notre conseil est constitué de <span id="nbr_membres"><?php 
             if($num_row <10) echo '0'.$num_row ; 
              else echo $num_row ; 
             ?></h3></span> membres</p>
        </div>
        <div class="members">
        <?php  
        $number = 1; 
        while($row = mysqli_fetch_assoc($result)){
          if($number > 3) break;
        ?>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./admin/db_files/members_council/<?php echo $row['photo']?>" alt="un membre de la commune" width="200" height="200">
            </div>
            <div class="member_info">
              <h3 class="member_name"><?php echo $row['nom'] ?></h3>
              <h4 class="member_post"><?php echo $row['poste'] ?></h4>
            </div>
          </div>
          <?php   $number++; }?>
        </div>
        <a href="./conseil.php" class="see_more all_perso">Tout le conseil</a>
      </div>
    </section>
    <!-- conseil section -->

    <!-- personnel section -->
    <section id="personnel">
      <div class="personnel card_person container">
        <div class="conseil_descrip">
          <h2 class="title">Le Personnel</h2>
          <?php 
            /* echo ("onjour"); */
              $q = " SELECT * FROM personnel ";
              $num_row = mysqli_num_rows(mysqli_query($connexion, $q));
              $result = mysqli_query($connexion, $q);
             
            
            ?><p>Notre personnel est constitué de <span id="nbr_membres"><?php 
             if($$num_row <10) echo '0'.$num_row ; 
              else echo $num_row ; 
             ?></h3></span> employés</p>
        </div>
        <div class="members">
        <?php   
        $number = 1;
        while($row = mysqli_fetch_assoc($result)){
          if($number > 3) break;
        ?>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./admin/db_files/personnel/imgs/<?php echo $row['photo']?>" alt="un employe" width="200" height="200">
            </div>
            <div class="member_info">
              <h3 class="member_name"><?php echo $row['nom'] ?></h3>
              <h4 class="member_post"><?php echo $row['fonction'] ?></h4>
              <h4 ><a href="./see_more_person.php?id=<?php echo $row['id'] ?>" class="see_more">Voir Plus...</a></h4>
            </div>
          </div>
          <?php $number++;   }?>
        </div>
        <a href="./personnel.php" class="see_more all_perso">Tout le personnel</a>
      </div>
    </section>
    <!-- personnel section -->

    <!-- mission section -->
    <section id="mission">
      <div class="mission container">
        <div class="missions_cont">
          <h2 class="title">Notre Mission</h2>
          <p class="missions_intro">Nous sommes compétents dans les domaines suivants :</p>
          <div class="missons">
            <ul>
              <li>la création, l'entretien, la gestion des espaces verts, parcs et jardins communautaires ;</li>
              <li>la gestion des lacs et rivières d'intérêt communautaire ;</li>
              <li>le nettoiement des voies et espaces publics communautaires ;</li>
              <li>le suivi et le contrôle de la gestion des déchets industriels ;</li>
              <li>le nettoiement des voies et espaces publics communautaires ;</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- end mission section -->
    
  </main>
  
  <!-- footer sec -->
  <?php require_once("./includes/footer.php"); ?>

  <!-- end footer sec -->
 