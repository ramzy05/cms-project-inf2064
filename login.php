<?php require_once("./includes/head.php"); ?>




<?php require_once("./includes/header.php"); ?>
<main id="auth">
  <div class="container">
    <?php
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $userNotFound = false;
      $passwordErr = false;
      $success = false;


      $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
      $result = mysqli_query($connexion, $query);
      $row = mysqli_fetch_assoc($result);

      $num = mysqli_num_rows($result);
      if ($num != 0) {
        if (!password_verify($password, $row['password'])) {
          $passwordErr = true;
        } else {
          $success = true;
          /* let's save id session */
          $_SESSION['username'] = $row['username'];
          $_SESSION['rang'] = $row['rang'];
        }
      } else {
        $userNotFound = true;
      }
    }
    ?>
    <form action="" method="POST">
      <div class="form_title">
        <h3>Connexion</h3>
      </div>
      <div class="message_alert">
        <?php if ($userNotFound) {
          echo '<p style="color:rgb(241, 97, 97);">Username non reconnu</p>';
        } else if ($passwordErr) {

          echo '<p style="color:rgb(241, 97, 97);">Mot de passe incorrect</p>';
        } else if ($success) {
          echo '<p style="color:rgb(15, 170, 85);">connexion reussie</p>';
          echo ("
                <script>
                  setTimeout(()=>{
    
                    window.location.href = './';
                
                  }, 1500);
                </script>
          ");

          die;
        }

        ?>
      </div>
      <div class="form_inputs">

        <div class="form_inp">
          <label for="username">Username</label>
          <input type="text" name="username" required>
        </div>
        <div class="form_inp">
          <label for="password" required>Mot de passe</label>
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