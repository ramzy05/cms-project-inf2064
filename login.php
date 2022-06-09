<?php require_once("./includes/head.php"); ?>




<?php require_once("./includes/header.php"); ?>
<main id="auth">
  <div class="container">
    <form action="">
      <div class="form_title">
        <h3>Connexion</h3>
      </div>
      <div class="form_inputs">

        <div class="form_inp">
          <label for="username">Username</label>
          <input type="text" name="username">
        </div>
        <div class="form_inp">
          <label for="password">Mot de passe</label>
          <input type="password" name="password">
        </div>
      </div>
      <button type="submit">Se connecter</button>
      <div class="form_inp last_form_inp">
        <p>Vous n'avez pas de compte? <a href="./signup.php">S'enregistrer</a></p>
      </div>
    </form>
  </div>
</main>
<?php require_once("./includes/footer.php"); ?>
<!-- <script src="./js/general.js"></script>
</body>

</html> -->