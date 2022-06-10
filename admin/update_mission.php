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
  $q = "SELECT * FROM missions WHERE id ='$id'";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
  $descript = $row['descriptions'];
} else if (!empty($_POST)) {
} else {
  echo ("
    <script>
    window.setTimeout(function(){
      window.location.href = './all_mission.php'
    }, 500)
    </script>
    ");
  die;
}
?>

<main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Modification d'une mission</h3><br>

    <form action="update_mission.php" method="POST">
      <input type="text" value="<?php echo $id; ?>" name="id_mission" style="display: none;">
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
          $id = $_POST['id_mission'];
          $q = " UPDATE missions SET descriptions ='$description'
       WHERE id='$id'";

          $result = mysqli_query($connexion, $q);
          if ($result) {

            echo ("
          <script>
          window.setTimeout(function(){
            window.location.href = './all_mission.php'
          }, 500)
          </script>
          ");
            die;
          } else {
            echo ('echec');
          }
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