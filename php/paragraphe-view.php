 <?php include_once('C:\xampp\htdocs\ecole_2\php\controller\paragraphe.php');?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <link href="../css/sheet.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/paragraphe.css">
        
        <title>Ecole</title> 
    
</head>
<body>
      <?php include("./header.php"); ?>
   <br><h1 class="titre_art">Les paragraphes</h1><br>
    <?php

     $dd = new gestionparagraphe;
     $data = $dd->afficherparagraphe_and_image();

     foreach ($data as  $value) {?>
     <!-- ******************************************************* -->
          
        
        
     <div class="card-image2"><img src=""/></div>  
     <div class="card2">
              <div class="card-body2">
            <div class="card-excerpt2"><?php echo $value['paragraphe'] ;?></div><br>
            <?php 
            if($value['lien_img']!=''):
            ?>
            <div class="card-image2"><img src=" <?php echo $value['lien_img'];?>"/></div>
            <?php 
            endif;
            ?>
            </div>
            </div>

       
       
    
 
          <!-- ******************************************************* -->
 
        
     <?php }
    ?> <br>
      <?php include("./footer.php"); ?>

</body>
</html>