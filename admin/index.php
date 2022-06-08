<?php require_once("./includes/head.php"); ?>

<!-- header section -->
<?php require_once("./includes/header.php"); ?>
<!-- end header section -->

<!-- main  -->
<main>

  <!-- sidebar section -->
  <?php require_once("./includes/sidebar.php"); ?>
  <!-- end sidebar section -->

  <!-- content section -->


  <section id="content">
    <h3 class="ad_title">Thème du site</h3><br>

    <div class="content">
      <form action="" method="POST">
        <div class="form_inp">
          <label for="theme_def">Thème par défaut</label>
          <input type="radio" id="theme_def" name="theme" value="general.css" onchange="changeTheme(this);">
          <label for="theme_2">Thème 2</label>
          <input type="radio" id="theme_2" name="theme" value="general2.css" onchange="changeTheme(this);">
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