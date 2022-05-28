<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

  <main>
    <!-- sidebar section -->
    <?php require_once("./includes/sidebar.php"); ?>
    <!-- end sidebar section -->
    <section id="content">
      <h3 class="ad_title">Ajout des Informations</h3><br>
      
      <div class="content">
        <form action="add_info.php" method="POST" enctype="multipart/form-data">
          <div class="form_inp">
            <label for="nom_mairie">Nom de la Mairie</label>
            <input type="text" name="nom_mairie" required>
          </div>
          <div class="form_inp">
            <label for="msg_welc">Message de bienvenue</label>
            <textarea name="msg_welc" id="" cols="30" rows="10"></textarea>
          </div>
          <div class="form_inp">
            <label for="logo">Votre logo</label>
            <input type="file" name="logo">
          </div>
          <div class="form_inp controls">
            <button  name="add_btn" id="add_btn">Valider</button>
            <!-- <button type="cancel" name="cancel">Annuler</button> -->
          </div>
         
          <?php 
    if(isset($_POST['add_btn']) ){
      $q = "SELECT * FROM identite";
      $result = mysqli_query($connexion, $q);
      $num_row = mysqli_num_rows($result);
      if($num_row){
        //the identity of site already exists
        echo("
        <script>
          window.setTimeout(function(){
            window.location.href = './update_info.php'
          }, 500)
        </script>
        ");
        die;
      }else{
          //add identity in db
          $nom_marie = $_POST['nom_mairie'];
          $welc_msg = $_POST['msg_welc'];
  
          if(!empty($_FILES)){
            
            
            $logo_name = $_FILES['logo']['name'];
            $logo_ext = strtolower(strrchr($logo_name, '.'));
            $logo_tmp_name = $_FILES['logo']['tmp_name'];
            
            //$uniqueName = md5(uniqid(rand()), false);
            $uniqueName = random_filename(50, $directory = '/db_imgs', $extension = substr($logo_ext, 0));
            //$logo_name =$uniqueName . $logo_ext;
            $logo_name =$uniqueName ;
            
            $destination = "db_imgs/". $logo_name;
            
            $isSaveInFolder = move_uploaded_file($logo_tmp_name, $destination);
            
            $q = "INSERT INTO identite (nom_mairie, msg_welcome, logo) VALUES('$nom_marie','$welc_msg','$logo_name')";
            
            $isSaveInDb = mysqli_query($connexion, $q);

            if($isSaveInDb){
          
              $isSaveInFolder = move_uploaded_file($logo_tmp_name, $destination);
            }
     
            
          }else{

            $qDefault = "INSERT INTO identite (nom_mairie, msg_welcome) VALUES('$nom_marie','$welc_msg')";
            $isSaveInDb = mysqli_query($connexion, $qDefault);
          }
          
          if($isSaveInDb){
            
            echo("
            <script>
            window.setTimeout(function(){
              window.location.href = './settings.php'
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