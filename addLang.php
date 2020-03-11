<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog'Art</title>
</head>
<body>

<?php   

    ini_set('display_errors','on');

    include 'conect.php';

            $NumLang ="";
            $Lib1Lang ="";
            $Lib2Lang ="";
            $numPays ="";
            $NumPays ="";
           
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
			if (isset($_POST['id']) AND $_POST['id'] == 0) {
              
				if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
                AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
                AND ((isset($_POST['NumPays'])) AND !empty($_POST['NumPays']))) {
                    $erreur = false;
                    
                    $NumLang = 0;
				
                    $Lib1Lang = ctrlSaisies($_POST['Lib1Lang']);
                    $Lib2Lang = ctrlSaisies($_POST['Lib2Lang']);
                    $NumPays = ctrlSaisies($_POST['NumPays']);

                    $numPaysSelect = $NumPays;
                    $parmNumlang = $numPaysSelect . '%';
                    $requete = "SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE NumLang LIKE '$parmNumlang';";

                    $result = $bdPdo->query($requete);

                    $numSeqLang = 0;
                    if ($result){
                        $tuple = $result->fetch();
                        $NumLang = $tuple["NumLang"];
                        if(is_null($NumLang)){
                            $NumLang =0;
                            $StrLang =$numPaysSelect;

                        }else{
                            $NumLang = $tuple["NumLang"];
                            $StrLang = substr($NumLang, 0,4);
                            $numSeqLang = (int)substr($NumLang,4);
                        }
                        $numSeqLang++;

                        if ($numSeqLang < 10){
                            $NumLang = $StrLang . "0" . $numSeqLang;
                        }else{
                            $NumLang = $StrLang . $numSeqLang;
                        }

                       

                        try {
                            $stmt = $bdPdo->prepare("INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, NumPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :NumPays)");
                            $stmt->bindParam(':NumLang', $NumLang);
                            $stmt->bindParam(':Lib1Lang', $Lib1Lang);
                            $stmt->bindParam(':Lib2Lang', $Lib2Lang);
                            $stmt->bindParam(':NumPays', $NumPays);
        
                            $stmt->execute();
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }

                
            }
    }
}
   
        
?>


    <h2>Ajoutez une langue...</h2>
    <form action="addLang.php" name="formLangue" method="post">
        <input type="hidden" name="id" value="">

        <label for="">Libellé cour :</label>
        <input type="text" name="Lib1Lang" maxlength="25" id="" placeholder="25 char."><br>

        <label for="">Libellé long :</label>
        <input type="text" name="Lib2Lang" maxlength="25" id="" placeholder="25 char."><br>

        <label for="">Quel Pays :</label>
        <input type="text" name="NumPays" maxlength="4" id="" placeholder="4 char."><br>

        <input type="submit" name="Submit" value="Validé">
    </form>
    <a href="index.php">Retour</a>


<?php include 'disconect.php';?>


</body>
</html>