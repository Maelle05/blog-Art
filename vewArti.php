<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
      <title>All Article</title>
  </head>
  <body>
    <?php

    include "conect.php";

    ?>

    <section class="nav-bar">
        <h1 class="admin-title">Gavé Bleu Administration</h1>
    </section>

      <section class="admin-pannel-container">

    <h1>Tous les articles entrés dans la base de données</h1>

    <?php
              $Article = $bdPdo ->query('SELECT * FROM Article');

            ?>
            <table>
                <tr>
                    <th>Numéro Article</th>
                    <th>Date de Création</th>
                    <th>Titre de l'Article</th>
                    <th>Chapô</th>
                    <th>Accroche de l'Article</th>
                    <th>Paragraphe 1</th>
                    <th>Sous Titre 1</th>
                    <th>Paragraphe 2</th>
                    <th>Sous Titre 2</th>
                    <th>Paragraphe 3</th>
                    <th>Conclusion</th>
                    <th>Image par URL</th>
                    <th>Likes</th>
                    <th>Angle de l'Article </th>
                    <th>Thème de l'Article</th>
                    <th>Langue de L'Article</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php while($v = $Article->fetch()){ ?>
                    <tr>
                        <td><?= $v['NumArt']?></td>
                        <td><?= $v['DtCreA']?></td>
                        <td> <?= $v['LibTitrA']?></td>
                        <td> <?= $v['LibChapoA']?></td>
                        <td> <?= $v['LibAccrochA']?></td>
                        <td> <?= $v['Parag1A']?></td>
                        <td> <?= $v['LibSsTitr1']?></td>
                        <td> <?= $v['Parag2A']?></td>
                        <td> <?= $v['LibSsTitr2']?></td>
                        <td> <?= $v['Parag3A']?></td>
                        <td> <?= $v['LibConclA']?></td>
                        <td> <?=$v['UrlPhotA']?></td>
                        <td> <?= $v['Likes']?></td>
                        <td> <?= $v['NumAngl']?></td>
                        <td> <?= $v['NumThem']?></td>
                        <td> <?= $v['NumLang']?></td>
                        <td><a href="editArti.php? id=<?=$v['NumArt']?> "><img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/> </a></td>
                        <td><a href="DeleteArti.php?NumArt=<?php echo $v['NumArt'] ?>"><img src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
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
