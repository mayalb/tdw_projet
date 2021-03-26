<!DOCTYPE html>
<?php

include("./controller/diaporama.php");
include("./controller/article.php");
?>
<html >
   
    <head>

<meta charset="utf-8">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/sheet.css">
<link rel="stylesheet" type="text/css" href="../css/style_headers.css">
<link rel="stylesheet" type="text/css" href="../css/article_style.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<style>
  div.cadre-article{
	display: inline-block;
	height: 420px;
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
  }
</style>
</head>
    <body>
    
   <div class="row-a">
         <img class="logo" src="../images/logo.jpg" class="logo" style="height: 120px;width: 180px;">
           <div class="socialmedia">
           <a href="https://www.facebook.com" class="fa fa-facebook" target="_blank"></a>
           <a href="https://www.google.com" class="fa fa-google" target="_blank"></a>
           <a href="https://www.LinkedIn.com" class="fa fa-linkedin" target="_blank"></a>
           <a href="https://www.instagram.com" class="fa fa-instagram" target="_blank"></a>
           </div>
      </div>    

  
      <?php
        $images = new classdiaporama();
        $data = $images->echo_images();
       
        $i=1;
        $re= "";
         echo '<center>  <div class="slider">
               <div class="show">';
        foreach ($data as $key => $value) {
          
          
        
           $v = str_replace("../.", ".", $value[$i]);
          
            if($i==1):
             $re = $v;
             echo '
                <div class="slide" >
                  <img src="'.$v.'" >
                </div>
             ';
           endif;
           if($i==2):
            
            echo '
              <div class="slide" >
                <img src="'.$v.'" >
              </div>
           ';
           endif;
           if($i==3): 
          
            echo '
              <div class="slide" >
                <img src="'.$v.'" >
              </div>
           ';
           endif;
           if($i==4):
            
            echo '
              <div class="slide" >
                <img src="'.$v.'" >
              </div>
           ';
           endif;
           
          $i++;
       } 
       
        ?>
      


      </div> </center>
    <br><br>
       <nav>
      
          <ul class="nav" id="nav">
          <li class="list-item-header"><a class="link-header" href="cycleprim-view.php" >Acceuil</a> </li>
          <li class="list-item-header"><a class="link-header" href="paragraphe-view.php">Présentation </a></li>
         
          <div class="dropdown1">
    <button class="dropbtn1">Cycles
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
      <li><a class="link-header" href="cycleprim-view.php">Cycle primaire</a></li>
      <li><a class="link-header" href="cyclemoyen-view.php">Cycle moyen</a></li>
      <li><a class="link-header" href="cyclesecondaire-view.php">Cycle secondaire</a></li>
      
    </div>
  </div>

          <li  class="list-item-header"><a class="link-header" href="espace_eleve-view.php">Espace élève</a></li> 
          <li class="list-item-header" ><a class="link-header" href="espace_parent-view.php">Espace Parent</a></li> 
          <li  class="list-item-header"><a class="link-header" href="contact-public-view.php">Contact</a></li> 
         </ul>
     
        </nav>

        <br><br>
 <h1 class="titre_art">Nos actualités</h1>

            <br><br>


      <?php 
        $act = new art();
        $data = $act->recuparticle_now_acceuil(8);
        $ids = [];
       $i=0;
        foreach ($data as  $value) {
         
        
           
          ?>
       <div class="cadre-article"  >
          <center> <h3><?php echo $value['titre']?></H3> </center>
          <?php echo $value['description']?><br>
          <img src="<?php echo $value['lien_image']?>" alt="Girl in a jacket" width="500" height="600">
          <center>   <a style="color: #00121b;font-weight: lighter;text-decoration: underline;" href='./article-info-view.php?id=<?php echo $value['id'];?>'>Afficher la suite ...</a></center>
           </div>
            
 
         
         
        
    <?php }  ?>


    <br><br><hr><br> 
    <strong><h1 class="titre_art">Liens aux articles</h1></strong><br>
       

       <table>
        <tr>
    <th>Id de l'article</th>
    <th>Lien vers l'article</th>
  </tr>
    <?php
       
       $act = new art();
       $data = $act->recuparticle_now_acceuil_all($ids);
      
       foreach ($data as  $value) { ?>

      
  <tr>
    <th> <?php echo $value['id'];?></th>
    <th>   <a href='./article-info-view.php?id=<?php echo $value['id'];?>'><?php echo $value['titre'];?></a>
</th>
  </tr>


      <?php }
      ?>

      </table>
<br><br>
  
  <?php include("./footer.php"); ?>

  
    </body>    
</html>
