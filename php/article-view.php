  
<?php 
session_start();
include('./controller/article.php');
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
<script src="../javascript/file.js"></script>


</head>

<body style="background-image: url('../images/blue.jpg');">
        <center><h1>Gestion des articles </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
      
      

        <br><br><br><br><br>
        <center><h3>Ajout/Modification des articles </h3>
        <div class="from-st">
       
         <form  action="./controller/article.php" method="POST"  enctype="multipart/form-data" >
             <select id="getarticle" name="getarticle">
                   <option selected>Sélectionner l'article à modifier...</option>
                   <?php 
                     $classC = new art();
                     $articles = $classC->recuparticle();
                      foreach ( $articles as  $article): 
                    ?>
              <option value="<?php echo $article['id'] ?>"> <?= $article['titre'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <br><br><br>
                <input type="text"   id="titr"  name="titr" placeholder="Titre" required="">

                <br><br><br>
                <input type="text"   id="desc"  name="desc" placeholder="Description" required="">
                <br><br><br>
                 <select class="select" id="type" name="type">
                   <option selected>Sélectionner...</option>
                    <option value="1">Enseignants</option>
                    <option value="2">Parents</option>
                    <option value="3">Primaire</option>
                    <option value="4">Moyen</option>
                    <option value="5">Secondaire</option>
                    <option value="6">Tous</option>
                 </select>
                 <br><br><br>
               
               
                   <input type="file"  name="file1"  id="file1" placeholder="Image de l'article" required="">
                
                   <br><br><br>
               <input class="button2" type="submit" name="submit" value="Ajouter Article" >
               <input  class=" button2"  type="submit" name="modifier" id="modifier" value="Modifier article" >
            </form></center></div>
         
            <br><br><br> 
            <?php 
                    
                     $classC = new art();
                     $articles = $classC->recuparticle();
                      foreach ($articles as $article): 
                        $img=$article['lien_image'];
             ?>
            <div class="cadre" >
            <p class="center">  <?= $article['titre'] ?></p> 
            <p>Description: <?= $article['description'] ?></p> 
            <p>ceux qui sont interessés par l'article : <?= $article['aud'] ?></p> 

            <?php
            echo "<img src='{$img}' alt='photo article' style='height: 120px; ' class='avatar'>";
            ?>
           
             
        <form  class="inline" action="./controller/article.php"  method="post"  >
        <input  class=" button2"  type="hidden" name="id" value="<?= $article['id'] ?>" >
        <center>  <input  class=" button2" style=" width:230px;" type="submit" name="supprimer" id="supprimer" value="Supprimer article" ></center>
        </form>
           </div>
           <?php endforeach; ?>
          
  
         


</body>


</html>