<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" integrity="sha512-IgmDkwzs96t4SrChW29No3NXBIBv8baW490zk5aXvhCD8vuZM3yUSkbyTBcXohkySecyzIrUwiF/qV0cuPcL3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css"rel="stylesheet"/>
    <!-- Animate CSS -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  </head>

<body>
<?php include_once 'haut.php'; ?>
<div class="container is-max-desktop">
<article class="panel is-success">
<p class="panel-heading">AJOUTER MEMBRE</p>
<form  method="post" action="SaisieMembre.php">
                      <div class="md-form">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="Nom"  class="form-control" required>
                        <label for="nom">Nom</label>
                      </div>
            
                      <div class="md-form">
                      <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" name="Prenom"  class="form-control" required>
                        <label for="prenom">Prénom</label>
                      </div>
            
                      <div class="md-form">
                      <i class="fas fa-phone prefix grey-text"></i>
                        <input type="text" name="Tel"  class="form-control" required>
                        <label for="tel">Tel</label>
                      </div>
            
                      <div class="md-form">
                        <i class="fas fa-pencil-alt prefix grey-text"></i>
                        <textarea name="Adresse" class="form-control md-textarea" rows="3" required></textarea>
                        <label for="adresse">Adresse</label>
                      </div>
            
                      <div class="text-center mt-4">
                        <button type="submit" name="ajouter" class="btn btn-light-blue"  value="ajouter">Ajouter Membre</button>
                        <button type="reset" name="annuler" class="btn btn-danger"  value="annuler">Annuler</button>
                      </div>
                    </form>
                    </article>
                    <?php 
                   
if (isset ($_POST['ajouter'])){ 
//On récupère les valeurs entrées par l'utilisateur :

  if(!empty($_POST['Nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['Tel']) AND !empty($_POST['Adresse'])){
$nom =htmlspecialchars( $_POST['Nom']); 
$prenom=htmlspecialchars( $_POST['Prenom']);
$tel=htmlspecialchars( $_POST['Tel']);
$adresse=htmlspecialchars( $_POST['Adresse']); 
//On se connecte 
$base = new PDO ('mysql:host=localhost; dbname=espacemembre','root', ''); 
$tele=$base->prepare("SELECT* FROM membre WHERE Tel=?");
$tele->execute(array($tel));
$telexiste=$tele->rowCount();
if($telexiste==0){

//On prépare la commande sql d'insertion 
$sql =$base->prepare("INSERT INTO membre (Matricule,Nom,Prenom,Adresse,Tel)  VALUES (?,?,?,?,?)"); 
$sql->execute(array(null,$nom,$prenom,$adresse,$tel));

echo" Membre bien ajouté";
}else {
  echo" membre existe deja";
}
$base=null;
// on ferme la connexion 
}


// $base=null;
} 
?> 
</div>
</body>
  <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
</html>