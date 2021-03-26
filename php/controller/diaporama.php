<?php 
include(('C:\xampp\htdocs\ecole_2\php\model\diapo-model.php'));
 @session_start(); 

class classdiaporama{
    //verifier que le client est connecté pour effectué la 
   public function insertintobase($path,$i){
       $req = new diaporama();
       return $req->insertphoto($path,$i);
   }
   public function postamg($file){
			    
			     if (isset($_POST['submit'])){    
			          
			     	foreach ($_FILES as $key => $value) {
			     		if($_FILES[$key]['name']!=""){
                         
                   			 $dossier="../../images/diapo/";
					         $directionid="";
					         $directionid=$dossier.$_FILES[$key]["name"];
					         $extid=strtolower(pathinfo($directionid,PATHINFO_EXTENSION));
					         $dossier1=$directionid;
					            
					         if ($extid!="jpg" && $extid!="jpeg"){
					            echo "<script type=\"text/javascript\">
					            alert('Veuillez vérifier l'extension du fichier  ');</script> ";
					          }
					         
					         move_uploaded_file($_FILES[$key]["tmp_name"],$directionid);
					         if($key=='one'):
					           $this->insertintobase($directionid,'1');
					         endif;
					         if($key=='two'):
					           $this->insertintobase($directionid,'2');
					         endif;
					         if($key=='three'):
					           $this->insertintobase($directionid,'3');
					         endif;
					         if($key=='four'):
					           $this->insertintobase($directionid,'4');
					         endif;

					     }

			         }
                 }

	    }
	 public  function echo_images(){
	 	$req = new diaporama();
        return $req->imagesshow();
        
	 }
}

$dd = new classdiaporama();

if(isset($_POST['submit'])): 
	  $dd->postamg($_FILES); 
	  header("Location: ../diapo-view.php");
endif;