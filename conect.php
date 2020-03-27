<?php
    $hostBD = "localhost";
    $nomBD = "blogart20";
    $userBD = "root";
    $passBD = "";
    $bdPdo = "";




            try{
                $bdPdo = new PDO("mysql:dbname=$nomBD;host=$hostBD;charset=utf8", $userBD, $passBD) ;
               // echo'Successful connection !';
            }
            catch (PDOException $error)
            {
                    die('Erreur : ' . $error->getMessage());
            }

?>
