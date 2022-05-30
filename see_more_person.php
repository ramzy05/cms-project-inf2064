<!-- head -->
<?php require_once("./includes/head.php"); ?>

<!-- end head -->

  <!-- header section -->
  <?php require_once("./includes/header_other_page.php"); ?>
  
  <!-- end header section -->
  
  <!-- main  -->
  <main style="padding-top: 100px;">
  <?php require_once("./includes/db.php"); ?>
  
  <?php 
    if(!empty($_GET['id'])){
      $id = $_GET['id'];
    }else{
      echo("
      <script>
        window.setTimeout(function(){
          window.location.href = './personnel.php'
        }, 500)
      </script>
      ");
      die; 
    }
  ?>


    <!-- personnel section -->
    <section id="personnel">
      <div class="personnel card_person container">
        
          <?php 
            /* echo ("onjour"); */
              $q = " SELECT * FROM personnel WHERE id='$id'";
              $num_row = mysqli_num_rows(mysqli_query($connexion, $q));
              $result = mysqli_query($connexion, $q);
              $row = mysqli_fetch_assoc($result);?>
              <div class="worker">
              <div class="photo__side">
                <div class="photo__container" style="--background: url(../admin/db_files/personnel/imgs/<?php echo $row['photo']; ?>);">
                 
                </div>
                <h3 class="nom"><?php echo $row['nom']; ?></h3>
                <h3 class="function"><?php echo $row['fonction']; ?></h3>
              </div>
              <div class="parcours__side">
                <?php 
              /* echo ("onjour"); */
                  $q = " SELECT * FROM parcours WHERE id_personnel='$id' ";
                  $result2 = mysqli_query($connexion, $q);
                ?>
                <?php   

                while($row2 = mysqli_fetch_assoc($result2)){
                  
                ?>
                <div class="parcours__step">
                  <p><?php echo $row2['descriptions']; ?></p>
                </div>
                <?php
                }   
                if(!empty($row['cv'])){
    
                ?>
                <div class="download__cv">
                  <a href="./admin/db_files/personnel/cv/<?php echo $row['cv'] ?>" target="_blank">Télécharger le cv</a>
                </div>
                <?php } ?>
              </div>
            </div>
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
              <h4 ><a href="./see_more_person.php?id=<?php echo $row['id'] ?>" class="see_more">Voir Plus...</a></h4>
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
 