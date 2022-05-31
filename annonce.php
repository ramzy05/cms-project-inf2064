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
    <section id="mariage">

      <div class="mariage container">
  
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
    <section id="decret">
      <div class="decret container">
        <div class="hist_content">
          <h2 class="title">Notre Histoire</h2>
          <?php 
            /* echo ("onjour"); */
              $q = " SELECT * FROM histoire LIMIT 1 ";
              $result = mysqli_query($connexion, $q);
              $row = mysqli_fetch_assoc($result)
            
            ?>
          <p class="hist_text"><?php echo $row['texte'] ?></p>
        </div>
      </div>
      
    </section>
    <!-- end presentation section -->

    <!-- conseil section -->
    <section id="marche_p">
      <div class="marche_p card_person container">
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
  </main>
  
  <!-- footer sec -->
  <?php require_once("./includes/footer.php"); ?>

  <!-- end footer sec -->
 