<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  
  
  <main>
    <!-- sidebar section -->
    <?php require_once("./includes/sidebar.php"); ?>
    <!-- end sidebar section -->
    <?php 
      if(isset($_GET['id_perso'])){
        $id = $_GET['id_perso'];
        $nom = $_GET['nom_perso'];
      }
    ?>
    <section id="content">
      <h3 class="ad_title">Ajout d'une étape du parcours</h3><br>
      
      <div class="content">
        <form action="add_parcours.php" method="POST">
          <input type="text" value="<?php echo $id ?>" name="id_perso" style="display: none;">
          <input type="text" value="<?php echo $nom ?>" name="nom_perso" style="display: none;">
          <div class="form_inp">
            <label>Nom de l'employé: <?php echo $nom ?></label>
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

          $description= $_POST['description'];
          $id_perso= $_POST['id_perso'];
         
      
          
          
          $q = "INSERT INTO parcours (id_personnel, descriptions) VALUES('$id_perso','$description')";
          $isSaveInDb = mysqli_query($connexion, $q);
          
          
          if($isSaveInDb){
            
            echo("
            <script>
            window.setTimeout(function(){
              window.location.href = './parcours.php?id_perso=".$_POST['id_perso']."&nom_perso=".$_POST['nom_perso']."'
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