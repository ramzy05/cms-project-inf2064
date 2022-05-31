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
                  <a href="./admin/db_files/personnel/cv/<?php echo $row['cv'] ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"/></svg>  Télécharger le cv</a>
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
 