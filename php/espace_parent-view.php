<!DOCTYPE html>
<?php

include("./controller/parent.php");

?>
<html >
    <head>
        <meta charset="UTF-8">
        <link href="../css/sheet.css" rel="stylesheet" />
        
       
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/article_style.css">
        <link rel="stylesheet" type="text/css" href="../css/espace_eleve.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

        <title>Ecole de formation TDW</title> 
        
    </head>
    <body >
    <?php include("./header.php"); ?>
  
    <div class="lien_connexion">
     <a href='./profil-parent-view.php' class="link_conn">Se connecter</a>
   </div>
          
          <div class="articles">
     
        
        <?php
            $check = new classparent();
            $article = $check->recup_article(2);
            foreach ($article as  $value) {?>
         <div class="cadre-article"  >
          <center> <h3><?php echo $value['titre']?></H3> </center>
          <?php echo $value['description']?><br>
          <img src="<?php echo $value['lien_image']?>" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./article-info-view.php?id=<?php echo $value['id'];?>'>Afficher la suite ...</a></center>
           </div>
          
           
     
         
         
         
         
        
         <?php }  ?>
         
         
      <br><br>
    

      </div>
    

      <?php include("./footer.php"); ?>
  
    </body>    
</html>
