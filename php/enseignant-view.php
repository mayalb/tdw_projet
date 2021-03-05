  
<?php 
session_start();
include('./controller/enseignant.php');
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
        <center><h1>Gestion des enseignants </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
      
   
        <br><br><br><br><br>
        <h1>Affecter une classe à un enseignant </h1>
        <div class="from-st">
             
            <form  action="./controller/enseignant.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name">Sélectionner Enseignant </label>
                <select id="getens" name="getens">
                   <option selected>Sélectionner...</option>

                   <?php 
                     $classC = new enseignant_cont();
                     $ens = $classC->recup_enseignants("afficher");
                      foreach ($ens as $en): 
                    ?>
              <option value="<?php echo $en['id'] ?>"> <?= $en['nom'] ?></option>
                     <?php endforeach; ?>
                 </select>

                
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

           
               <input type="submit" name="submit" value="Confirmer" >
            </form></div>

            <h1>Ajouter des heures de travail et de reception à un enseignant </h1>
        <div class="from-st">
             
            <form  action="./controller/enseignant.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name">Sélectionner Enseignant </label>
                <select id="getens" name="getens">
                   <option selected>Sélectionner...</option>

                   <?php 
                     $classC = new enseignant_cont();
                     $ens = $classC->recup_enseignants("afficher");
                      foreach ($ens as $en): 
                    ?>
              <option value="<?php echo $en['id'] ?>"> <?= $en['nom'] ?></option>
                     <?php endforeach; ?>
                 </select>

                
                 <label for="name">Ajouter une heure de travail </label>       
                
                 <input type="text"  id="heuretravail"  name="heuretravail" placeholder="Heure de travail">
                 <label for="name">Ajouter une heure de Réception</label>       
                
                <input type="text"  id="heurereception"  name="heurereception" placeholder="Heure Réception">
                <select id="jour" name="jour">
                   <option selected>Sélectionner le jour...</option>

                  
              <option value="samedi">Samedi</option>
              <option value="dimanche">Dimanche</option>
              <option value="lundi">Lundi</option>
              <option value="mardi">Mardi</option>
              <option value="mercredi">Mercredi</option>
              <option value="jeudi">Jeudi</option>
              <option value="vendredi">Vendredi</option>
            
                 </select>
                

           
               <input type="submit" name="submit" value="Confirmer" >
            </form></div>
      
         
        <br><br><br><br><br>
           
            <?php 
                     $classC = new enseignant_cont();
                     $ens = $classC->recup_enseignants("afficher");
                      foreach ($ens as $en): 
                    ?>
         
        <br><br><br><br><br>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" style="background-color:none;" ></th>
                    <th scope="col" rowspan="3"> Heure de travail </th>
                    <th scope="col">Heure de travail </th>
                    <th scope="col">Jour</th>
                    <th scope="col">Supprimer</th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new enseignant_cont();
                     $ens = $classC->recup_heure();
                      foreach ($ens as $en): 
                    ?>
                    <tr><td><?php echo $en['heuretravail'] ?></td><td><?php echo $en['heurerecep'] ?></td><td><?php echo $en['jour']?></td><td>
                    <form action='./controller/enseignant.php' method='post' >
                        <input type='hidden' name='id' value='<?php echo $en['id'] ?>'> 
                                                        
                        <input type='submit'  name='supprimer' value='Supprimer'>
                        </form>    
                    </td>
                  
                        </tr>
              
                     <?php endforeach; ?>
                </tbody>
            </table>
            <?php endforeach; ?>
     
</body>


</html>