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
          <?php 
            /* echo ("onjour"); */
              $q = " SELECT * FROM histoire LIMIT 1 ";
              $result = mysqli_query($connexion, $q);
              $row = mysqli_fetch_assoc($result)
            
            ?><br><br>
          <p class="hist_text"><svg class="quote_left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 224C84.72 224 74.05 226.3 64 229.9V224c0-35.3 28.7-64 64-64c17.67 0 32-14.33 32-32S145.7 96 128 96C57.42 96 0 153.4 0 224v96c0 53.02 42.98 96 96 96s96-42.98 96-96S149 224 96 224zM352 224c-11.28 0-21.95 2.305-32 5.879V224c0-35.3 28.7-64 64-64c17.67 0 32-14.33 32-32s-14.33-32-32-32c-70.58 0-128 57.42-128 128v96c0 53.02 42.98 96 96 96s96-42.98 96-96S405 224 352 224z"/></svg><?php echo $row['texte'] ?><svg class="quote_right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 96C42.98 96 0 138.1 0 192s42.98 96 96 96c11.28 0 21.95-2.305 32-5.879V288c0 35.3-28.7 64-64 64c-17.67 0-32 14.33-32 32s14.33 32 32 32c70.58 0 128-57.42 128-128V192C192 138.1 149 96 96 96zM448 192c0-53.02-42.98-96-96-96s-96 42.98-96 96s42.98 96 96 96c11.28 0 21.95-2.305 32-5.879V288c0 35.3-28.7 64-64 64c-17.67 0-32 14.33-32 32s14.33 32 32 32c70.58 0 128-57.42 128-128V192z"/></svg></p>
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
          <div class="missions">
          <?php 
            /* echo ("onjour"); */
              $q = " SELECT * FROM missions ";
              $result = mysqli_query($connexion, $q);
             
            
            ?>
            <div>
              <?php   
           
              while($row = mysqli_fetch_assoc($result)){
              
              ?>
              <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/></svg>  <?php echo $row['descriptions'] ?></p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end mission section -->
    
  </main>
  
  <!-- footer sec -->
  <?php require_once("./includes/footer.php"); ?>

  <!-- end footer sec -->
 