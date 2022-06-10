<!-- head -->
<?php require_once("./includes/head.php"); ?>

<!-- end head -->

<!-- header section -->
<?php require_once("./includes/header.php"); ?>

<?php
if (!isset($_SESSION['username'])) {

  header('Location: ./');
}

?>



<main id="access_denied">

  <section>
    <div class="code">
      <p>403</p>
      <p>Accès refusé</p>
    </div>
  </section>

</main>

<?php require_once("./includes/footer.php"); ?>

<!-- end footer sec -->