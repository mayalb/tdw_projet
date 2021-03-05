<?php 

include_once('C:\xampp\htdocs\ecole_2\php\model\database.php');
class paragraphe
{
    
    public function ajouter($directionid)
    {
      $co=new database();
      $conn=$co->connecttodb();
      
       
         
          if ( isset($_POST["submitall"]))
          {
            if($directionid ==""){
                $sql = "INSERT INTO  paragraphe(paragraphe) VALUES (?)";
                $data=[$_POST['paragraphe']];
                $co->insert($sql,$data);
            
              //  $conn->prepare($sql)->execute([$_POST['paragraphe']]);

            }else{
                $sql = "INSERT INTO  paragraphe(paragraphe,lien_img) VALUES (?,?)";
                $data=[$_POST['paragraphe'],$directionid];
                $co->insert($sql,$data);
    
            }
              
           
             
          }
                
          header ('location:..\presentation-view.php');
      

    }
    public function getparagraphe(){
      $co=new database();
      $conn=$co->connecttodb();
      $query="SELECT * FROM paragraphe";
      $resultat= $co->selecttable($query);
    
      return $resultat;
    }

    public function get_un_parag(){
      $co=new database();
      $conn=$co->connecttodb();
      if(isset($_POST['modifier'])){
      
        $id=$_POST['id'];
         echo $id;
        $select1="SELECT * FROM paragraphe WHERE id='$id' ";
        $res=$co->selecttable($select1);
       
       
       return $res[0]['paragraphe'];   
      }
     
    
    }
    public function modifier(){}
  
    public function supprimer(){
      $co=new database();
      $conn=$co->connecttodb(); 
      if ( isset($_POST["supprimer"]) or isset($_POST["modifier"]) )
      {
        $id=$_POST['id'];

        $sql = "DELETE FROM paragraphe where id='$id'";     
       $co->delete($sql);
       
      }                
             
      header ('location:..\presentation-view.php');
    }
}
    



