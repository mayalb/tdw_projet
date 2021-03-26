<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class repas
{
    public function getrepas(){
            $co=new database();
            $conn=$co->connecttodb();
            $resultat=$co->selecttable("SELECT * FROM restau");
            return $resultat;  
    }
    public function update($value,$id){
            $co=new database();
            $conn=$co->connecttodb();
            $sql = "UPDATE restau SET nom_repas='".$value."' WHERE id_repas='$id'";
	        $co->update($sql);  
    }
}
    



