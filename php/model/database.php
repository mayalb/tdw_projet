<?php 
class database{
    public $conn;
  
    public function connecttodb(){
        try {          
            $this->conn = new PDO('mysql:host=localhost;dbname=tdw_projet','root','');  
           } 
           catch (Exception $e) { 
              die('Erreur: connexion au serveur échouée '.$e);
           }
           return $this->conn ;
    }
    public function selecttable($query) { 
    
        //  $connexionReq=$this->conn->prepare($query)->execute()->fetchAll(); 
        //  return  $connexionReq;

         $connexionReq=$this->conn->prepare($query); 
            $connexionReq->execute();
            $resultat=$connexionReq->fetchAll(); 
        
            return $resultat;
   } 
   public function insert($query,$data) { 

    $this->conn->prepare($query)->execute($data);

} 
public function delete($query) { 

    $this->conn->prepare($query)->execute();

} 
public function update($query) { 

    $this->conn->prepare($query)->execute();

} 



}
