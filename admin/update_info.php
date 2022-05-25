<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "SELECT * FROM identite WHERE id ='$id'";
    $result = mysqli_query($connexion, $q);
    $row = mysqli_fetch_assoc($result);
    $nom_mairie = $row['nom_mairie'];
    $welc_msg = $row['msg_welcome'];
    $logo = $row['logo'];
  }
    
  /* update */
  if(isset($_POST['update_btn'])){

    //add identity in db
    $nom_marie = $_POST['nom_mairie'];
    $welc_msg = $_POST['msg_welc'];
    $logo_name = '';
    $q = " UPDATE identite SET nom_mairie='$nom_mairie',
     msg_welcome='$welc_msg', logo='$logo'
     WHERE id='$id'";
    if(!empty($_FILES)){
      $logo_name = $_FILES['logo']['name'];
      $logo_ext = strtolower((strrchr($logo_name, '.')));
      var_dump($_FILES);
      $logo_tmp_name = $_FILES['logo']['tmp_name'];
      $dest = "./$logo_name";
      $q = " UPDATE identite SET nom_mairie='$nom_mairie',
       msg_welcome='$welc_msg', logo='$logo_name'
       WHERE id='$id'";

          if(in_array($logo_ext, array('.jpg', '.jpeg', '.png', '.webp'))){
            $save = move_uploaded_file($logo_tmp_name, $dest);
            echo("
        <script>
         alert("."'erreu '+".$save.")
        </script>");
            $result = mysqli_query($connexion, $q);
            if($result){
              //echo ('regist good');
            }else{
              
              //echo 'regist error';
            } 
          }else{
            //error
            //echo 'error format';
          }
         
        }else{
          $result = mysqli_query($connexion, $q);
        }
        echo("
        <script>
          window.setTimeout(function(){
            window.location.href = './settings.php'
          }, 500)
        </script>
        ");
        exit;
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
          <input type="text" name="msg_welc" value="<?php echo $nom_mairie; ?>">
        </div>
        <div class="form_inp">
          <label for="msg_welc">Message de bienvenue</label>
          <textarea name="msg_welc" id="" cols="30" rows="10"><?php echo $welc_msg; ?></textarea>
        </div>
        <div class="form_inp">
          <label for="logo">Votre logo</label>
          <input type="file" name="logo" value="<?php echo $logo; ?>">
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