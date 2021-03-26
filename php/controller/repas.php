<?php 
 include('C:\xampp\htdocs\ecole_2\php\model/repas-model.php');
 @session_start(); 


class classrepas{
    //verifier que le client est connecté pour effectué la 
    public function restau(){
    	$d = new repas();
    	return $d->getrepas();
    }  
   public function restau_update($value,$id){
    	$d = new repas();
    	return $d->update($value,$id);
    }  
}

if(isset($_POST['submit'])):

 $df = new classrepas;
 $df->restau_update($_POST['repas'],$_POST['days']);
 header("Location: ../restau-view.php");
endif;