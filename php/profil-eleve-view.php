<!DOCTYPE html>
<?php

include("./controller/eleve.php");
include("./controller/classe.php");
include("./controller/seance.php");

?>
<html >
    <head>
        <meta charset="UTF-8">
        <link href="../css/sheet.css" rel="stylesheet" />
        
<script src="../javascript/file.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        

        <title>Ecole de formation TDW</title> 
        
    </head>
    <body >
    <?php include("./header.php"); ?>
    <form method="POST"  action="./controller/eleve.php">
        <input style="width:200px; padding: 12px 20px;float:right;" type="submit" name="dico" id="dico" value='Se Deconnecter'>
      </form><br><br><br>
     <div><h2>élève informations personnelles</h2> <hr>
      <?php
       
          $check = new classeleve();
          $check->check_user();
          
          $data = $check->get_credentials($_SESSION['mail_eleve'],$_SESSION['mdp_eleve']);
          
          foreach ($data as $key => $value) {?>

             
              <p><strong>nom :</strong>  <?php echo $value['nom'];?></p>
              <p><strong>prenom :</strong>  <?php echo $value['prenom'];?></p>
              <p><strong>adresse : </strong> <?php echo $value['adresse'];?></p>
              <p><strong>telephone 1 : </strong> <?php echo $value['tel1'];?></p>
              <p><strong>telephone 2 :</strong>  <?php echo $value['tel2'];?></p>
              <p><strong>telephone 3 :</strong>  <?php echo $value['tel3'];?></p>

           

          <?php } 
          $data = $check->get_credentials_eleve($value['id']);
          
          foreach ($data as $key => $value) {?>
           
              <p><strong>Date de naissance :</strong> <?php echo $value['date_naissance'];?></p>
              <p><strong>classe :</strong><?php echo $value['classe']; $class=$value['id_classe'];?></p>
              <p><strong>cycle :</strong><?php echo $value['cycle'];?></p>
              <p><strong>annee :</strong><?php echo $value['annee'];?></p>
              <p><strong>activite_extrascol :</strong><?php echo $value['activite_extrascol'];?></p>
              

          <?php }
          
        echo"  <h2>Notes</h2>";
          $data = $check->get_notes_eleve($value['id']);
          foreach ($data as $key => $value) {?>
           
              <p><strong> Matière :</strong> <?php echo $value['matiere'];?>
              <strong> Note :</strong> <?php echo $value['note'];?>
              <strong> Remarque  : </strong><?php echo $value['remarque'];?></p>
       

          <?php }?>
          
              

       <br><br>
     

      </div>
      <h2>Emplois du temps</h2> 
      <table  id="customers" >
            <thead style="color:black;">
            
                <tr>
                <th scope="col"  >Séance</th>
                <th scope="col" >Samedi</th>
                <th scope="col">Dimanche</th>
                <th scope="col" rowspan="3"> Lundi </th>
                <th scope="col">Mardi</th>
                <th scope="col">Mercredi</th>
                <th scope="col">Jeudi</th>
                <th scope="col">Vendredi</th>           
                </tr>               
            </thead>
            <tbody id='tbody' ><pre>
         <?php 
           
           $print = new gestionseance();
           $datas = $check->print_tabled($class);

           
           foreach ($datas as $k => $v) :
             $seance = $v['heure_debut'].'_'.$v['heure_fin'];
             
             echo  $check->TD_counter($v['jour'],$seance,$v[6]);
             
             
           endforeach;
          
           ?>

         </pre>
      </tbody></table>
      <br><br>
   


      <?php include("./footer.php"); ?>
    </body>    
</html>
