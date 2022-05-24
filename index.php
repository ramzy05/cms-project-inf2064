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
      <div class="conseil container">
        <div class="conseil_descrip">
          <h2 class="title">Le Conseil Municipal</h2>
          <p>Notre conseil est constitué de <span id="nbr_membres">100</span> membres</p>
        </div>
        <div class="members">
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./img/memb_pic.webp" alt="un membre de la commune" width="300">
            </div>
            <div class="member_info">
              <h3 class="member_name">John Smith</h3>
              <h4 class="member_post">Président</h4>
            </div>
          </div>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./img/memb_pic.webp" alt="un membre de la commune" width="300">
            </div>
            <div class="member_info">
              <h3 class="member_name">John Smith</h3>
              <h4 class="member_post">Président</h4>
            </div>
          </div>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./img/memb_pic.webp" alt="un membre de la commune" width="300">
            </div>
            <div class="member_info">
              <h3 class="member_name">John Smith</h3>
              <h4 class="member_post">Président</h4>
            </div>
          </div>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./img/memb_pic.webp" alt="un membre de la commune" width="300">
            </div>
            <div class="member_info">
              <h3 class="member_name">John Smith</h3>
              <h4 class="member_post">Président</h4>
            </div>
          </div>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./img/memb_pic.webp" alt="un membre de la commune" width="300">
            </div>
            <div class="member_info">
              <h3 class="member_name">John Smith</h3>
              <h4 class="member_post">Président</h4>
            </div>
          </div>
          
         
        </div>
      </div>
    </section>
    <!-- conseil section -->

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
 