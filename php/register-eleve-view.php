  
<?php 
session_start();
include('./controller/inscription.php');
include('./controller/classe.php');
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

<body style="background-image: url('../images/blue.jpg');">
        <center><h1>Gestion des Comptes des éleves </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
        <a  href="util-view.php" style="color:black;" >Retour</a>
      

        <br><br><br><br><br>
        
           
            <center>
            <h2>Ajouter ou Modifier un Elève</H2>
            <div class="from-st">
             
            <form  action="./controller/inscription.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name"> Veuillez entrer la matricule en cas de modification </label>
                <input type="text"  id="id"  name="id" placeholder="Matricule">
                <br>
                <input type="text"  id="nom"  name="nom" placeholder="Nom">
                <input type="text"  id="prenom"  name="prenom" placeholder="Prenom">
                <input type="text"  id="datenaissance"  name="datenaissance" placeholder="Date Naissance">
                <input type="text"  id="adresse"  name="adresse" placeholder="Adresse">
                <input type="text"  id="tel1"  name="tel1" placeholder="Telephone 1">
                <input type="text"  id="tel2"  name="tel2" placeholder="Telephone 2">
                <input type="text"  id="tel3"  name="tel3" placeholder="Telephone 3">
                <select id="getclasse" name="getclasse">
                   <option selected>Sélectionner la classe ...</option>

                   <?php 
                     $classC = new classcont();
                     $classes = $classC->recupclasses();
                      foreach ($classes as $classe): 
                    ?>
              <option value="<?php echo $classe['id'] ?>"> <?= $classe['nom'] ?></option>
                     <?php endforeach; ?>
                 </select>
                <input type="text"  id="email"  name="email" placeholder="Email">
                <input type="text"  id="mdp"  name="mdp" placeholder="Mot de passe">
                <br>
                
              
              
                   <label >Si le parent a deja un compte , veuillez introduire sa matricule</label>
                   <input type="text"  id="idparent"  name="idparent" placeholder="Matricule Parent">
                   <br><br>
               <input type="submit" name="submiteleve" value="Confirmer" >
            </form></div> </center>
         
           
 
         


</body>


</html>