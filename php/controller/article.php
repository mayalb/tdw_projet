<?php 
//  include_once('../model/article-model.php');
 include(('C:\xampp\htdocs\ecole_2\php\model\article-model.php'));
  @session_start();

 class art{

  public function postarticle(){
     //verifier que le client est connecté pour effectué la demande 
if(($_SESSION['mail']) and isset($_SESSION['mdp']))
{
      
     if (isset($_POST['titr']) and isset($_POST['desc']) and isset($_POST['type'])  )
      {      
          //------------récuprer lien de l'image----------
          $dossier="../../images/article/";
          $directionid="";
        
           
          $directionid=$dossier.$_FILES["file1"]["name"];
      

        $extid=strtolower(pathinfo($directionid,PATHINFO_EXTENSION));
        
          $dossier1=$directionid;
            
        
          if ($extid!="jpg" && $extid!="jpeg")
          {
            echo "  
              <script type=\"text/javascript\">
          alert('Veuillez vérifier l'extension du fichier  ');

          </script> ";

          }
         echo $_FILES["file1"]["tmp_name"]."<br>".$dossier;

      move_uploaded_file($_FILES["file1"]["tmp_name"],$directionid);

          //---------------------------------------------

                echo"appel";
                $req = new article();
                $req->ajouter($dossier1);
      }      
      else
       {          	   
        
               echo "<script type='text/javascript'>alert('Veuillez  completez les champs de votre demande pour pouvoir continuer');
                 window.location='../article-view.php';
                </script>";    
       }
    
}
else
{
    echo "<script type='text/javascript'>alert('Vous devez etre connecté pour effectuer cette demande ');
                 window.location='../admin-view.php';
          </script>"; 
          header ('location:../connexion-view.php');
}

   }
   public function recuparticle(){
    $req = new article();
    $resultat = $req->getarticle(); 
    $i=0;
    foreach ($resultat as $res){
    
      $img=$res['lien_image'];
    $res['lien_image']= substr($img,3, strlen($img)); 
    $resultat[$i]['lien_image']= $res['lien_image'];

    //---------- afficher l'audience---------/
      if($res['aud']==1){
          $res['aud']="Enseignants";
      }else{
        if($res['aud']==2){
          $res['aud']="Parents";
        }else{
          if($res['aud']==3){
            $res['aud']="Primaire";
          }else{
            if($res['aud']==4){
              $res['aud']="Moyen";
            }else{
              if($res['aud']==5){
                $res['aud']="Secondaire";
              }else{
                $res['aud']="Tous";
              }
            }
          }
        }
    } 
    $resultat[$i]['aud']= $res['aud'];
    $i++;
    }
    // echo $resultat['lien_image']; 
    return $resultat;
   }
    public function supprimerarticle()
   {
        $req = new article();
        $req->supprimer();   
   
   }

  //  public function modifierarticle()
  //  {
  //       $req = new article();
  //      $req->supprimer();  
  //      $req->ajouter($directionid) 

   
  //  }


 }
 if(isset($_POST['submit'])){

    $classa = new art();
    $classa->postarticle();
  } 
  if(isset($_POST['supprimer'])){

    $classa = new art();
    $classa->supprimerarticle();
  } 

  if(isset($_POST['modifier'])){
    $classa = new art();
    $classa->postarticle();}
  
          ?>