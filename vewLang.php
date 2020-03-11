  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>All Langues</title>
  </head>
  <body>
    <?php 
        
    include "conect.php";

    ?>

    <h1>Toutes les langues entré dans la base de donnes</h1>

    <?php  
              $Langues = $bdPdo ->query('SELECT * FROM langue');
            
            ?>
            <ul>
                <?php while($v = $Langues->fetch()){ ?>
                    <li><?= $v['NumPays']?> <a href="editLang.php? id=<?=$v['NumLang']?> "> Modifier </a> | <a href="DeleteLang.php?NumLang=<?php echo $v['NumLang'] ?>">Supprimer</a> </li>
                    
                <?php }?>
            <ul>

        <br />
                <?php 
                    if(isset($erreur)){ echo $erreur;}
                ?>

        <a href="index.php">Retour</a>
  </body>
  </html>     
       
       
      