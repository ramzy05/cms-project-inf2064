<?php 
            /* echo ("onjour"); */
  $q = "SELECT * FROM identite ";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
             
            
?>
<footer>
    <div class="logo_cont">
      <a href="#hero"><img src="admin/db_files/logo/<?php echo $row['logo'] ; ?>" alt="" class = "logo"></a>
    </div>
    <div class="site_info">
      Copyright&copy; <script type="text/javascript">
        document.write( new Date().getFullYear());

        </script>  Mairie de <span class="mairie_name">
           <?php 
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