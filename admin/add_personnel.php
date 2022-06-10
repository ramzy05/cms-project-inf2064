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
    <h3 class="ad_title">Ajouter du Personnel</h3><br>

    <div class="content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form_inp">
          <label for="nom_perso">Nom</label>
          <input type="text" name="nom_perso" required>
        </div>
        <div class="form_inp">
          <label for="fonction_perso">fonction</label>
          <input type="text" name="fonction_perso" required>
        </div>
        <div class="form_inp">
          <label for="perso_pic">Photo</label>
          <input type="file" name="perso_pic">
        </div>
        <div class="form_inp controls">
          <button name="add_btn" id="add_btn">Valider</button>
          <!-- <button type="cancel" name="cancel">Annuler</button> -->
        </div>

        <?php
        if (isset($_POST['add_btn'])) {
          //add identity in db
          if (!empty($_POST['nom_perso']) && !empty($_POST['fonction_perso'])) {

            $nom_perso = $_POST['nom_perso'];
            $fonction_perso = $_POST['fonction_perso'];


            if (!empty($_FILES['perso_pic']["tmp_name"])) {


              $pic_name = $_FILES['perso_pic']['name'];
              $pic_ext = strtolower(strrchr($pic_name, '.'));
              $pic_tmp_name = $_FILES['perso_pic']['tmp_name'];

              //$uniqueName = md5(uniqid(rand()), false);
              $uniqueName = random_filename(50, $directory = '/db_files' . '/personnel' . 'imgs', $extension = substr($pic_ext, 0));
              //$logo_name =$uniqueName . $logo_ext;

              $pic_name = $uniqueName;

              $destination = "db_files/personnel/imgs/" . $pic_name;


              $q = "INSERT INTO personnel (nom, fonction, photo) VALUES('$nom_perso','$fonction_perso','$pic_name')";

              $isSaveInDb = mysqli_query($connexion, $q);

              if ($isSaveInDb) {

                $isSaveInFolder = move_uploaded_file($pic_tmp_name, $destination);
                if ($isSaveInFolder) {
                  echo ("
                <script>
                window.setTimeout(function(){
                  window.location.href = './all_personnel.php'
                }, 500)
                </script>
                ");
                  die;
                }
              } else echo ('echec');
            } else {

              $qDefault = "INSERT INTO personnel (nom, fonction) VALUES('$nom_perso','$fonction_memb')";
              $isSaveInDb = mysqli_query($connexion, $qDefault);

              if ($isSaveInDb) {

                echo ("
              <script>
              window.setTimeout(function(){
                window.location.href = './all_personnel.php'
              }, 500)
              </script>
              ");
                die;
              } else echo ('echec');
            }
          }
        }
        ?>
      </form>
      <!-- end content section -->
    </div>

  </section>

</main>

<script src="./js/add_up_info.js"></script>
<?php require_once("./includes/footer.php") ?>