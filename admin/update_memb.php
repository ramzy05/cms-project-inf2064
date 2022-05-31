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
    $old_photo = $row['photo'];

  }
    
    
    
    ?>
    
  <main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Modification dans le conseil</h3><br>
      
      <div class="content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form_inp">
          <label for="nom">Nom</label>
          <input type="text" name="nom" value="<?php echo $nom; ?>" required>
        </div>
        <div class="form_inp">
          <label for="poste">Poste</label>
          <input type="text" name="poste" value="<?php echo $poste; ?>">
        </div>
        <div class="form_inp">
        <label >Photo actuel</label>
         <img src="./db_files/members_council/<?php echo $old_photo; ?>" alt="" width="90" height="90">
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
   
    $poste = $_POST['poste'];
    $photo_name = '';
    $defaultquery = " UPDATE conseil SET nom='$nom',
     poste='$poste'
     WHERE id='$id'";
 
    $result = '';
   
    if(!empty($_FILES['photo']["tmp_name"])){
       
      $photo_name = $_FILES['photo']['name'];
      $photo_ext = strtolower(strrchr($photo_name, '.'));
      $photo_tmp_name = $_FILES['photo']['tmp_name'];
      
      //$uniqueName = md5(uniqid(rand()), false);
      $uniqueName = random_filename(50, $directory = '/db_files'.'/members_council', $extension = substr($photo_ext, 0));
      //$photo_name =$uniqueName . $photo_ext;
      $photo_name = $uniqueName ;
      
      $destination = "db_files/members_council/". $photo_name;
      
      
      $q = " UPDATE conseil SET nom='$nom',
      poste='$poste', photo='$photo_name'
       WHERE id='$id'";
      $result = mysqli_query($connexion, $q);
      if($result){
         /* suppresions de l'ancien photo dans les fichiers */
        $tmpQuery = "SELECT * FROM conseil WHERE id ='$id'";
        $resultTmp =mysqli_query($connexion, $tmpQuery);
        $row_tmp = mysqli_fetch_assoc($resultTmp); 
        if(!empty($row_tmp['photo']) && $row_tmp['photo'] != "default_member.png"){

          $img = $row_tmp['photo'];
          $file_pointer = "./db_files/members_council/".$img;
          unlink($file_pointer);
        }
      /* end suppresions de l'ancien photo dans les fichiers */
          $isSaveInFolder = move_uploaded_file($photo_tmp_name, $destination);
      }
          
    }else{
          $result = mysqli_query($connexion, $defaultquery);
    }
        if($result){

          echo("
        <script>
          window.setTimeout(function(){
            window.location.href = './all_council_memb.php'
          }, 500)
        </script>
        ");
        die; 
      }else echo('echec');
       
  }
    
    
    
    ?>


<script src= "./js/add_up_data.js"></script> 
<?php require_once("./includes/footer.php") ?>