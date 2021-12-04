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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
     
 </head>
 <body class="p-3 mb-2 text-white">
 <?php
    include '../Navigation/nav.php';
 ?>
<?php
    print($_SESSION['nomCompte']);


    echo "<table class='' border='0' width= 45% > ";
    echo "<tr>";
    echo "<td><h1>Bonjour</h1></td>";
    echo "<td><h3>".$_SESSION['nomCompte']." ".$_SESSION['prenomCompte']."</h3></td>";
    echo "</tr>";

    echo "<tr >";
    echo "<td>Compte :";
    if($_SESSION['typeProfil'] = 1){
        echo " ";
        echo "Administrateur";
    }else{
        echo " ";
        echo "Utilisateur";
    }



    echo "</td>";


    echo "</br>";

    echo "</table>"

?>



     
     
 </body>
 </html>