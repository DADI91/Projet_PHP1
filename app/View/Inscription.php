<?php

$ErrUSER = $ErrMDP = $ErrNOM = $ErrPRENOM = $ErrTYPE =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$USER=($_POST['USER']);
	$MDP=$_POST['MDP'];
	$NOM_COMPTE=$_POST['NOM_COMPTE'];
	$PRENOM_COMPTE=$_POST['PRENOM_COMPTE'];
	$TYPE_COMPTE=$_POST['TYPE_COMPTE'];

  
	//___________________________________ici serait mieux_______________________________________________________________________
    $servername = 'db';
    $username = 'root';
    $password = 'example';
    $db_name = 'ProjetPHP';
    
    //On établit la connexion
    $mysqli = mysqli_connect($servername, $username, $password, $db_name);
    
    if(!$mysqli){
        echo "il y a une erreur de connexion avec la base de données";
    } else{
       

        $req = "INSERT INTO Compte(USER, MDP, NOM_COMPTE, PRENOM_COMPTE, TYPE_COMPTE) 
			VALUES('".$USER."','".$MDP."','".$NOM_COMPTE."','".$PRENOM_COMPTE."','".$TYPE_COMPTE."')";

        mysqli_query($mysqli, $req) or die('Erreur SQL !'.$req.'<br>'.mysqli_error($mysqli));

        echo 'Insciption réussi !.';
        
    
    }
}


?>

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
    include '../Navigation/nav_Connexion.php';
 ?>

    <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="wrapper fadeInDown">
                    <div id="formContent2">
                    <!-- Tabs Titles -->
                    <!-- Icon -->
                        <div class="fadeIn first">
                                        
                                <h1>Insciption</h1>
                        </div>
                        <!-- Login Form -->
                        <article class="card-body">
                            <form method="POST" action="Inscription.php">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>USER</label>  
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrUSER; ?> </span> 
                                        <input type="text" class="form-control" placeholder="Ex : Lucas91" name="USER">
                                    
                                    </div> <!-- form-group end.// -->
                                    
                                </div> <!-- form-row end.// -->
                                
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Mot de passe</label> 
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrMDP; ?> </span>  
                                        <input type="password" class="form-control" placeholder="Password" name="MDP">
                                        
                                    </div> <!-- form-group end.// -->
                                    
                                </div> <!-- form-row end.// -->
                                
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>NOM</label> 
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrAge_min; ?> </span>  
                                        <input type="text" class="form-control" placeholder="..." name="NOM_COMPTE">
                                        
                                    </div> <!-- form-group end.// -->
                                    
                                    
                                </div> <!-- form-row end.// -->

                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>PRENOM</label> 
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrAge_min; ?> </span>  
                                        <input type="text" class="form-control" placeholder="..." name="PRENOM_COMPTE">
                                        
                                    </div> <!-- form-group end.// -->
                                    
                                    
                                </div> <!-- form-row end.// -->



                                <div>
                                    <input type="radio" id="1" name="TYPE_COMPTE" value="1"
                                            checked>
                                    <label for="Admin">Admin</label>
                                </div>

                                <div>
                                    <input type="radio" id="2" name="TYPE_COMPTE" value="2">
                                    <label for="User">User</label>
                                </div>



                                            
                                <div class="form-group">
                                    <button type="submit" href="Connexion.php" class="btn btn-primary btn-block"> Enregistrer </button>
                                </div> <!-- form-group// -->      
                                                        
                            </form>
                        </article> <!-- card-body end .// -->
                        
                    </div>
                </div>
            </div>
        </div>
    

    
     
     
 </body>
 </html>




 