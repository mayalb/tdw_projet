<!DOCTYPE html>
<?php

include("./controller/parent.php");
include("./controller/classe.php");
include("./controller/seance.php");
include("./controller/eleve.php");

?>
<html >
    <head>
        <meta charset="UTF-8">
        <link href="../css/sheet.css" rel="stylesheet" />
        
       
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

        <title>Ecole de formation TDW</title> 
        
    </head>
    <body >
    <?php include("./header.php"); ?>
    <form method="POST"  action="./controller/eleve.php">
        <input style="width:200px; padding: 12px 20px;float:right;" type="submit" name="dico" id="dico" value='Se Deconnecter'>
      </form><br><br><br>
          
          <div class="articles">
      <?php
          $check = new classparent();
          $check->check_user();
      ?>
       <div><h2>Informations personnelles</h2> <hr>

      <?php
      $data = $check->get_credentials_parent($_SESSION['mail_parent'],$_SESSION['mdp_parent']);$value = $data['parent_data'];
     
      ?>
              <p>nom :  <?php echo $value['nom'];?></p>
              <p>prenom :  <?php echo $value['prenom'];?></p>
              <p>adresse :  <?php echo $value['adresse'];?></p>
              <p>telephone 1 :  <?php echo $value['tel1'];?></p>
              <p>telephone 2 :  <?php echo $value['tel2'];?></p>
              <p>telephone 3 :  <?php echo $value['tel3'];?></p>
              <p>Email :  <?php echo $value['email'];?></p>
              <?php $id_parent=$value['id'];?>
              
       </div>
      <br>
       <?php
         $child = $data['child_data'];
         foreach ($child as $key => $value) {$value = $value[0];?>
             <div style='border:1px solid'>
             <?php
                $cls = new classparent();
               $id_child=$value['id'];
            
              $res= $cls->get_classe($id_child);
              $class=$res[0]['id_classe'];
                $classe=$res[0]['nom'];
                $cycle=$res[0]['cycle'];
                $annee=$res[0]['annee'];
                $activite=$res[0]['activite'];
               ?>
              <h2>fils:  <?php echo $value['nom']." ".$value['prenom'];?></h2>
              <p>prenom :  <?php echo $value['prenom'];?></p>
              <p>adresse :  <?php echo $value['adresse'];?></p>
              <p>telephone 1 :  <?php echo $value['tel1'];?></p>
              <p>telephone 2 :  <?php echo $value['tel2'];?></p>
              <p>telephone 3 :  <?php echo $value['tel3'];?></p>
              <p>Activités extrascolaires :  <?php echo $activite;?></p>
              <p>Classe :  <?php echo $classe;?></p>
              <p>Cycle :  <?php echo $cycle;?></p>
              <p>Année :  <?php echo $annee;?></p>
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
           $check=new classeleve();
           $datas = $check->print_tabled($class);

           
           foreach ($datas as $k => $v) :
             $seance = $v['heure_debut'].'_'.$v['heure_fin'];
             
             echo  $check->TD_counter($v['jour'],$seance,$v[6]);
             
             
           endforeach;
          
           ?>

         </pre>
      </tbody></table>
              <h3>Notes :</h3>
              <?php
            $note = $cls->get_notes_child($id_child);
            //print_r($note);
         
            foreach($note as $not):
            $matiere=$not['matiere'];
            $nt=$not['note'];
            $remarque=$not['remarque'];
      
               ?>
             <p>Matière :  <?php echo $matiere;?>
                 Note:  <?php echo $nt;?>
            Remarque enseigant :  <?php echo $remarque;?></p>
              
            <br>
            <?php endforeach; ?></div>
         <?php } ?>
          
        
        
         
      <br><br>
     

      </div>
    
      <?php include("./footer.php"); ?>

  
    </body>    
</html>
