<?php


if(isset($_POST['connexion'])){
    if(empty($_POST['login'])){
        echo "le champ User est vide.";
    } else {

        if(empty($_POST['password'])){
            echo "le champ Mot de passe est vide.";
        } else{

            $Pseudo = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1");
            $MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");

            $servername = 'db';
            $username = 'root';
            $password = 'example';
            $db_name = 'ProjetPHP';
            
            //On établit la connexion
            $mysqli = mysqli_connect($servername, $username, $password, $db_name);


            if(!$mysqli){
                echo "il y a une erreur de connexion avec la base de données";
            } else{

                session_start();
                
                
                $MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
                $req = mysqli_query($mysqli,"SELECT* FROM Compte WHERE USER = '".$Pseudo."' AND MDP = '".$MotDePasse."'");
                
                if($ligne = mysqli_fetch_array($req)){
                    $_SESSION['user'] = $ligne['USER'];
                    $_SESSION['mdp'] = $ligne['MDP'];
                    $_SESSION['nomCompte'] = $ligne['NOM_COMPTE'];
                    $_SESSION['prenomCompte'] = $ligne['PRENOM_COMPTE'];
                    $_SESSION['typeProfil'] = $ligne['TYPE_COMPTE'];

                    if($_SESSION['typeProfil'] == 1){
                        //echo $_SESSION['typeProfil'];
                        header("Location: Acceuil.php");
                    }elseif($_SESSION['typeProfil'] == 2){
                        header("Location: Acceuil.php");
                    }
                    else{
                        header("Location: ../index.php");
                        echo "erreur dans la requete";

                    }
                }
            }
        }
    }
}
    

?>
    

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Projet PHP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='../Styles/style1.css'>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src='main.js'></script>
    
</head>

<body class="p-3 mb-2 text-white">
<?php
    include '../Navigation/nav_Connexion.php';
 ?>
    <div class="wrapper fadeInDown">
            <div id="formContent2">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                    <!-- Tabs Titles -->
                    <!-- Icon -->
                        <div class="fadeIn first">
                                <h1>GACTI</h1>
                        </div>
                        <!-- Login Form -->
                        <form action="" method="POST">
                            <input type="text" id="login" class="fadeIn second" name="login" placeholder="username">
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                            <input type="submit" class="fadeIn fourth" value="connexion" name="connexion">
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
