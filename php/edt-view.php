  
<?php 
session_start();
include('./controller/seance.php');
include('./controller/classe.php');
include('./controller/enseignant.php');
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
        <center><h1>Gestion des emplois du temps </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
        <a  href="classe-edt-view.php" style="color:black;" >Visualiser les emplois du temps</a>
      
  <br><br><br><br><br>
      
   
        <center>
        <h2>Veuillez ajouter des séances</h2>
            <div class="from-st">
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
                <label > Jour</label>
                <input type="text"  name="jour"  id="jour">
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

 </form></div> </center>
 <br><br><br><br><br>
      
            <table id="table" class="table" width="500px" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" >Séance</th>
                    <th scope="col">Jour</th>
                    <th scope="col" rowspan="3"> Heure Début </th>
                    <th scope="col">Heure fin</th>
                    <th scope="col">Module</th>
                    <th scope="col">Enseignant</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Supprimer</th>
                   
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new gestionseance();
                     $seances = $classC->afficherseance();
                      foreach ($seances as$seance): 
                        $ens = new enseignant_cont();
                        $enseignant= $ens->get_enseignant($seance['id_ens']);

                        $clas = new classcont();
                        $classe= $clas->get_classe($seance['id_classe']);

                    ?>
                    <tr><td><?php echo $seance['id'] ?></td><td><?php echo $seance['jour'] ?></td><td><?php echo $seance['heure_debut']?></td><td><?php echo $seance['heure_fin'] ?></td><td>
                    <?php echo $enseignant[0]['nom']  ?></td><td><?php echo $enseignant[0]['module'] ?></td><td><?php echo $classe[0]['nom'] ?></td>
                    
                    <td>
                    <form action='./controller/seance.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $seance['id'] ?>'> 
                                            
                         <input type='submit'  name='supprimer' value='Supprimer'> 
                         </form> </td>
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
           
 
         


</body>


</html>