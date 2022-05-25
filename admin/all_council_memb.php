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
      <h3 class="ad_title">Membres du Conseil Municipal</h3><br>

      <div class="content">
        <div class="left_sec">
          <table>
            <tr>
              <th>Noms</th>
              <th>Poste</th>
              <th>Action</th>
            </tr>
            <!-- let load information from db -->
            <?php 
            /* echo ("onjour"); */
              $q = "SELECT * FROM conseil ";
  
              $result = mysqli_query($connexion, $q);
              while($row = mysqli_fetch_assoc($result)){
              ?>
              <tr>
                <td>
                <?php echo $row['nom'] ?>
                </td>
                <td>
                <?php echo $row['poste'] ?>
                </td>
                <!-- edit and delete btn -->
                <td class="action up_del">
                <table>
                  
                  <tr>
                    <td class="action">
                    <?php
                    echo '<a href="./update_info.php?id='.$row['id'].'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg><span>Modifier</span></a>';
                    ?>
                    </td>
                    <td class="action">
                  <?php
                    echo '<a href="./add_council_memb.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg><span>Supprimer</span></a>';
                  ?>
  
                    </td>
                  </tr>
                  </table>
                </td>
                <!-- end edit and delete btn -->
              </tr>
            <?php }?>
            <tr>
                <td></td>
                <td></td>
                <td class="action">
                <?php echo '<a href="./add_council_memb.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"/></svg><span>Ajouter</span></a>';
                ?>
                </td>
                <!-- end edit and delete btn -->
              </tr>
            <!-- end let load information from db -->
          </table>
        </div>
      </div>
        
    </section>
    <!-- end content section -->

    <!-- footer sec -->

  </main>

 <?php require_once("./includes/footer.php") ?>

<!-- end footer sec -->