<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
      <title>All User</title>
  </head>
  <body>
    <?php

    include "conect.php";

    ?>


    <section class="nav-bar">
      <h1 class="admin-title">Gavé Bleu Administration</h1>
    </section>
    
    <section class="admin-pannel-container">


    <h1>Tous les utilisateurs entrés dans la base de données</h1>

    <?php
              $User = $bdPdo ->query('SELECT * FROM User');

            ?>
            <table>
                <tr>
                    <th>Nom D'Utilisateur</th>
                    <th>Code Secret</th>
                    <th>Nom</th>
                    <th>Prénon</th>
                    <th>Mail</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php while($v = $User->fetch()){ ?>
                    <tr>
                        <td><?= $v['Login']?></td>
                        <td><?= $v['Pass']?></td>
                        <td> <?= $v['LastName']?></td>
                        <td> <?= $v['FirstName']?></td>
                        <td><?= $v['EMail']?></td>
                        <td><a href="editUser.php? id=<?=$v['Login']?> "><img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/> </a></td>
                        <td><a href="DeleteUser.php?NumUser=<?php echo $v['Login'] ?>"><img src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
                    </tr>

                <?php }?>
            </table>

           <br />
                <?php
                    if(isset($erreur)){ echo $erreur;}
                ?>

        <a href="admin.php?mot_de_passe=MMI21">Retour</a>
      </section>
      <footer>
            <p class="copyright" style="text-align: center;">
                &copy; 2020 <span>Gavé Bleu</span>. All Rights Reserved.
                <br>
                <a href="https://icons8.com/icon/">Icons by Icons8</a>
              </p>

        </footer>
  </body>
  </html>
