  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
      <title>All Langues</title>
  </head>
  <body>
    <?php

    include "conect.php";

    ?>

<section class="nav-bar">
    <h1 class="admin-title">Gavé Bleu Administration</h1>
</section>



<section class="admin-pannel-container">

    <h1>Toutes les langues entrées dans la base de données</h1>

    <?php
              $Langues = $bdPdo ->query('SELECT * FROM langue');
            ?>
            <table>
                <tr>
                    <th>Numéro Langue</th>
                    <th>Libellé Court</th>
                    <th>Libellé Long</th>
                    <th>Nom Du Pays</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php while($v = $Langues->fetch()){ ?>
                    <tr>
                        <td><?= $v['NumLang']?></td>
                        <td><?= $v['Lib1Lang']?></td>
                        <td><?= $v['Lib2Lang']?></td>
                        <td><?= $v['NumPays']?></td>
                        <td><a href="editLang.php? id=<?=$v['NumLang']?> "> <img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/> </a></td>
                        <td><a href="DeleteLang.php?NumLang=<?php echo $v['NumLang'] ?>"><img src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
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
