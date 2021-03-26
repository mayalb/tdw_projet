<?php include('./controller/contact.php');?>
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

<br><br>
			  <br><br><br>
			  <br>
			
			<center>  
                <?php 
                     $classC = new classcontact();
                     $contacts = $classC->affichercontact();

                      foreach ($contacts as $contact): 
                    ?>
                   
                       <p><strong>Adresse de L'école :</strong><?php echo $contact['adresse']?><br><br><br>
                       <strong>Numéro de téléphone : </strong><?php echo $contact['tel1']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"?><br><br><br>
                       <strong>Numéro du fix : </strong><?php echo $contact['fix']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"?><br><br><br>
                       <strong>L'Email : </strong><?php echo $contact['email']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"?></p>
                      

                     <?php  endforeach; ?>
                </center>
			  

			    <br><br>
			  <br>
	   <?php include("./footer.php"); ?>
</body>


</html>