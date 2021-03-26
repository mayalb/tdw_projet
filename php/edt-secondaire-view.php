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

      <?php
       
          $check = new classcont();
         $data= $check->get_classe_secondaire();
          
          
          foreach ($data as $key => $value):

           $class=$value['id'];
           ?>
        
       <br><br>
     

      </div>
      <h2> Classe <?php echo $value['nom'];?>:</h2> 
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
      </tbody></table> <?php endforeach;?>
      <br><br>
   


      <?php include("./footer.php"); ?>
    </body>    
</html>
