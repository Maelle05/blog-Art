<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

            $Login ="";
            $Pass ="";
            $LastName ="";
            $FirstName ="";
            $EMail ="";
           
    // Fonction de controle des saisies du formulaire
    function ctrlSaisies($saisie) {

      // Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
      $saisie = trim($saisie);
      // Suppression des antislashs d'une chaîne
      $saisie = stripslashes($saisie);
      // Conversion des caractères spéciaux en entités HTML 
      $saisie = htmlentities($saisie);

      return $saisie;
    }




        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
			
              
				if (((isset($_POST['Login'])) AND !empty($_POST['Login']))
                AND ((isset($_POST['Pass'])) AND !empty($_POST['Pass']))
                AND ((isset($_POST['LastName'])) AND !empty($_POST['LastName']))
                AND ((isset($_POST['FirstName'])) AND !empty($_POST['FirstName']))
                AND ((isset($_POST['EMail'])) AND !empty($_POST['EMail']))) {
                    $erreur = false;
                 				
                    $Login = ctrlSaisies($_POST['Login']);
                    $Pass = ctrlSaisies($_POST['Pass']);
                    $LastName = ctrlSaisies($_POST['LastName']);
                    $FirstName = ctrlSaisies($_POST['FirstName']);
                    $EMail = ctrlSaisies($_POST['EMail']);
                   

                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO User (Login, Pass, LastName, FirstName, EMail) VALUES (:Login, :Pass, :LastName, :FirstName, :EMail)");
                            $stmt->bindParam(':Login', $Login);
                            $stmt->bindParam(':Pass', $Pass);
                            $stmt->bindParam(':LastName', $LastName);
                            $stmt->bindParam(':FirstName', $FirstName);
                            $stmt->bindParam(':EMail', $EMail);
        
                            $stmt->execute();
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }                
            }
    
   
        
?>


    <h2>Ajoutez un Utilisateur</h2>
    <form action="addUser.php" name="formUser" method="post">
        <label for="">Login</label>
        <input type="text" name="Login" maxlength="25" id="" ><br>

        <label for="">Password</label>
        <input type="text" name="Pass" maxlength="25" id="" ><br>

        <label for="">Nom</label>
        <input type="text" name="LastName" maxlength="25" id="" ><br>

        <label for="">Prénom</label>
        <input type="text" name="FirstName" maxlength="25" id="" ><br>

        <label for="">Mail</label>
        <input type="mail" name="EMail" id="" ><br>

        

        <input type="submit" name="Submit" value="Validé">
    </form>
    <a href="admin.php?mot_de_passe=MMI21">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>