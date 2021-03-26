<?php include("./controller/article.php");?>
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

        <div >
			    <?php
			     $id = $_GET['id'];
			     $act = new art();
			     $value = $act->recuparticle_by_id($id);
			     
			     $image = "../".$value['lien_image'];
                ?>
			
			<center> <h1> <?php echo  $value['titre']?></h1></center>
			  

			    <br><br>
			    <p><strong>Description :</strong><?php echo $value['description'];?></p>
				<br><center><img src='<?php echo  $image?>' width='50%' height='20%'/></center><br>

   
			   
	   </div><br>
	   <?php include("./footer.php"); ?>
</body>


</html>