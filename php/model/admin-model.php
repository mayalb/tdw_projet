<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class admin
{ 
   
    public function get_admins(){
        $co=new database();
        $conn=$co->connecttodb();
        $select1="SELECT * FROM utilisateur WHERE type='0' ";
        $res=$co->selecttable($select1);
         return $res; 
    }
    public function supprimeradmin(){
        $co=new database();
        $conn=$co->connecttodb(); 
       
          $id=$_POST['id'];
        
         $sql = "DELETE FROM utilisateur where id='$id'";     
         $co->delete($sql);
         
         header ('location:..\util-view.php');
    }
}
    



