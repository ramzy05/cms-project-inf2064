<?php require_once("./includes/head.php"); ?>
<?php require_once("./includes/functions.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <?php 

  if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM lieu_touristique WHERE id ='$id'";
    $result = mysqli_query($connexion, $q);
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $description = $row['descriptions'];
    $adresse = $row['adresse'];
    $contact = $row['contact'];
    $photo = $row['photo'];
     
  }
   else if(!empty($_POST)){

  }else{
    echo("
    <script>
    window.setTimeout(function(){
      window.location.href = './all_lieu.php'
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

    <form action="update_lieu.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="id"  value="<?php echo $id ?>" style="display: none;">
      <div class="form_inp">
        <label for="nom">Nom</label>
        <input type="text" name="nom" required value="<?php echo $nom; ?>">
      </div>
      <div class="form_inp">
        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="10" required><?php echo $description; ?></textarea>
      </div>
      <div class="form_inp">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" required value="<?php echo $adresse; ?>">
      </div>
      <div class="form_inp">
        <label for="contact">Contact</label>
        <input type="text" name="contact" required value="<?php echo $contact; ?>">
      </div>
      <div class="form_inp">
        <label >Photo actuel</label>
        <img src="./db_files/tourisme/<?php echo $photo; ?>" alt="" width="60" height="60">
      </div>
      <div class="form_inp">
        <label for="photo">Nouvelle Photo</label>
        <input type="file" name="photo" >
      </div>
       
      <div class="form_inp controls">
        <button  name="update_btn" id="update_btn">Valider</button>
        <!-- <button type="cancel" name="cancel">Annuler</button> -->
      </div>
<?php 
  /* update */
  if(isset($_POST['update_btn'])){
    //echo $_POST['update_btn'];
    //add identity in db
    if(!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['description'])){

      $id = $_POST['id'];
      $nom = $_POST['nom'];
      $description = $_POST['description'];
      $adresse = $_POST['adresse'];
      $contact = $_POST['contact'];
      

      $defaultquery = "UPDATE lieu_touristique SET nom = '$nom', descriptions = '$description',
       adresse = '$adresse', contact = '$contact' 
       WHERE id = '$id'";

      if(!empty($_FILES['photo']["tmp_name"])){
       
        $photo_name = $_FILES['photo']['name'];
        $photo_ext = strtolower(strrchr($photo_name, '.'));
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        
        //$uniqueName = md5(uniqid(rand()), false);
        $uniqueName = random_filename(50, $directory = '/db_files'.'/tourisme', $extension = substr($photo_ext, 0));
        //$photo_name =$uniqueName . $photo_ext;
        $photo_name = $uniqueName ;
        
        $destination = "db_files/tourisme/". $photo_name;
        
        
        $q = "UPDATE lieu_touristique SET nom = '$nom', descriptions = '$description',
        adresse = '$adresse', contact = '$contact', 
        photo = '$photo_name' WHERE id = '$id'";

        $result = mysqli_query($connexion, $q);

        if($result){
            $isSaveInFolder = move_uploaded_file($photo_tmp_name, $destination);
        }
            
      }else{
            $result = mysqli_query($connexion, $defaultquery);
      }
        if($result){
          
          echo("
          <script>
          window.setTimeout(function(){
            window.location.href = './all_lieu.php'
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