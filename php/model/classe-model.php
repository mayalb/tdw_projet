<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class classe
{
    public function getclasse()
    {
            $co=new database();
            $conn=$co->connecttodb();
            $query="SELECT * FROM classe";
           $resultat= $co->selecttable($query);
            return $resultat;
              
    }
    public function get_classe_by_id($id){
        $co=new database();
        $conn=$co->connecttodb();
        $query="SELECT * FROM classe WHERE id='$id'";
        $resultat=$co->selecttable($query);
         return $resultat;
    }
    public function ajouter(){}
    public function supprimer(){}
}
    



