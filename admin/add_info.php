<?php require_once("./includes/head.php"); ?>

  <!-- header section -->
  <?php require_once("./includes/header.php"); ?>
  <!-- end header section -->
  

    <!-- sidebar section -->
    <?php require_once("./includes/db.php"); ?>
    <!-- end sidebar section -->
  <main>
  <?php require_once("./includes/sidebar.php"); ?>
  <section id="content">
    <h3 class="ad_title">Ajout des Informations</h3><br>

      <div class="content">
      <form action="">
        <div class="form_inp">
          <label for="nom_mairie">Nom de la Mairie</label>
          <input type="text" name="msg_welc">
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
          <button type="submit">Valider</button>
          <button type="submit">Annuler</button>
        </div>
      </form>
    </div>
    
  </section>
    <!-- end content section -->

    <!-- footer sec -->

</main>


<?php require_once("./includes/footer.php") ?>