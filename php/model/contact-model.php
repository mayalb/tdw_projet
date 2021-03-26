<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class contact
{
    public function getcontact()
    {
        $co=new database();
        $conn=$co->connecttodb();
        $resultat=$co->selecttable("SELECT * FROM contact");
        return $resultat; 
    }
      
    public function setcontact(){
        $co=new database();
        $conn=$co->connecttodb();
        if($_POST["email"] !=NULL){
            $value=$_POST["email"];
            $sql = "UPDATE contact SET email='".$value."' WHERE id='0'";
            $co->update($sql);
        }
        if($_POST["tel1"] !=NULL){
            $value=$_POST["tel1"];
            $sql = "UPDATE contact SET tel1='".$value."' WHERE id='0'";
            $co->update($sql);
        }
        if($_POST["fix"] !=NULL){
            $value=$_POST["fix"];
            $sql = "UPDATE contact SET fix='".$value."' WHERE id='0'";
            $co->update($sql);   
    }
    if($_POST["adresse"] !=NULL){
        $value=$_POST["adresse"];
        $sql = "UPDATE contact SET adresse='".$value."' WHERE id='0'";
        $co->update($sql);   
}
header ('location:..\contact-view.php');

}
    
}


