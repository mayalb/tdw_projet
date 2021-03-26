<?php 
 include('./model/classe-model.php');
 //@session_start(); 

class classcont{
    //verifier que le client est connecté pour effectué la 
    public function recupclasses(){
        $req = new classe();
        $resultat = $req->getclasse();   
        return $resultat;
    } 
    public function get_classe($id){
        $req = new classe();
        $resultat = $req->get_classe_by_id($id);   
        return $resultat;

    }
    public function get_classe_primaire(){
        $req = new classe();
        $resultat = $req->get_classe_primaire();   
        return $resultat;

    }
    public function get_classe_moyen(){
        $req = new classe();
        $resultat = $req->get_classe_moyen();   
        return $resultat;

    }
    public function get_classe_secondaire(){
        $req = new classe();
        $resultat = $req->get_classe_secondaire();   
        return $resultat;

    }
      
   
}



