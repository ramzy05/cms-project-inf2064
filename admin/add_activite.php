<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  
  
  <main>
    <!-- sidebar section -->
    <?php require_once("./includes/sidebar.php"); ?>
    <!-- end sidebar section -->
   
    <section id="content">
      <h3 class="ad_title">Ajout d'une activité</h3><br>
      
      <div class="content">
        <form action="add_activite.php" method="POST">
          <div class="form_inp">
            <label for="titre">Titre</label>
            <input type="text" name="titre" required>
          </div>
          <div class="form_inp">
            <label for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="10" required></textarea>
          </div>
          <div class="form_inp controls">
            <button  name="add_btn" id="add_btn">Valider</button>
            <!-- <button type="cancel" name="cancel">Annuler</button> -->
          </div>
         
          <?php 

      if(isset($_POST['add_btn']) ){
       
        //add identity in db
        if(!empty($_POST['description'])){

          $titre= $_POST['titre'];
          $description= $_POST['description'];
         
         
      
          
          
          $q = "INSERT INTO activite (titre, descriptions) VALUES('$titre','$description')";
          $isSaveInDb = mysqli_query($connexion, $q);
          
          
          if($isSaveInDb){
            
            echo("
            <script>
            window.setTimeout(function(){
              window.location.href = './all_activite.php'
            }, 500)
            </script>
            ");
            die;
            
          }
        
        }

      /* echo("
        <script>
         
            window.location.href = './settings.php';
        </script>
        "); */
    }
 ?>
      </form>
    <!-- end content section -->
    </div>
    
  </section>

</main>

<script src= "./js/add_up_info.js"></script> 
<?php require_once("./includes/footer.php") ?>