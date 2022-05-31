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
    <section id="histoire">
      <div class="histoire container pro_actu">
        <h2 class="title">Actualités</h2>
        <div class="hist_content pro_actu">
          <?php 
            /* echo ("onjour"); */
              $q = " SELECT * FROM activite ";
              $result = mysqli_query($connexion, $q);
              while($row = mysqli_fetch_assoc($result)){
            ?>
            <div  class="item_cont">
              <h2 class="sub_title"><?php echo $row['titre'] ?></h2>
              <p class="hist_text"><?php echo $row['descriptions'] ?></p>
            </div>
            <?php  }?>
        </div>
      </div>
      
    </section>
    <!-- end presentation section -->

    
    
  </main>
  
  <!-- footer sec -->
  <?php require_once("./includes/footer.php"); ?>

  <!-- end footer sec -->
 