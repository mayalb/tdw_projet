<?php 
 include(('C:\xampp\htdocs\ecole_2\php\model\cycle-moyen-model.php'));
 
class classcyclemoyen{
    //verifier que le client est connecté pour effectué la 
    public function recup_article($type){
        $req = new cyclemoyen();
        $resultat = array_reverse($req->getarticle($type)); 
        $datas=array();
        $i=0;
        foreach ($resultat as $key => $value) {
          if($i<4):
            $resultat[$key]['description']=substr($value['description'], 0,20);
            $resultat[$key]['lien_image']=substr($value['lien_image'],3);
            $datas[]=$resultat[$key];
          else:
            break;
          endif;
          $i++;
        }
        return $datas;
       } 
      
   
}



