<?php require_once("./includes/head.php"); ?>
<?php require_once("./includes/functions.php"); ?>

<!-- header section -->
<?php require_once("./includes/header.php"); ?>
<!-- end header section -->

<?php
if (isset($_SESSION['rang']) && $_SESSION['rang'] == 0) {

  header('Location: ../403.php');
  die;
} else if (!isset($_SESSION['username'])) {

  header('Location: ../login.php');
  die;
}
?>
<?php

if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $nom = $_GET['nom_perso'];
  $id_perso = $_GET['id_perso'];
  $descript = $_GET['description'];
} else if (!empty($_POST)) {
} else {
  echo ("
    <script>
    window.setTimeout(function(){
      window.location.href = './all_personnel.php'
    }, 500)
    </script>
    ");
  die;
}
?>
dolorce("./includes/sidebar.php"); ?>
<section id="content">
  <h3 class="ad_title">Modification d'étape d'un parcours</h3><br>

  <form action="update_parcours.php" method="POST">
    <input type="text" value="<?php echo $id; ?>" name="id_parcours" style="display: none;">
    <input type="text" value="<?php echo $id_perso; ?>" name="id_perso" style="display: none;">
    <input type="text" value="<?php echo $nom; ?>" name="nom_perso" style="display: none;">
    <div class="form_inp">
      <label>Nom de l'employé: <?php echo $nom; ?></label>
    </div>
    <div class="form_inp">
      <label for="description">Description</label>
      <textarea name="description" id="" cols="30" rows="10" required><?php echo $descript; ?></textarea>
    </div>

    <div class="form_inp controls">
      <button name="update_btn" id="update_btn">Valider</button>
    </div>
    <?php
    /* update */
    if (isset($_POST['update_btn'])) {
      //echo $_POST['update_btn'];
      //add identity in db
      if (!empty($_POST['description'])) {
        $description = $_POST['description'];
        $id = $_POST['id_parcours'];
        $q = " UPDATE parcours SET descriptions='$description'
       WHERE id='$id'";

        $result = mysqli_query($connexion, $q);
        if ($result) {

          echo ("
          <script>
          window.setTimeout(function(){
            window.location.href = './parcours.php?id_perso=" . $_POST['id_perso'] . "&nom_perso=" . $_POST['nom_perso'] . "'
          }, 500)
          </script>
          ");
          die;
        } else echo ('echec');
      }
    }



    ?>
  </form>


</section>
<!-- end content section -->

<!-- footer sec -->

</main>



<script src="./js/add_up_data.js"></script>
<?php require_once("./includes/footer.php") ?>