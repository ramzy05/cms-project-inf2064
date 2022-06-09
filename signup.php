<?php require_once("./includes/head.php"); ?>


<?php require_once("./includes/header.php"); ?>


<main id="auth">
  <div class="container">
    <form action="">
      <div class="form_title">
        <h3>Créer un compte</h3>
      </div>
      <div class="form_inputs">

        <div class="form_inp">
          <label for="username">username</label>
          <input type="text" name="username">
        </div>
        <div class="form_inp">
          <label for="password">Mot de passe</label>
          <input type="password" name="password">
        </div>
        <div class="form_inp">
          <label for="password2">Confirmer</label>
          <input type="password" name="password2">
        </div>
      </div>
      <button type="submit">S'enregistrer</button>
      <div class="form_inp last_form_inp">
        <p>Vous avez déjà un compte? <a href="./login.php">Se connecter</a></p>
      </div>
    </form>
  </div>
</main>
<?php require_once("./includes/footer.php"); ?>
<!-- <script src="./js/general.js"></script>
</body>

</html> -->