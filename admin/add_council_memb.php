<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <main>
    <!-- sidebar section -->
    <?php require_once("./includes/sidebar.php"); ?>
    <!-- end sidebar section -->
    <section id="content">
      <h3 class="ad_title">Ajouter un membre au Conseil</h3><br>
      
      <div class="content">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form_inp">
            <label for="nom_memb">Noms</label>
            <input type="text" name="nom_memb" required>
          </div>
          <div class="form_inp">
            <label for="poste_memb">Poste</label>
            <input type="text" name="poste_memb" required>
          </div>
          <div class="form_inp">
            <label for="memb_pic">Poste</label>
            <input type="file" name="memb_pic" >
          </div>
          <div class="form_inp controls">
            <button  name="add_btn" id="add_btn">Valider</button>
            <!-- <button type="cancel" name="cancel">Annuler</button> -->
          </div>
         
          <?php 
    if(isset($_POST['add_btn']) ){
        //add identity in db
        if(!empty($_POST['nom_memb'] && !empty($_POST['poste_memb']))){

          $nom_memb = $_POST['nom_memb'];
          $poste_memb = $_POST['poste_memb'];
          
          
          
          
        

          $q = "INSERT INTO conseil (nom, poste) VALUES('$nom_memb','$poste_memb')";
          $result = mysqli_query($connexion, $q);
          echo("
          <script>
            window.setTimeout(function(){
              window.location.href = './all_council_memb.php'
            }, 500)
          </script>
          ");
          exit;
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