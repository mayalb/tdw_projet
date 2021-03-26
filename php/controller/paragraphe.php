<?php 

 //require_once('../model/paragraphe-model.php');
 include('C:\xampp\htdocs\ecole_2\php\model\paragraphe-model.php');
//  session_start();
 class gestionparagraphe{
   public function ajouterparag(){
     //verifier que le client est connecté pour effectué la demande 
     
     
     if (isset($_POST['submitall']) )
      {      
          //------------récuprer lien de l'image----------
          $dossier="../../images/paragraphe/";
          $directionid="";
        
           
          $directionid=$dossier.$_FILES["file2"]["name"];
      

        $extid=strtolower(pathinfo($directionid,PATHINFO_EXTENSION));
        
          $dossier1=$directionid;
            
        
          if ($extid!="jpg" && $extid!="jpeg")
          {
            echo "  
              <script type=\"text/javascript\">
          alert('Veuillez vérifier l'extension du fichier  ');

          </script> ";

          }
         echo $_FILES["file2"]["tmp_name"]."<br>".$dossier;

      move_uploaded_file($_FILES["file2"]["tmp_name"],$directionid);
           
           
                $req = new paragraphe();
                $req->ajouter($dossier1);
        }
      else
       {          	   
        
               echo "<script type='text/javascript'>alert('Veuillez  completez les champs de votre demande pour pouvoir continuer');
                 window.location='../admin-view.php';
                </script>";    
       }
    
  


   }

   public function afficherparagraphe(){
    $req = new paragraphe();
    $resultat = $req->getparagraphe();
    return $resultat;
   }
  

    public function afficherparagraphe_and_image(){
      $data = $this->afficherparagraphe();
      foreach ($data as  $key=>$value) {
        if(strlen($value['lien_img'])>0):
            if(is_file(substr($value['lien_img'],3)) && file_exists(substr($value['lien_img'],3))):
              $data[$key]['lien_img']=substr($value['lien_img'],3);
            else:
              unset($data[$key]);
            endif;
        else:
            unset($data[$key]);
        endif;

      }
      

      return $data;
   }


   public function supprimerparagraphe()
   {
        $req = new paragraphe();
        $req->supprimer();   
   
   }
   public function get_paragraphe()
   {
        $req = new paragraphe();
       $res= $req->get_un_parag();  
       echo $res; 
        return $res;
        
       
      
   
   }
 }
 if(isset($_POST['supprimer'])){
  $classa = new gestionparagraphe();
  $classa->supprimerparagraphe();
}
if(isset($_POST['submitall'])){
  $classa = new gestionparagraphe();
  $classa->ajouterparag();
}
if(isset($_POST['modifier'])){
  $classa = new gestionparagraphe();
   $retc = $classa->get_paragraphe();
   $classa->supprimerparagraphe();
   header ('location:..\presentation-view.php?para='.$retc);


}
