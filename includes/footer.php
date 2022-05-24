<footer>
  <a href="#hero"><img src="./img/logo.svg" class="logo" alt=""></a>
    <div class="site_info">
      Copyright&copy; <script type="text/javascript">
        document.write( new Date().getFullYear());

        </script>  Mairie de <span class="mairie_name">
           <?php require_once("./includes/db.php");
      
           $q = "SELECT * FROM identite ";
           $result = mysqli_query($connexion, $q);
           $row = mysqli_fetch_assoc($result);
           echo $row['nom_mairie'];
           /* while($row = mysqli_fetch_assoc($result)){
             break;
           } */
     ?>
          </span>
    </div>
</footer>
<script src="./js/general.js"></script>
</body>
</html>