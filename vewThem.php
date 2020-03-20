<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
      <title>All Thématiques</title>
  </head>
  <body>
    <?php 
        
    include "conect.php";

    ?>

    <h1>Toutes les Thématiques entrés dans la base de données</h1>

    <?php  
              $thematique = $bdPdo ->query('SELECT * FROM `thematique`');
            
            ?>
            <table>
                <tr>
                    <th>Numéro Thématique</th>
                    <th>Thématique</th>
                    <th>Langue</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php while($v = $thematique->fetch()){ ?>
                    <tr>
                        <td><?= $v['NumThem']?></td>
                        <td><?= $v['LibThem']?></td>
                        <td> <?= $v['NumLang']?></td>
                        <td><a href="editThem.php? id=<?=$v['NumThem']?> "><img src="https://img.icons8.com/cute-clipart/64/000000/edit.png"/> </a></td>
                        <td><a href="DeleteThem.php?NumThem=<?php echo $v['NumThem'] ?>"><img src="https://img.icons8.com/cute-clipart/64/000000/delete-forever.png"/></a></td>
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