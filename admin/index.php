<?php require_once("./includes/head.php"); ?>

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
<!-- main  -->
<main>

  <!-- sidebar section -->
  <?php require_once("./includes/sidebar.php"); ?>

  <!-- end sidebar section -->

  <!-- content section -->

  <?php
  /* echo ("onjour"); */
  $q = "SELECT theme FROM identite LIMIT 1";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
  extract($row);

  ?>
  <section id="content">
    <h3 class="ad_title">Thème du site</h3><br>

    <div class="content">
      <form action="" method="POST">
        <div class="form_inp">
          <label for="theme_def">Thème par défaut</label>
          <input type="radio" id="theme_def" name="theme" value="general.css" onchange="changeTheme(this);" <?php if ($theme == 'general.css') echo 'checked'; ?>>
          <label for="theme_2">Thème 2</label>
          <input type="radio" id="theme_2" name="theme" value="general2.css" onchange="changeTheme(this);" <?php if ($theme == 'general2.css') echo 'checked'; ?>>
        </div>
      </form>
    </div>
  </section>
  <!-- end content section -->

  <!-- footer sec -->

</main>
<script src="./js/change_theme.js"></script>
<?php require_once("./includes/footer.php") ?>

<!-- end footer sec -->