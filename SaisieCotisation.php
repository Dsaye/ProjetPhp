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
<p class="panel-heading">COTISATION</p>
<form  method="post" action="SaisieCotisation.php">
                      <div class="md-form">
                        
                        <input type="date" name="datecotise"  class="form-control" required>
                        <label for="Date">Date cotisation</label>
                      </div>
            
                      <div class="md-form">
                      <label for="Mois">Mois</label>
                      <select class="select form-control" name="mois"  required>
                      <label for="Mois">Mois</label>
                      <option value=""></option>
      <option value="janvier">Janvier</option>
      <option value="fevrier">fevrier</option>
      <option value="mars">mars</option>
      <option value="avril">avril</option>
      <option value="mai">mai</option>
      <option value="juin">juin</option>
      <option value="juillet">juillet</option>
      <option value="aout">aout</option>
      <option value="septembre">septembre</option>
      <option value="octobre">octobre</option>
      <option value="novembre">novembre</option>
      <option value="decembre">decembre</option>
    </select>
                        
                      </div>
            
                      <div class="md-form">
                      
                      <select class="select form-control" name="motif"  required>
                      <option value=""></option>
      <option value="Mensualité">Mensualité</option>
      <option value="Inscription">Inscription</option>
</select>
                        <label for="motif">Motif</label>
                      </div>
                      <div class="md-form">
                    
                    <input type="number" name="montant"  class="form-control" required>
                    <label for="montant">Montant</label>
                  </div>
        
            
                      <div class="md-form">
                    
                        <input type="number" name="matricule"  class="form-control" required>
                        <label for="matricule">Matricule</label>
                      </div>
            
                      <div class="text-center mt-4">
                        <button type="submit" name="valider" class="btn btn-success"  value="valider">Valider</button>
                        <button type="reset" name="annuler" class="btn btn-danger"  value="annuler">Annuler</button>
                      </div>
                    </form>
                    <a href="http://localhost/ProjetPHP/ListesCotisation.php">La liste des cotisations</a>
</article>
<?php 
                    $base = new PDO ('mysql:host=localhost; dbname=espacemembre','root', ''); 
                   if (isset ($_POST['valider'])){ 
                   //On récupère les valeurs entrées par l'utilisateur :
                   
                     if(!empty($_POST['datecotise']) AND !empty($_POST['mois']) AND !empty($_POST['motif']) AND !empty($_POST['matricule'])){
                   $datecoti =htmlspecialchars( $_POST['datecotise']); 
                   $mois=htmlspecialchars( $_POST['mois']);
                   $motifs=htmlspecialchars( $_POST['motif']);
                   $montant=htmlspecialchars( $_POST['montant']);
                   $matricule=htmlspecialchars( $_POST['matricule']);
                   //On se connecte 
                  
                //    $numco=$base->prepare("SELECT* FROM cotisation WHERE numcoti=?");
                //    $numco->execute(array($numcotise));
                //    $numcoexiste=$numco->rowCount();
                //    if($telexiste==0){
                   
                   //On prépare la commande sql d'insertion 
                   $sql =$base->prepare("INSERT INTO cotisation (NumCotis,DateCotis,Mois,Motif,Montant,Matricule)  VALUES (?,?,?,?,?,?)"); 
                   $sql->execute(array(null,$datecoti,$mois,$motifs,$montant,$matricule));
                   
                   echo" cotisation enregistre";
                //    }else {
                //      echo" Paiement deja effectue";
                //    }
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