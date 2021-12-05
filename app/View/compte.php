<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>GACTI</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='../Styles/style1.css'>
    <script src='main.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     
</head>
<body class="p-3 mb-2 text-white">
<?php
    include '../Navigation/nav.php';
 ?>
    </br>
    <?php
    
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
        $req1 = "SELECT USER, MDP, TYPE_COMPTE FROM Compte";
        $reponse1 = mysqli_query($mysqli ,$req1);
    }
        if($reponse1){
        ?>
        <table  class=' fadeInDown' width='45%'>
            <tr>

                <td>Identifiants</td>
                <td>Mot de passe</td>
                <td>Type de profil</td>
                
            </tr>
            
        <?php
            while($ligne = mysqli_fetch_array($reponse1)){
                echo "<tr>";
                echo "<td>".$ligne['USER']."</td>";
                echo "<td>".$ligne['MDP']."</td>";
                echo "<td>".$ligne['TYPE_COMPTE']."</td>";
                echo "</tr>";
            }
        } else{
            echo "erreur dans l'execution de la requete";
           // echo "le message d'erreur est : " .mysql_error($mysqli);
        }
        
        ?>

    
    </table>
</body>
</html>
