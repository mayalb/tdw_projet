  
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

        <center><h2>EDTs des Enseignants </h2></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <span>
        <a  href="page-view.php" class="buy" >Retour à la page d'administration</a>
        <a  href="edt-view.php" class="buy" >Retour à la page de gestion des emplois du temps</a>
        <a  href="classe-edt-view.php" class="buy" >Aller voir EDT des classes</a>
        </span>
      
  <br><br><br><br><br>
      
   
        <?php 
        $print = new gestionseance();
        
          


    $ens = new enseignant_cont();
    $enseignants= $ens->recup_enseignants("afficher"); 
    
    foreach (   $enseignants as    $enseignant): 
  ?>
       
                         
   <table    id="customers" >

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
  <tbody id='tbody'>
  <?php 
  

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             
//////////////////////////////////////////////////////////             

    $days = array('samedi'=>0,'dimanche'=>1,
                    'lundi'=>2,'mardi'=>3,
                    'mercredi'=>4,'jeudi'=>5,
                    'vendredi'=>6);

     $data = array();
      $counter=0;
      foreach ($days as $day => $num){
          $fetch=$print->print_all($enseignant['id_ens'],$day);
          if($fetch['day']!=''):
            $data[]=$fetch;
            $counter = $counter + 1;
          endif;
      }  
      if(!empty($data)) :         
        $seances = array('seance'=>array(),'index'=>array(),'days'=>array());
        $previous = $data[0]['seance'];
        for($i=1;$i<$counter;$i++):
          if($data[$i]['seance']==$previous):
            $seances['seance'][] = $data[$i]['seance'];
            $seances['days'][] = $data[$i]['day'];
            $seances['index'][] = $i;
            $ip = $i - 1;
            $seances['seance'][] = $previous;
            $seances['days'][] = $data[$ip]['day'];
            $seances['index'][] = $ip;
          else:
            $previous=$data[$i]['seance'];
          endif;
        endfor;  
       endif;
if(empty($seances['seance'])):
    echo '<br><br>Enseignant : '.$enseignant['nom']."<br>";
     $data = array();
     $counter = 0;
     foreach ($days as $day => $num){
          $fetch=$print->print_all($enseignant['id_ens'],$day);
          $day_ens = "";
          $seance = "";
          $nom = "";
          if($fetch['day']!=''):
            $data[]=$fetch;
            $day_ens = $data[$counter]['day'];
            $seance = $data[$counter]['seance'];
            $nom = $data[$counter]['nom'];
            $counter = $counter + 1;
            endif;

            $print->print_table($day_ens,$seance,$nom);
     }

else:

    $days_ens = array();
    $days= array();
    for($i=0;$i<count($seances['days']);$i++):
      $days[]=$print->days($seances['days'][$i]);
    endfor;
    sort($days);
    $j=0;
    echo '<br>Enseignant : '.$enseignant['nom'];
    echo "<tr><td>".$seances['seance'][0]."</td>";
      $df= array(0,1,2,3,4,5,6);
      foreach($days as $k=>$v){
          foreach($df as $key=>$value){
              if(!in_array($value, $days)){
                $days[]=$value.'-';
              }
          }
      }
      sort($days);
      for($i=0;$i<7;$i++):
        if((string)$i==$days[$i]):
          echo "<td>".$print->print_all($enseignant['id_ens'],$print->days_in($i))['nom']."</td>";   
        else:
          echo '<td></td>';
        endif;

      endfor;
      echo "</tr>"; 
      
      
      foreach ($data as $key2=>$value2) {
          foreach($seances['seance'] as $key => $value){
          }
          if($value==$data[$key2]['seance']){
                unset($data[$key2]);
          }
              
        }
      foreach ($data as $key => $value) {
        $day_ens = $value['day'];
        $nom = $value['nom'];
        $seance = $value['seance'];
        $print->print_table($day_ens,$seance,$nom);
      }
      
  
endif;
echo "</table><br>";
endforeach;


?> 

</body>


</html>