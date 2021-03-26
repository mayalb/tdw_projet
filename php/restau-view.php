  
<?php 
session_start();
include('./controller/repas.php');

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
        <center><h1>Gestion de Restauration </h1></center>
        <form class="inline" action="./controller/deconnect.php"  method="post"  >
        <input style="width:250px;"  type="submit" name="dcnt" id="dcnt" value="Déconnexion" >
        </form>
        <a  href="page-view.php" class="buy" >Retour à la page d'administration</a>
      
       

   
      
        <div class="from-st">
             
            <form  action="./controller/repas.php" method="POST"  enctype="multipart/form-data" >
             
                <label for="name">Sélectionner un jour </label>
                <select id="getens" name="days">
                   <option selected>Sélectionner...</option>

                   <?php 
                     $classC = new classrepas();
                     $ens = $classC->restau();
                   
                      foreach ($ens as $en): 
                    ?>
              <option value="<?php echo $en['id_repas'] ?>"> <?= $en['jour'] ?></option>
                     <?php endforeach; ?>
                 </select> 
               <input type="text" name="repas" placeholder="repas" >
               <input type="submit" name="submit" value="Confirmer" >
            </form></div>
      
         
        <br><br><br>
           
          <table id="customers" class="customers" style="position:center;">
                <thead style="color:black;">
                    <tr>
                    <th scope="col" rowspan="3"> jour </th>
                    <th scope="col" rowspan="3"> repas </th>
                    </tr>               
                </thead>
                <tbody >
                <?php 
                     $classC = new classrepas();
                     $enss = $classC->restau();

                      foreach ($enss as $e): 
                    ?>
                      <tr>
                       <td><?php echo $e['jour']?></td>
                       <td><?php echo $e['nom_repas']?></td>
                      </tr>

                     <?php  endforeach; ?>
                </tbody>
            </table>
           
          
          
</body>


</html>