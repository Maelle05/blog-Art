<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>All User</title>
  </head>
  <body>
    <?php 
        
    include "conect.php";

    ?>

    <h1>Tout les Users entré dans la base de données</h1>

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

        <a href="admin.php">Retour</a>
  </body>
  </html>     