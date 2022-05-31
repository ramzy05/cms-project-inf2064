<!-- head -->
<?php require_once("./includes/head.php"); ?>

<!-- end head -->

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  
  <!-- end header section -->
  
  <!-- main  -->
  <main>
  <?php require_once("./includes/db.php"); ?>

   
    <!-- presentation section -->
    <section id="tourisme">
      <div class="tourisme container">
      <div class="tourisme_header">
        <h1 class="title">Lieux Touristiques</h1>
      </div>
        <div class="all_lieux">
        <?php 
              $q = " SELECT * FROM lieu_touristique ";
              $result = mysqli_query($connexion, $q);
              while($row = mysqli_fetch_assoc($result)){
            ?>
          <div class="lieu_item">
            <div class="lieu_info">
              <h1><?php echo $row['nom']; ?></h1>
              <h2><?php echo $row['adresse'].', '.$row['contact']; ?></h2>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
            </div>
            <div class="lieu_img">
              <img src="./admin/db_files/tourisme/<?php echo $row['photo']; ?>" alt="img">
            </div>
          </div>
          <?php   }?>
        <!-- <div class="lieu_item">
          <div class="lieu_info">
            <h1>Project 2</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="lieu_img">
            <img src="./img/img_1.png" alt="img">
          </div>
        </div>
        <div class="lieu_item">
          <div class="lieu_info">
            <h1>Project 3</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="lieu_img">
            <img src="./img/img_1.png" alt="img">
          </div>
        </div>
        <div class="lieu_item">
          <div class="lieu_info">
            <h1>Project 4</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="lieu_img">
            <img src="./img/img_1.png" alt="img">
          </div>
        </div>
        <div class="lieu_item">
          <div class="lieu_info">
            <h1>Project 5</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="lieu_img">
            <img src="./img/img_1.png" alt="img">
          </div>
        </div> -->
      </div>
          
          <?php 
            /* echo ("onjour"); */
             /*  $q = " SELECT * FROM projet ";
              $result = mysqli_query($connexion, $q);
              while($row = mysqli_fetch_assoc($result)){ */
            ?>
          <!--   <div  class="item_cont">
              <h2 class="sub_title"><?php /*  echo $row['titre']  */?></h2>
              <p class="hist_text"><?php /* echo $row['descriptions'] */ ?></p>
            </div> -->
            <?php  /* } */?>
        </div>
      </div>
      
    </section>
    <!-- end presentation section -->

    
    
  </main>
  
  <!-- footer sec -->
  <?php require_once("./includes/footer.php"); ?>

  <!-- end footer sec -->
 