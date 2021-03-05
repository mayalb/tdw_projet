
<?php 
if(isset($_POST['dcnt'])){
    unset ($_SESSION["mail"]);
    unset ($_SESSION["mdp"]);
    session_destroy ( ) ;
    header("Location: ../connexion-view.php ");
}



 ?>