  
<?php 

include('./controller/contact.php');


 ?>


<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">



</head>

<body style="background-image: url('../images/blue.jpg');"><br><br><br>
        <center><h1> Contactez Nous </h1></center>
        

   
      
   
      
         
        <br><br><br>
           
          <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" rowspan="3"> Adresse </th>
                    <th scope="col" rowspan="3"> Télephone 1 </th>
                    <th scope="col" rowspan="3"> Fix </th>
                    <th scope="col" rowspan="3"> Email </th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new classcontact();
                     $contacts = $classC->affichercontact();

                      foreach ($contacts as $contact): 
                    ?>
                      <tr>
                       <td><?php echo $contact['adresse']?></td>
                       <td><?php echo $contact['tel1']?></td>
                       <td><?php echo $contact['fix']?></td>
                       <td><?php echo $contact['email']?></td>
                      </tr>

                     <?php  endforeach; ?>
                </tbody>
            </table>
           
          
          
</body>


</html>