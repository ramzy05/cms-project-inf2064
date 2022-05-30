<!-- head -->
<?php require_once("./includes/head.php"); ?>

<!-- end head -->

  <!-- header section -->
  <?php require_once("./includes/header_other_page.php"); ?>
  
  <!-- end header section -->
  
  <!-- main  -->
  <main>
  <?php require_once("./includes/db.php"); ?>

    <!-- end main  -->

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
             
            
            ?><p>Notre conseil est constitué de <span id="nbr_membres"><?php 
             if($$num_row <10) echo '0'.$num_row ; 
              else echo $num_row ; 
             ?></h3></span> personnes</p>
        </div>
        <div class="members">
        <?php   
        while($row = mysqli_fetch_assoc($result)){
    
        ?>
          <div class="member">
            <div class="mem_pic_cont">
              <img src="./admin/db_files/personnel/imgs/<?php echo $row['photo']?>" alt="un employe" width="200">
            </div>
            <div class="member_info">
              <h3 class="member_name"><?php echo $row['nom'] ?></h3>
              <h4 class="member_post"><?php echo $row['fonction'] ?></h4>
              <h4 ><a href="#" class="see_more">Voir Plus...</a></h4>
            </div>
          </div>
          <?php  }?>
        </div>
      </div>
    </section>
    <!-- personnel section -->

   
    
  </main>
  
  <!-- footer sec -->
  <?php require_once("./includes/footer.php"); ?>

  <!-- end footer sec -->
 