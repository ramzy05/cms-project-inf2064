<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

    <?php 
       if(!empty($_GET['id_perso']) && !empty($_GET['perso_nom'])){
        $id = $_GET['id_perso'];
        $nom = $_GET['perso_nom'];
        
      }else{
        if(!empty($_POST)){

        }else{
          echo("
          <script>
          window.setTimeout(function(){
            window.location.href = './all_cv.php'
          }, 500)
          </script>
          ");
          die;
        }
      }
    
    ?>
  <main>
    <!-- sidebar section -->
    <?php require_once("./includes/sidebar.php"); ?>
    <!-- end sidebar section -->
    <section id="content">
      <h3 class="ad_title">Modifier le cv</h3><br>
      
      <h3 >Employé: <span style="color: #497E91; font-size:1.1rem"><?php echo $nom; ?></span></h3><br>
      <div class="content">
        <form action="add_cv.php" method="POST" enctype="multipart/form-data">
          <input name="perso_id"  value=" <?php echo $id; ?>" style="display: none;">
          <input name="perso_nom"  value=" <?php echo $nom; ?>" style="display: none;">
         
          <div class="form_inp">
            <label for="perso_cv">Nouveau cv</label>
            <input type="file" name="perso_cv" >
          </div>
          <div class="form_inp controls">
            <button  name="add_btn" id="add_btn">Valider</button>
            <!-- <button type="cancel" name="cancel">Annuler</button> -->
          </div>
         
          <?php 
      if(isset($_POST['add_btn'])){
        //add identity in db

        if(!empty($_POST['perso_id']) && !empty($_FILES['perso_cv']['tmp_name'])){
          
          $perso_id = $_POST['perso_id'];         
          
            $cv_name = $_FILES['perso_cv']['name'];
            $cv_ext = strtolower(strrchr($cv_name, '.'));
            $cv_tmp_name = $_FILES['perso_cv']['tmp_name'];
            
            //$uniqueName = md5(uniqid(rand()), false);
            $uniqueName = random_filename(50, $directory = '/db_files'.'/personnel'.'/cv', $extension = substr($cv_ext, 0));
            //$logo_name =$uniqueName . $logo_ext;
            
            $cv_name = $uniqueName ;
            
            $destination = "db_files/personnel/cv/". $cv_name;
            
            $q = " UPDATE personnel SET cv='$cv_name'
            WHERE id='$perso_id'";
 
            
            $isSaveInDb = mysqli_query($connexion, $q); 

            if($isSaveInDb){
          
              $isSaveInFolder = move_uploaded_file($cv_tmp_name, $destination);
              if($isSaveInFolder){
                echo("
                <script>
                window.setTimeout(function(){
                  window.location.href = './all_cv.php'
                }, 500)
                </script>
                ");
                die;
              }else echo('echec');
            }
     
            
      
          

      /* echo("
        <script>
         
            window.location.href = './settings.php';
        </script>
        "); */
      }
    }
   
 ?>
      </form>
    <!-- end content section -->
    </div>
    
  </section>

</main>

<script src= "./js/add_up_info.js"></script> 
<?php require_once("./includes/footer.php") ?>