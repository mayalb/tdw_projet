<?php include('./controller/classe.php');?>
<?php include('./controller/enseignant.php');?>
<?php 
session_start();
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
<form  action="./controller/deconnect.php"  method="post"  >
        <input type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
   
<div class="cadre">
<h2>Gestion des articles </h2>



 <form action="./controller/article.php" method="POST"  enctype="multipart/form-data" >
             
                <label>Titre </label>
                <input type="text"   id="titr"  name="titr">
        
        
                <label for="name">description </label>
                <input type="text"   id="desc"  name="desc">
         
                     <label  for="inputGroupSelect01">Selectionner le type </label>
         
                 <select  id="type" name="type">
                   <option selected>Sélectionner...</option>
                    <option value="1">Enseignants</option>
                    <option value="2">Parents</option>
                    <option value="3">Primaire</option>
                    <option value="4">Moyen</option>
                    <option value="5">Secondaire</option>
                    <option value="6">Tous</option>
                 </select>
               
                   <label >Ajouter une image Image </label>
                   <input type="file"  name="file1"  id="file1">
                  
                   
               <input type="submit" name="submit" value="Ajouter Article" >
            </form> 
            <?php 
            if(isset($_POST['submit'])){
          include('./controller/article.php');
              $classa = new gestionarticle();
              $classa->postarticle();
            }  
                    ?>

          </div>

<div  class="cadre">

<h2>Gestion de Présentation de l'école </h2>
<form action="./controller/paragraphe.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name">Paragraphe </label>
                <input type="text"   id="paragraphe"  name="paragraphe" >
                   <label >Ajouter une image </label>

                   <input type="file"  name="file2"  id="file2">
               <input type="submit" name="submitall" value="Ajouter paragraphe" >
 </form>
          </div>

<div  class="cadre">

<h2>Gestion des emplois du temps </h2>

<form action="./controller/seance.php" method="POST"  enctype="multipart/form-data" >     
                <label for="name">Veuillez sélectionner la classe concernée </label>       
                
                  
                <select id="getclasse" name="getclasse">
                   <option selected>Sélectionner...</option>

                   <?php 
                     $classC = new classcont();
                     $classes = $classC->recupclasses();
                      foreach ($classes as $classe): 
                    ?>
              <option value="<?php echo $classe['id'] ?>"> <?= $classe['nom'] ?></option>
                     <?php endforeach; ?>
                 </select>

                
                <h4>Ajouter une séance</h4>

                <label > heure début</label>
                <input type="text"  name="heuredebut"  id="heuredebut">
                <label > heure Fin</label>
                <input type="text"  name="heurefin"  id="heurefin">

                <label > Veuillez sélectionner un Enseignant</label>
                <input type="hidden"  name="ajouterens" >
                <select id="getens" name="getens"> 
                   <?php 
                     $ens = new enseignant_cont();
                $enseignants = $ens->recup_enseignants('afficher');?>
                 <option selected>Sélectionner...</option>

                    <?php 
                      foreach ($enseignants as $ensa): 
                    ?>
                     <option value="<?php echo $ensa['nom'] ?>"> <?= $ensa['nom'] ?></option>
                     <?php endforeach; ?>
                 </select>

                <input type="submit" name="submit3" value="Ajouter séance">

 </form>

</div>

<!-- <div ><br>
<hr><hr>
<h2>Gestion des Enseignants</h2>


<h4>Ajouter Enseignant</h4>
<form action="admin-view.php" method="POST"  enctype="multipart/form-data" >    
              <label > Nom :</label>
                <input type="text"  name="nom"  id="nom"> <br>
            
              <label > Veuillez sélectionner Les classes de l'enseignant</label>
                   <?php 
                     $classC = new classcont();
                     $classes = $classC->recupclasses();
                      foreach ($classes as $cl): 
                    ?>
                     <label > <?= $cl['nom'] ?></label>
                <input type="checkbox" value="<?php echo $cl['id']?>" name="ajouter[]">
                 <?php endforeach; ?>

                  <input type="submit" name="ajouenss" value="Selectionner classe">
                <h4>Ajouter d'une heure</h4>
                <!-- valeur 0 -->
                <!-- <label > heure Travail</label>
                <input type="text"  name="heuretravail"  id="heuretravail">
                 <!-- valeur 1 -->
                <!-- <label > heure Réception</label>
                <input type="text"  name="heurereception"  id="heurereception">

              

                <input type="submit" name="ajouens" value="Ajouter Enseigant"> -->

 </form> -->
     -->
 <!-- <h4>Modifier Enseignant</h4>
<form action="admin-view.php" method="POST"  enctype="multipart/form-data" >  
               <label > Veuillez sélectionner un Enseignant</label>
                <select id="getens" name="getens"> 
                 <option selected>Sélectionner...</option>

                   <?php 
                     $ens = new enseignant_cont();
                     $enseignants = $ens->recup_enseignants('afficher');

                      foreach ($enseignants as $ensa): 
                    ?>
                     <option value="<?php echo $ensa['nom'] ?>"> <?= $ensa['nom'] ?></option>
                     <?php endforeach; ?>
                 </select> 
                 <label > Nom :</label>
                <input type="text"  name="nom"  id="nom"> 

                <label > Veuillez sélectionner Les classes de l'enseignant</label>
                   <?php 
                     $classC = new classcont();
                     $classes = $classC->recupclasses();
                      foreach ($classes as $classe): 
                    ?>
                <input type="checkbox" value="<?php echo $classe['id']?>" name="<?= $classe['nom'] ?>">
                <input type="submit" name="Modifiernom" value="Modifier nom">

                 <?php endforeach; ?>
                <h4>Ajouter d'une heure</h4>
                <label > heure Travail</label>
                <input type="text"  name="heuretravail"  id="heuretravail">
                <label > heure Réception</label>
                <input type="text"  name="heurereception"  id="heurereception">
                
              

                <input type="submit" name="modifierens" value="Modifier Enseigant">
 </form>

 <h4>Supprimer Enseignant</h4>
<form action="admin-view.php" method="POST"  enctype="multipart/form-data" >     
<label > Veuillez sélectionner un Enseignant</label>
                <select id="getens" name="getens"> 
                 <option selected>Sélectionner...</option>

                   <?php 
                     $ens = new enseignant_cont();
                     $enseignants = $ens->recup_enseignants('afficher');

                      foreach ($enseignants as $ensa): 
                    ?>
                     <option value="<?php echo $ensa['nom'] ?>"> <?= $ensa['nom'] ?></option>
                     <?php endforeach; ?>
                 </select> 
                <input type="submit" name="suppens" value="Supprimer Enseingnant" >

 </form>


</div> -->




</body>


</html>