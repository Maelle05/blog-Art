<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit User </title>
</head>
<body>
    <?php

       include 'conect.php';

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $get_id= htmlspecialchars($_GET['id']);

            $User = $bdPdo->prepare('SELECT * FROM user WHERE login ="'.$get_id.'"');
            $User->execute(
                array($get_id)
            );

            if($User->rowCount() == 1){
                $User =$User->fetch();
                $Login = $User['Login'];
                $Pass = $User['Pass'];
                $FirstName = $User['FirstName'];
                $LastName = $User['LastName'];
                $EMail = $User['EMail'];
            }else{
                die('Ce User n\'existe pas !');
            }
        }else{
            echo('<a href="vewUser.php">Retour</a>');
            die('ERREUR');
        }

        if($_SERVER["REQUEST_METHOD"] == "GET"){

            $Submit = isset($_GET['Submit']) ? $_GET['Submit'] : '';


				if (((isset($_GET['Login'])) AND !empty($_GET['Login']))
                AND ((isset($_GET['Pass'])) AND !empty($_GET['Pass']))
                AND ((isset($_GET['LastName'])) AND !empty($_GET['LastName']))
                AND ((isset($_GET['FirstName'])) AND !empty($_GET['FirstName']))
                AND ((isset($_GET['EMail'])) AND !empty($_GET['EMail']))) {
                    $erreur = false;

                    $Login = htmlspecialchars($_GET['Login']);
                    $Pass = htmlspecialchars($_GET['Pass']);
                    $LastName = htmlspecialchars($_GET['LastName']);
                    $FirstName = htmlspecialchars($_GET['FirstName']);
                    $EMail = htmlspecialchars($_GET['EMail']);


                    try{
                        //Début transaction
                        $bdPdo->beginTransaction();
                        // preparation de la requete Preparee dans une chane de caractere
                        // instruction incert Preparation
                        $query = $bdPdo->prepare('UPDATE user SET Login = :Login, Pass = :Pass, LastName = :LastName, FirstName = :FirstName, EMail = :EMail WHERE  Login ="'.$get_id.'"');
                        // Execution du prepare lancement
                        $query->execute(
                            array(
                                ':Login'=> $Login,
                                ':Pass'=> $Pass,
                                ':LastName'=> $LastName,
                                ':FirstName'=> $FirstName,
                                ':EMail'=> $EMail
                            )
                        );

                        // commite de la transaction (confirm insert)
                        $bdPdo->commit();

                    }catch( PDOException $e ){
                        //rollBack  (annule Insert)
                    $bdPdo->rollBack();
                    }

                    //liberer le curseur
                    $query->closeCursor();

                    // affichage des messsages d'erreur et/ou d'envoie
                    echo"Requête <b>update</b> a remplacé les valeurs de" . $Login . "!";
                    echo"<br />";


                }
            }


                include 'disconect.php';

        ?>

            <h2>Modifier l'Utilisateur <?= $Login?> </h2>
            <form action="editUser.php" name="formUser" method="Get">
        <label for="">Login</label>
        <input type="hidden" name="id" value="<?= $Login ?>">

        <input type="text" name="Login" maxlength="25" id="" value="<?= $Login ?>" ><br>

        <label for="">Password</label>
        <input type="text" name="Pass" maxlength="25" id="" value="<?= $Pass ?>" ><br>

        <label for="">Nom</label>
        <input type="text" name="LastName" maxlength="25" id="" value="<?= $LastName ?>" ><br>

        <label for="">Prénom</label>
        <input type="text" name="FirstName" maxlength="25" id="" value="<?= $FirstName ?>" ><br>

        <label for="">Mail</label>
        <input type="text" name="EMail" id="" value="<?= $EMail ?>" ><br>



        <input type="submit" name="Submit" value="Validé">
    </form>
            <a href="vewUser.php">Retour</a>
        </div>

</body>
</html>
