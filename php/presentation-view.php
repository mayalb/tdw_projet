  
<?php 
session_start();
include('./controller/paragraphe.php');
if (isset($_SESSION['mail'])){
    $admin=$_SESSION['mail'];
   
}else{
    header("Location: ./connexion-view.php ");
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->



</head>

<body style="background-image: url('../images/blue.jpg');">
        <center><h1>Gestion des Présentations </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
      

        <br><br><br><br><br>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" >Paragraphe</th>
                    <th scope="col" rowspan="3"> Numéro de la présentation </th>
                    <th scope="col">image</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new gestionparagraphe();
                     $paragraphes = $classC->afficherparagraphe();
                      foreach ($paragraphes as $paragraphe): 
                    ?>
                    <tr><td><?php echo $paragraphe['paragraphe'] ?></td><td><?php echo $paragraphe['id_presentation'] ?></td><td><?php echo $paragraphe['lien_img'] ?></td><td>
                    <form action='./controller/paragraphe.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $paragraphe['id'] ?>'> 
                                                        
                    <input type='submit'  name='modifier' value='Modifier'> 
                        </form>    
                    </td>
                    <td>
                    <form action='./controller/paragraphe.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $paragraphe['id'] ?>'> 
                                            
                         <input type='submit'  name='supprimer' value='Supprimer'> 
                         </form> </td>
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
           
            <center>
            <h2>Ajouter ou Modifier un paragraphe</H2>
            <div class="from-st">
             
            <form  action="./controller/paragraphe.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name">Paragraphe </label>
                <br>
                
                <?php 
                
                if(isset($_GET['para'])){
                    $paragraphe = $_GET['para'];
                }
                else{
                    $paragraphe = "paragraphe ..";
                }
                ?>
                <input type="text"  id="paragraphe"  name="paragraphe" value='<?php echo $paragraphe; ?>'>
                <br><br>
                   <label >Ajouter une image </label>
                   <input type="file"  name="file2"  id="file2">
                   <br><br>
               <input type="submit" name="submitall" value="Ajouter paragraphe" >
            </form></div> </center>
         
           
 
         


</body>


</html>