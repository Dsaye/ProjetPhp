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
    <!-- SELECT Prenom,Nom, dateCotis,Mois FROM membre INNER JOIN cotisation ON membre.Matricule = cotisation.Matricule -->
    <?php include_once 'haut.php'; ?>
<div class="container is-max-desktop">
    <form method="post" action="">
<div class="level-item">
      <div class="field has-addons">
        <p class="control">
          <input class="input" name="rech" type="text" placeholder="recherche" required>
        </p>
        <p class="control">
          <button class="button" type="submit" name="valider" value="valider">
            Recherche
          </button>
        </p>
      </div>
    </div>
    </form>
    <?php 
                   //On se connecte 
                   $base = new PDO ('mysql:host=localhost; dbname=espacemembre','root', ''); 
                   if (isset ($_POST['valider'])){ 
                    if(!empty($_POST['rech'])){
                        $chercher=htmlspecialchars( $_POST['rech']);
                   $liste=$base->prepare("SELECT Prenom,Nom, dateCotis,Mois,Motif,Montant FROM membre INNER JOIN cotisation ON membre.Matricule = cotisation.Matricule WHERE Mois='$chercher'");
                   $liste->execute();
                   $Resultat=$liste->fetchAll(PDO::FETCH_ASSOC);
                   
                   
               
                   

                   ?> 
<article class="panel is-success">
<p class="panel-heading">LISTE DES COTISATIONS DU MOIS: <?= $chercher ?></p>
<table class="table caption-top">
  <caption>
    Liste des cotisations
  </caption>
  <thead>
    <tr>
      <th scope="col"><b>PRENOM</b></th>
      <th scope="col"><b>NOM</th>
      <th scope="col"><b>DATE COTISATION</th>
      <th scope="col"><b>MOIS</th>
      <th scope="col"><b>MOTIF</th>
      <th scope="col"><b>MONTANT</th>
    </tr>
  </thead>
  <tbody>
      <?php   foreach($Resultat as $cotisation){
          ?>
    <tr>
    <td><?= $cotisation['Prenom']?></td>
      <td><?= $cotisation['Nom']?></td>
      <td><?= $cotisation['dateCotis']?></td>
      <td><?= $cotisation['Mois']?></td>
      <td><?= $cotisation['Motif']?></td>
      <td><?= $cotisation['Montant']?></td>
    </tr>
    <?php
    }
} }
    ?> 
  </tbody>
</table>
<a href="http://localhost/ProjetPHP/ListesCotisation.php">La liste complete des cotisations</a>
                    </article>
   
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