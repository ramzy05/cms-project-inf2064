<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM personnel WHERE id ='$id'";
    $result = mysqli_query($connexion, $q);
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $fonction = $row['fonction'];
    $old_photo = $row['photo'];

  }
    
    
    
    ?>
    
  <main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Modification Personnel</h3><br>

      <div class="content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form_inp">
          <label for="nom">Nom</label>
          <input type="text" name="nom" value="<?php echo $nom; ?>" required>
        </div>
        <div class="form_inp">
          <label for="fonction">Fonction</label>
          <input type="text" name="fonction" value="<?php echo $fonction; ?>">
        </div>
        <div class="form_inp">
        <label >Photo actuel</label>
         <img src="../admin/db_files/personnel/imgs/<?php echo $old_photo; ?>" alt="" width="90" height="90">
        </div>
        <div class="form_inp">
          <label for="photo">Nouvelle Photo</label>
          <input type="file" name="photo">
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

<?php 
  /* update */
  if(isset($_POST['update_btn'])){
    //echo $_POST['update_btn'];
    //add identity in db
    $nom = $_POST['nom'];
   
    $fonction = $_POST['fonction'];
    $photo_name = '';
    $defaultquery = " UPDATE personnel SET nom='$nom',
     fonction='$fonction'
     WHERE id='$id'";
 
    $result = '';
   
    if(!empty($_FILES['photo']["tmp_name"])){
       
      $photo_name = $_FILES['photo']['name'];
      $photo_ext = strtolower(strrchr($photo_name, '.'));
      $photo_tmp_name = $_FILES['photo']['tmp_name'];
      
      //$uniqueName = md5(uniqid(rand()), false);
      $uniqueName = random_filename(50, $directory = '/db_files'.'/personnel'.'/imgs', $extension = substr($photo_ext, 0));
      //$photo_name =$uniqueName . $photo_ext;
      $photo_name = $uniqueName ;
      
      $destination = "db_files/personnel/imgs/". $photo_name;
      
      
      $q = " UPDATE personnel SET nom='$nom',
      fonction='$fonction', photo='$photo_name'
       WHERE id='$id'";
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
            window.location.href = './all_personnel.php'
          }, 500)
        </script>
        ");
        die; 
      }else echo('echec');
       
  }
    
    
    
    ?>


<script src= "./js/add_up_data.js"></script> 
<?php require_once("./includes/footer.php") ?>