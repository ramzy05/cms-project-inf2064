<?php require_once("./includes/head.php"); ?>
<?php require_once("./includes/functions.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM identite WHERE id ='$id'";
    $result = mysqli_query($connexion, $q);
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom_mairie'];
    $msg = $row['msg_welcome'];
    $old_logo = $row['logo'];
    
  }
    ?>
    
  <main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Modification des Informations</h3><br>

      <div class="content">
      <form action="" method="POST">
        <div class="form_inp">
          <label for="nom_mairie">Nom de la mairie</label>
          <input type="text" name="nom_mairie" value="<?php echo $nom; ?>">
        </div>
        <div class="form_inp">
          <label for="msg_welc">Message de bienvenue</label>
          <textarea name="msg_welc" id="" cols="30" rows="10"><?php echo $msg ; ?></textarea>
        </div>
        <div class="form_inp">
        <label >Logo actuel</label>
         <img src="../admin/db_imgs/<?php echo $old_logo; ?>" alt="" width="60" height="60">
        </div>
        <div class="form_inp">
          <label for="logo">Nouveau logo</label>
          <input type="file" name="logo">
        </div>
        <div class="form_inp controls">
          <button  name="update_btn" id="update_btn">Valider</button>
          <!-- <button type="submit">Annuler</button> -->
        </div>
        <?php 
        if($_POST) var_dump($_FILES); ?>
        
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
    $nom_mairie = $_POST['nom_mairie'];
   
    $welc_msg = $_POST['msg_welc'];
    $logo_name = '';
    $defaultquery = " UPDATE identite SET nom_mairie='$nom_mairie',
     msg_welcome='$welc_msg'
     WHERE id='$id'";
 
    $result = '';
   
    if(!empty($_FILES)){
       
      $logo_name = $_FILES['logo']['name'];
      $logo_ext = strtolower(strrchr($logo_name, '.'));
      $logo_tmp_name = $_FILES['logo']['tmp_name'];
      
      //$uniqueName = md5(uniqid(rand()), false);
      $uniqueName = random_filename(50, $directory = '/db_imgs', $extension = substr($logo_ext, 0));
      //$logo_name =$uniqueName . $logo_ext;
      $logo_name = $uniqueName ;
      
      $destination = "db_imgs/". $logo_name;
      
      
      $q = " UPDATE identite SET nom_mairie='$nom_mairie',
       msg_welcome='$welc_msg', logo='$logo_name'
       WHERE id='$id'";
      $result = mysqli_query($connexion, $q);
      if($result){
          $isSaveInFolder = move_uploaded_file($logo_tmp_name, $destination);
      }
          
    }else{
          $result = mysqli_query($connexion, $defaultquery);
    }
        if($result){
/* 
          echo("
        <script>
          window.setTimeout(function(){
            window.location.href = './settings.php'
          }, 500)
        </script>
        ");
        die; */
      }
       
  }
    
    
    
    ?>


<script src= "./js/add_up_info.js"></script> 
<?php require_once("./includes/footer.php") ?>