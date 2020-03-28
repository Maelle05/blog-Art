<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
      <title>All angles</title>
  </head>
  <body>
    <?php 
        
    include "conect.php";

    ?>

    <section class="nav-bar">
        <h1 class="admin-title">Gavé Bleu Administration</h1>
    </section>

      <section class="admin-pannel-container">

    <h1>Tous les Angles entrés dans la base de données</h1>

    <?php  
              $Angle = $bdPdo ->query('SELECT * FROM Angle');
            
            ?>
            <table>
                <tr>
                    <th>Numéro Angle</th>
                    <th>Angle</th>
                    <th>Langue</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php while($v = $Angle->fetch()){ ?>
                    <tr>
                        <td><?= $v['NumAngl']?></td>
                        <td><?= $v['LibAngl']?></td>
                        <td>
                        <?php $SelectLang2 = $bdPdo ->query('SELECT * FROM Langue WHERE NumLang = "'.$v['NumLang'].'"');
                        $L = $SelectLang2->fetch()?>
                        <?=$L['Lib2Lang']?>
                        </td>
                        <td><a href="editAngle.php? id=<?=$v['NumAngl']?> "><img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/> </a></td>
                        <td><a href="DeleteAngle.php?NumAngl=<?php echo $v['NumAngl'] ?>"><img src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
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