
 <?php 
session_start();
include('./controller/diaporama.php');

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
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">



</head>

<body style="background-image: url('../images/blue.jpg');"><br><br><br>
        <center><h1>Gestion de Diaporama </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
      
       
        <center>
        <h2>Modifier les photos </h2>
      
        <div class="from-st">
 <form   action="./controller/diaporama.php"  method="post" enctype="multipart/form-data"  >
        <input    type="file" name="one"> <br><br>
        <input    type="file" name="two" > <br><br>
        <input   type="file" name="three" > <br><br>
        <input   type="file" name="four" > <br><br>

        <input   type="submit" name="submit" >

</form></div></center>
      
         
      <br><br><br>
         