<?php
session_start();
$ErrImage = $ErrContenu = $ErrAuteur = $ErrDATE = $ErrTitre  = $ErrID_USER =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$Images=($_POST['images']);
    $Titre=$_POST['Titre'];
	$Contenu=$_POST['Contenu'];
	$Auteur=$_POST['Auteur'];
    $ID_USER=$_POST['ID_USER'];

  
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
       
        $req1 = "SELECT DATE( NOW() )as date;";
        $reponse1 = mysqli_query($mysqli ,$req1);
        $DatePublication = date('Y-m-d'); 

        if ($reponse1){
            $req = "INSERT INTO Post(images, Titre, Contenu, Auteur, Date, ID_USER) 
			VALUES('".$Images."','".$Titre."','".$Contenu."','".$Auteur."','".$DatePublication."','".$_SESSION['user']."')";

            mysqli_query($mysqli, $req) or die('Erreur SQL !'.$req.'<br>'.mysqli_error($mysqli));

            echo 'Votre post a été ajouté !.';
        }
        
        
    
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     
 </head>
 <body class="p-3 mb-2 text-white">
 <?php
    include '../Navigation/nav.php';
 ?>

    <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="wrapper fadeInDown">
                    <div id="formContent2">
                    <!-- Tabs Titles -->
                    <!-- Icon -->
                        <div class="fadeIn first">
                                        
                                <h1>Ajout Post</h1>
                        </div>
                        <!-- Login Form -->
                        <article class="card-body">
                            <form method="POST" action="Post.php">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Url Image</label>  
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrImage; ?> </span> 
                                        <input type="text" class="form-control" placeholder="" name="images">
                                    
                                    </div> <!-- form-group end.// -->
                                    
                                </div> <!-- form-row end.// -->
                                
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Titre Post</label> 
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrTitre; ?> </span>  
                                        <input type="text" class="form-control" placeholder="..." name="Titre">
                                        
                                    </div> <!-- form-group end.// -->
                                    
                                    
                                </div> <!-- form-row end.// -->


                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Contenu</label>
                                    <textarea class="form-control" name="Contenu" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

  


                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Auteur</label> 
                                        <span style="color : red; font-size : 13px" >* <?php echo $ErrContenu; ?> </span>  
                                        <input type="text" class="form-control" placeholder="Walid DADI" name="Auteur">
                                        
                                    </div> <!-- form-group end.// -->
                                    
                                    
                                </div> <!-- form-row end.// -->

                                            
                                <div class="form-group">
                                    <button type="submit" href="Post.php" class="btn btn-primary btn-block"> Enregistrer </button>
                                </div> <!-- form-group// -->      
                                                        
                            </form>
                        </article> <!-- card-body end .// -->
                        
                    </div>
                </div>
            </div>
        </div>
    

    
     
     
 </body>
 </html>




 