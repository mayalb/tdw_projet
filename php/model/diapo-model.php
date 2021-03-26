<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class diaporama{
  public function insertphoto($path,$i){
     
     $co=new database();
     $conn=$co->connecttodb();
	 
	 if((string)$i=='1'):
	 	
	 	$sql = "UPDATE diapo SET photo1='".$path."',photo2='',photo3='',photo4='' WHERE id='1'";
	    $co->update($sql);
	 endif;
	 if((string)$i=='2'):

	 	$sql= "UPDATE diapo SET photo1='',photo2='".$path."',photo3='',photo4=''  WHERE id='2'";
	    $co->update($sql);
	 endif;
	 if((string)$i=='3'):
	 	$sql= "UPDATE diapo SET photo1='',photo2='',photo3='".$path."',photo4='' WHERE id='3'";
        $co->update($sql);
	 endif;
	 if((string)$i=='4'):
	 	$sql= "UPDATE diapo SET photo1='',photo2='',photo3='',photo4='".$path."' WHERE id='4'";
	    $co->update($sql);
	 endif;
  }

  public function imagesshow(){
  	   $co=new database();
       $conn=$co->connecttodb();
       $resultat=$co->selecttable("SELECT * FROM diapo");
       return $resultat;
  }
}