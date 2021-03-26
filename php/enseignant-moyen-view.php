<?php include('./controller/enseignant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="../javascript/file.js"></script>


</head>

<body> 
<?php include("./header.php"); ?>

<?php 
                     $name = "";

                     $classC = new enseignant_cont();
                     $ens = $classC->recup_ens_moyen();
                
                  
                      foreach ($ens as $en): 
                        $name = $en[0]['nom'];
                    //     echo $name;
                    //    echo $en[0]['id'];
                      
                      
                     

                    ?>
         
         <br><br><br>
        <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" rowspan="3"> enseignant </th>
                    <th scope="col" rowspan="3"> Heure de travail </th>
                    <th scope="col">Heure de reception </th>
                    <th scope="col">Jour</th>
                
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new enseignant_cont();
                     $enss = $classC->recup_heure_by_id($en[0]['id']);
                   
          
                    
                  
                      foreach ($enss as $e): 
                       
                         
                        //  $ens = $classC->recup_ens__id($en[0]['id']);
                        //  $name = $ens[0]['nom'];
                    ?>
                    <tr>
                       <td><?php echo $name ?></td>
                      <td><?php echo $e['heuretravail'] ?></td>
                    
                      <td><?php echo $e['heurerecep'] ?></td>
                      <td><?php echo $e['jour']?></td>
                    
                  
                      </tr>
              
                     
                     <?php     endforeach; echo "</pre>";?>
                </tbody>
            </table>
            <?php  endforeach;?>
           
           <br><br><br><br><pre>
	   <?php include("./footer.php"); ?>
</body>


</html>