<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
      <title>All Mot Clé</title>
  </head>
  <body>
    <?php   
    include "conect.php";
    ?>

    <h1>Tout les Mots clés entré dans la base de données</h1>

    <?php  
              $MotCle = $bdPdo ->query('SELECT * FROM MOTCLE');
            
            ?>
            <table>
                <tr>
                    <th>Numéro Mot Clé</th>
                    <th>Mot Clé</th>
                    <th>Langue</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php while($v = $MotCle->fetch()){ ?>
                    <tr>
                        <td><?= $v['NumMoCle']?></td>
                        <td><?= $v['LibMoCle']?></td>
                        <td> <?= $v['NumLang']?></td>
                        <td><a href="editMoCle.php? id=<?=$v['NumMoCle']?> "><img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/> </a></td>
                        <td><a href="DeleteMoCle.php?NumMoCle=<?php echo $v['NumMoCle'] ?>"><img src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
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