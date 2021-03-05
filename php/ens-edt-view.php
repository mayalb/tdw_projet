  
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
          function TD_counter($day,$seance,$nom){
             $data ="<tr><td>".$seance."</td>";
             for($i=0;$i<7;$i++){
               if($i==days($day)):
                $data.="<td>".$nom."</td>";
               else:
                $data.="<td></td>";
               endif;
             }
             return $data;
          }
      
          function print_table($day_ens,$seance="",$nom=""){

            switch ($day_ens){
              case 'samedi':
                echo TD_counter($day_ens,$seance,$nom);
              break;
              case 'dimanche':
                echo TD_counter($day_ens,$seance,$nom);
              break;
              case 'lundi':
                echo TD_counter($day_ens,$seance,$nom);
              break;
              case 'mardi':
                echo TD_counter($day_ens,$seance,$nom);
              break;
              case 'mercredi':
                echo TD_counter($day_ens,$seance,$nom);
              break;
              case 'jeudi':
                echo TD_counter($day_ens,$seance,$nom);
              break;
              case 'vendredi':
                echo TD_counter($day_ens,$seance,$nom);
              break;

           }
            
          }

           function days($day_ens){
            switch ($day_ens){
             case 'samedi':
               return 0;
             break;
             case 'dimanche':
               return 1;
             break;
             case 'lundi':
              return 2;
             break;
             case 'mardi':
              return 3;
             break;
             case 'mercredi':
             return 4;
             break;
             case 'jeudi': 
              return 5;
             break;
             case 'vendredi':
              return 6;
             break;    

             } }
            function days_in($day_ens){
             switch ($day_ens){
               case 0:
                 return 'samedi';
               break;
               case 1:
                 return 'dimanche';
               break;
               case 2:
                return 'lundi';
               break;
               case 3:
                return 'mardi';
               break;
               case 4:
               return 'mercredi';
               break;
               case 5: 
                return 'jeudi';
               break;
               case 6:
                return 'vendredi';
               break;    

             } }
           function print_all($id,$day){//$enseignant['id_ens']  'samedi'
              $classC = new gestionseance();
              $seances = $classC->get_seance_by_ens_id_day($id,$day);
               $data_ens = array(
                  'nom'=>'',
                  'day'=>'',
                  'seance'=>''
                );
               foreach ($seances as $seance): 
                 $clas = new classcont();
                 $classe= $clas-> get_classe($seance['id_classe']);
                 $nom=$classe[0]['nom'];
                 $data_ens['nom']=$nom;
                 $data_ens['day'] = $seance['jour'];
                 $data_ens['seance'] = $seance['heure_debut']."_".$seance['heure_fin'];
               endforeach;
               
               return $data_ens;
          }


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
          $fetch=print_all($enseignant['id_ens'],$day);
          if($fetch['day']!=''):
            $data[]=$fetch;
            $counter = $counter + 1;
          endif;
      }            
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

if(empty($seances['seance'])):
    echo '<br><br>Enseignant : '.$enseignant['nom']."<br>";
     $data = array();
     $counter = 0;
     foreach ($days as $day => $num){
          $fetch=print_all($enseignant['id_ens'],$day);
          if($fetch['day']!=''):
            $data[]=$fetch;
            $day_ens = $data[$counter]['day'];
            $seance = $data[$counter]['seance'];
            $nom = $data[$counter]['nom'];
            $counter = $counter + 1;
            endif;
            print_table($day_ens,$seance,$nom);
     }
else:
    $days_ens = array();
    $days= array();
    for($i=0;$i<count($seances['days']);$i++):
      $days[]=days($seances['days'][$i]);
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
          echo "<td>".print_all($enseignant['id_ens'],days_in($i))['nom']."</td>";   
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
        print_table($day_ens,$seance,$nom);
      }
      
  
endif;
echo "</table><br>";
endforeach;


?> 

</body>


</html>