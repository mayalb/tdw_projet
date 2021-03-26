<?php include('./controller/repas.php');?>
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


         
         <br><br><br>
         <center>
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
            </center>
           <br><br><br><br><pre>
	   <?php include("./footer.php"); ?>
</body>


</html>