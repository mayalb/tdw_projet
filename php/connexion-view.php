<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
</head>

<body>

<form method="POST" form enctype="multipart/form-data"  action="./controller/connexion.php">

   <h2 >Connectez-vous</h2>

  <h4 >Nom utilisateur</h4>

    <input id="user" type="text"  name="email" placeholder="Nom utilisateur" required="">
  
  <br>
    <h4 class="lab">Mot de passe</h4>
    <input id="pass" type="text"  name="password" placeholder="Mot de passe" required="">
  
  <br>
  <button type="submit" name="submit" id="submit" >Se connecter</button>
  </form>





</body>


</html>
