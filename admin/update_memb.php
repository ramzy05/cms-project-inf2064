<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM conseil WHERE id ='$id'";
    $result = mysqli_query($connexion, $q);
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $poste = $row['poste'];

  }
    
  /* update */
  if(isset($_POST['update_btn'])){

    //add identity in db
    $nom_memb = $_POST['nom'];
    $poste_memb = $_POST['poste'];
    $q = " UPDATE conseil SET nom='$nom_memb',
     poste='$poste_memb'
     WHERE id='$id'";
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
    
    
    
    ?>
    
  <main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Modification d'un membre</h3><br>

      <div class="content">
      <form action="" method="POST">
        <div class="form_inp">
          <label for="nom">Noms</label>
          <input type="text" name="nom" value="<?php echo $nom; ?>">
        </div>
        <div class="form_inp">
          <label for="nom">Poste</label>
          <input type="text" name="poste" value="<?php echo $poste; ?>">
        </div>
        <div class="form_inp controls">
          <button  name="update_btn" id="update_btn">Valider</button>
          <!-- <button type="submit">Annuler</button> -->
        </div>
      </form>
    </div>
    
  </section>
    <!-- end content section -->

    <!-- footer sec -->
  
</main>

<script src= "./js/add_up_info.js"></script> 
<?php require_once("./includes/footer.php") ?>