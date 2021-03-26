<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class cyclemoyen
{
    public function getarticle($type){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM article where aud='$type' or aud='6'";
       $resultat= $co->selecttable($query);
     
        return $resultat;
    }
}


