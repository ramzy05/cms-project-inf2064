<?php require_once("./includes/head.php"); ?>

<!-- header section -->
<?php require_once("./includes/header.php"); ?>
<!-- end header section -->
<?php
if (isset($_SESSION['rang']) && $_SESSION['rang'] == 0) {

  header('Location: ../403.php');
}
?>

<main>
  <!-- sidebar section -->
  <?php require_once("./includes/sidebar.php"); ?>
  <!-- end sidebar section -->
  <section id="content">
    <h3 class="ad_title">Nouveau lieu touristique</h3><br>

    <div class="content">
      <form action="add_lieu.php" method="POST" enctype="multipart/form-data">
        <div class="form_inp">
          <label for="nom_lieu">Nom</label>
          <input type="text" name="nom_lieu" required>
        </div>
        <div class="form_inp">
          <label for="description">Description</label>
          <textarea name="description" id="" cols="30" rows="10" required></textarea>
        </div>
        <div class="form_inp">
          <label for="adresse">Adresse</label>
          <input type="text" name="adresse" required>
        </div>
        <div class="form_inp">
          <label for="contact">Contact</label>
          <input type="text" name="contact" required>
        </div>
        <div class="form_inp">
          <label for="photo">Photo</label>
          <input type="file" name="photo">
        </div>
        <div class="form_inp controls">
          <button name="add_btn" id="add_btn">Valider</button>
          <!-- <button type="cancel" name="cancel">Annuler</button> -->
        </div>

        <?php
        if (isset($_POST['add_btn'])) {
          //add identity in db
          if (!empty($_POST['nom_lieu']) && !empty($_POST['description'])) {

            $nom_lieu = $_POST['nom_lieu'];
            $contact = $_POST['contact'];
            $adresse = $_POST['adresse'];
            $description = $_POST['description'];



            if (!empty($_FILES['photo']["tmp_name"])) {


              $pic_name = $_FILES['photo']['name'];
              $pic_ext = strtolower(strrchr($pic_name, '.'));
              $pic_tmp_name = $_FILES['photo']['tmp_name'];

              //$uniqueName = md5(uniqid(rand()), false);
              $uniqueName = random_filename(50, $directory = '/db_files' . '/tourisme', $extension = substr($pic_ext, 0));
              //$logo_name =$uniqueName . $logo_ext;

              $pic_name = $uniqueName;

              $destination = "db_files/tourisme/" . $pic_name;


              $q = "INSERT INTO lieu_touristique (nom, descriptions, adresse, contact, photo) 
            VALUES('$nom_lieu', '$description', '$adresse', '$contact','$pic_name')";

              $isSaveInDb = mysqli_query($connexion, $q);
              echo 'cdsc';
              if ($isSaveInDb) {

                $isSaveInFolder = move_uploaded_file($pic_tmp_name, $destination);
              }
            } else {

              $qDefault = "INSERT INTO lieu_touristique (nom, descriptions, adresse, contact)
             VALUES('$nom_lieu','$description', '$adresse', '$contact')";
              $isSaveInDb = mysqli_query($connexion, $qDefault);
            }

            if ($isSaveInDb) {

              echo ("
            <script>
            window.setTimeout(function(){
              window.location.href = './all_lieu.php'
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

<script src="./js/add_up_info.js"></script>
<?php require_once("./includes/footer.php") ?>