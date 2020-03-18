<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>All angles</title>
  </head>
  <body>
    <?php 
        
    include "conect.php";

    ?>

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
                        <td> <?= $v['NumLang']?></td>
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
  </body>
  </html>