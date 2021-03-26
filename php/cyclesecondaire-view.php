<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">

       
      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/sheet.css">

<link rel="stylesheet" type="text/css" href="../css/article_style.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        

        <title>Cycle Secondaire</title>
        <style> 
        div.cadre-article{
	display: inline-block;
	height: 470px;
	width: 380px;
	background: #D2D2D2;
	color: black;
	padding: 7px;
	margin: 5px;
  }
  div.cadre-article img{
	border-radius: 5px;
	height: 320px;
	width: 100%;
	margin-left: auto;
	margin-right: auto;
  }</style>
    </head>
    <body >
    <?php include("./header.php"); ?>
       <!-- Emploi du temps -->
       <br ><br >
       <div class="cadre-article"  >
          <center> <h3>Emplois du temps</H3> </center>
          Consulter les emplois du temps du cycle.<br>
          <img src="../images/edt.jpg" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./edt-secondaire-view.php'>Consulter ...</a></center>
           </div>
           <div class="cadre-article"  >
          <center> <h3>Enseignants</H3> </center>
          toutes informations des enseignants du cycle.<br>
          <img src="../images/teach.jpg" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./enseignant-secondaire-view.php'>Consulter ...</a></center>
           </div>
           <div class="cadre-article"  >
          <center> <h3>Informations Pratiques</H3> </center>
          Consulter les informations pratiques du cycle.<br>
          <img src="../images/edt1.jpg" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./info-pratique-secondaire-view.php'>Consulter ...</a></center>
           </div>
           <div class="cadre-article"  >
          <center> <h3>Restauration</H3> </center>
          Consulter les repas que notre école offre.<br>
          <img src="../images/food.jpg" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./restau-secondaire-view.php'>Consulter ...</a></center>
          </div>

    <?php
    
            include("./controller/cycle-secondaire.php");
            $check= new classcyclesecondaire();
            $article = $check->recup_article(5);
            foreach ($article as  $value) {?>
        
        <div class="cadre-article"  >
          <center> <h3><?php echo $value['titre']?></H3> </center>
          <?php echo $value['description']?><br>
          <img src="<?php echo $value['lien_image']?>" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./article-info-view.php?id=<?php echo $value['id'];?>'>Afficher la suite ...</a></center>
           </div>
           
     
         
             


     
         
         
        
         <?php }  ?>
      
         <?php include("./footer.php"); ?>
    </body>
    
 
          
           
</html>
