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
    <?php 
                   //On se connecte 
                   $base = new PDO ('mysql:host=localhost; dbname=espacemembre','root', ''); 
                   $liste=$base->prepare("SELECT NumCotis,Prenom,Nom, dateCotis,Mois,Motif,Montant FROM membre INNER JOIN cotisation ON membre.Matricule = cotisation.Matricule");
                   $liste->execute();
                   $Resultat=$liste->fetchAll(PDO::FETCH_ASSOC);
                   
                   
                   

                   ?> 
                   <?php include_once 'haut.php'; ?>
<div class="container is-max-desktop">

<article class="panel is-success">
<p class="panel-heading">LISTE DES COTISATIONS</p>

<table class="table caption-top">
  <caption>
    Liste des cotisations
  </caption>
  
  <thead>
    <tr>
    <th scope="col"><b>NUMERO</b></th>
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
    <td><?= $cotisation['NumCotis']?></td>
    <td><?= $cotisation['Prenom']?></td>
      <td><?= $cotisation['Nom']?></td>
      <td><?= $cotisation['dateCotis']?></td>
      <td><?= $cotisation['Mois']?></td>
      <td><?= $cotisation['Motif']?></td>
      <td><?= $cotisation['Montant']?></td>
      <td><a href="ModifierPaiement.php?NumCotis=<?= $cotisation['NumCotis']?>">Modifier</a></td>
    </tr>
    <?php
    }
    ?> 
  </tbody>
</table>
<a href="http://localhost/ProjetPHP/SaisieCotisation.php">Saisie Cotisation</a><br>
<a href="http://localhost/ProjetPHP/RchercheCotisation.php">Recherche Cotisation</a>
</article>
<?php 
                    $base = new PDO ('mysql:host=localhost; dbname=espacemembre','root', ''); 
                    
                   if (isset ($_GET['NumCotis'])){ 
                   
                   // on nettoie l id envoyé
                   $idcot= strip_tags($_GET['NumCotis']);
                   $liste=$base->prepare("SELECT  NumCotis,dateCotis,Mois,Motif,Montant,Matricule FROM cotisation WHERE NumCotis=:NumCotis");
                   $liste->bindValue(':NumCotis', $idcot, PDO::PARAM_INT);
                   $liste->execute();
                 $Resultat=$liste->fetch();
                   
                   ?>

<article class="panel is-success"id="modifier">
<p class="panel-heading">MODIFIER PAIEMENT</p>

<form  method="post" action="ModifierPaiement.php">
<div class="md-form">
                        
                        <input type="number" name="Numco"  value="<?= $Resultat['NumCotis']?>" class="form-control" required>
                        <label for="Date">NumeroCo</label>
                      </div>
                      <div class="md-form">
                        
                        <input type="date" name="datecotise" value="<?= $Resultat['dateCotis']?>" class="form-control" required>
                        <label for="Date">Date cotisation</label>
                      </div>
            
                      <div class="md-form">
                      <label for="Mois">Mois</label>
                      <select class="select form-control" name="mois" required>
                      <label for="Mois">Mois</label>
                      <option ></option>
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
                    
                    <input type="number" name="montant" value="<?= $Resultat['Montant']?>"  class="form-control" required>
                    <label for="montant">Montant</label>
                  </div>
        
            
                      <div class="md-form">
                    
                        <input type="number" name="matricule" value="<?= $Resultat['Matricule']?>"  class="form-control" required>
                        <label for="matricule">Matricule</label>
                      </div>
            
                      <div class="text-center mt-4">
                        <button type="submit" name="valider" class="btn btn-success"  value="valider">Modifier</button>
                        <button type="reset" name="annuler" class="btn btn-danger"  value="annuler">Annuler</button>
                      </div>
                    </form>
                    <a href="http://localhost/ProjetPHP/ListesCotisation.php">La liste des cotisations</a>
</article>
<?php 
                   }
                     
                   $base = new PDO ('mysql:host=localhost; dbname=espacemembre','root', '');
                   if (isset ($_POST['valider'])){ 
                   
 if(!empty($_POST['datecotise']) AND !empty($_POST['Numco']) AND !empty($_POST['mois']) AND !empty($_POST['motif']) AND !empty($_POST['matricule']));
                  $datecoti =strip_tags( $_POST['datecotise']); 
                $mois=strip_tags( $_POST['mois']);
                $motifs=strip_tags( $_POST['motif']);
                $montant=strip_tags( $_POST['montant']);
                $matricule=strip_tags( $_POST['matricule']);
                $num=strip_tags($_POST['Numco']);

                $sql = "UPDATE cotisation SET dateCotis=?,Mois=?,Motif=?,Montant=?,Matricule=? WHERE NumCotis=?";

                // on prepare la requete
               $query = $base->prepare($sql);
        
              
        
               // on "accroche" les parametres
            //    $query->bindValue(':Numco',  $num, PDO::PARAM_INT);
            //    $query->bindValue(':datecotise', $datecoti, PDO::PARAM_STMT);
            //    $query->bindValue(':mois', $mois, PDO::PARAM_STR);
            //    $query->bindValue(':motif', $motifs, PDO::PARAM_STR);
            //    $query->bindValue(':montant', $montant, PDO::PARAM_INT);
            //    $query->bindValue(':matricule', $matricule, PDO::PARAM_INT);
                //  on excute la requete
                $query->execute(array($datecoti,$mois,$motifs,$montant,$matricule,$num));
                
               if ($query){ echo '<article class="message is-success">
                <div class="message-header">
                  <p>modification effectue....</p>
                  <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                
                  </div>
              </article>';
                 
               }else {
                echo 'erreur....';
               }
                    $base=null;
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