  
<?php 
session_start();
include('./controller/contact.php');

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

<body style="background-image: url('../images/blue.jpg');"><br><br><br>
        <center><h1>Gestion de Contact </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" style="color:black;" >Retour à la page d'administration</a>
      
       

   
      
        <div class="from-st">
             
            <form  action="./controller/contact.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name">Adresse de l'école </label>
                <input type="text" name="adresse" placeholder="Adresse"> 
                <br>
                <label for="name">Téléphone 1 </label>
                <input type="text" name="tel1" placeholder="Télephone"> 
                <br>
                <label for="name">Fix</label>
                <input type="text" name="fix" placeholder="Numéro du fix"> 
                <br>
                <label for="name">Email </label>
                <input type="text" name="email" placeholder="smart@gmail.com"> 
                <br>
               
               <input type="submit" name="submit" value="Sauvegarder" >
            </form></div>
      
         
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