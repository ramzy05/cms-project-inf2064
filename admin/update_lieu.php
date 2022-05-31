<?php require_once("./includes/head.php"); ?>
<?php require_once("./includes/functions.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <?php 

  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM activite WHERE id ='$id'";
    $result = mysqli_query($connexion, $q);
    $row = mysqli_fetch_assoc($result);
    $descript = $row['descriptions'];
    $titre = $row['titre'];
     
  }
   else if(!empty($_POST)){

  }else{
    echo("
    <script>
    window.setTimeout(function(){
      window.location.href = './all_activite.php'
    }, 500)
    </script>
    ");
    die;
  }
    ?>
    
  <main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Modification d'une activité</h3><br>

    <form action="update_activite.php" method="POST">
      <input type="text" value="<?php echo $id; ?>" name="id_activite" style="display: none;">
      <div class="form_inp">
        <label for="titre">Titre</label>
        <input type="text" name="titre" required value="<?php echo $titre; ?>">
      </div>
      <div class="form_inp">
        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="10" required><?php echo $descript; ?></textarea>
      </div>
          
      <div class="form_inp controls">
        <button  name="update_btn" id="update_btn">Valider</button>
      </div>
<?php 
  /* update */
  if(isset($_POST['update_btn'])){
    //echo $_POST['update_btn'];
    //add identity in db
    if(!empty($_POST['description'])){
      $description = $_POST['description'];
      $titre = $_POST['titre'];
      $id= $_POST['id_activite'];
      $q = " UPDATE activite SET titre='$titre' ,descriptions ='$description'
       WHERE id='$id'";
  
      $result = mysqli_query($connexion, $q);
        if($result){
          
          echo("
          <script>
          window.setTimeout(function(){
            window.location.href = './all_activite.php'
          }, 500)
          </script>
          ");
        die;
        }else {
        echo('echec');
        }
    }
   
  
    
    
       
  }
    
    
    
    ?>
    </form>
  
    
  </section>
    <!-- end content section -->

    <!-- footer sec -->
  
</main>



<script src= "./js/add_up_data.js"></script> 
<?php require_once("./includes/footer.php") ?>