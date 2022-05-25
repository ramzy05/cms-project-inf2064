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
        <form action="" method="POST" enctype="multipart/form-data">
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
            window.location.href = './settings.php'
          }, 5 00)
        </script>
        ");
        /* header('Location: http://localhost/mairie/admin'); */
        exit;
      }else{
        //add identity in db
        $nom_marie = $_POST['nom_mairie'];
        $welc_msg = $_POST['msg_welc'];
        $logo_name = '';
        $q = "INSERT INTO identite (nom_mairie, msg_welcome, logo) VALUES('$nom_marie','$welc_msg','$logo_name')";
        if(!empty($_FILES)){
          $logo_name = $_FILES['logo']['name'];
          $logo_ext = strtolower((strrchr($logo_name, '.')));
          var_dump($_FILES);
          $logo_tmp_name = $_FILES['logo']['tmp_name'];
          $dest = "./$logo_name";
          $q = "INSERT INTO identite (nom_mairie, msg_welcome, logo) VALUES('$nom_marie','$welc_msg','$logo_name')";

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