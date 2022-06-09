<?php require_once("./includes/head.php"); ?>


<?php require_once("./includes/header.php"); ?>
<?php require_once("./function.php"); ?>


<main id="auth">
  <div class="container">
    <?php
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $cpassword = $_POST["password2"];
      $exists = false;
      $passwordErr = false;
      $success = false;


      $query = "SELECT * FROM users WHERE username='$username'";

      $result = mysqli_query($connexion, $query);

      $num = mysqli_num_rows($result);
      if ($num == 0) {
        if (($password != $cpassword)) {
          $passwordErr = true;
        } else {

          $hash = password_hash($password, PASSWORD_DEFAULT);

          $q = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash')";
          $result = mysqli_query($connexion, $q);

          if ($result) {
            $success = true;
          }
        }
      } else {
        $exists = true;
      }
    }
    ?>
    <form action="" method="POST">
      <div class="form_title">
        <h3>Créer un compte</h3>
      </div>
      <div class="message_alert">
        <?php if ($exists) {
          echo '<p style="color:rgb(241, 97, 97);">Username déjà pris</p>';
        } else if ($passwordErr) {

          echo '<p style="color:rgb(241, 97, 97);">les deux mots de passe sont différents</p>';
        } else if ($success) {
          echo '<p style="color:rgb(15, 170, 85);">Compte créé</p>';
          echo ("
          <script>
            setTimeout(()=>{

              window.location.href = './login.php';
          
            }, 1500);
          </script>
          ");
          die;
        }

        ?>
      </div>
      <div class="form_inputs">

        <div class="form_inp">
          <label for="username">username</label>
          <input type="text" name="username" required>
        </div>
        <div class="form_inp">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" required>
        </div>
        <div class="form_inp">
          <label for="password2">Confirmer</label>
          <input type="password" name="password2" required>
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