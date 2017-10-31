<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php
// gestion des contenus de la BDD
// Insertion des compétences
if(isset($_POST['competence'])) {// Si on a  posté une nouvelle compétence.
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){// si compétence n'est aps vide.
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdoCV->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
        header("location: competences.php");// Pour revenir sur la page.
        exit();
    }// Ferme le if(!empty)
}// ferme le if(isset)du formulaire

// Suppréssion d'une compétence
if(isset($_GET['id_competence'])) {// ferme le if(isset) // Ici on récupère la competence par son id_ ds l'URL
    $efface = $_GET['id_competence'];
    $resultat = "DELETE FROM t_competences WHERE id_competence ='$efface'";
    $pdoCV->query($resultat);
    header("location: competences.php");
}// Ferme le if(isset)

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin : <?= $ligne_utilisateur['pseudo']; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_admin.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- nav en include -->
    <?php include("include_nav.php"); ?>
    <div class="alert alert-info center" role="alert">
        <h3>Admin <?= $ligne_utilisateur['prenom']; ?></h3>
    </div>
    <?php
    $resultat = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
    $resultat -> execute();
    $nbr_competences = $resultat->rowCount();
    //$ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <!-- On rows -->
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">compétences</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Compétences</th>
                                        <th>Niveaux</th>
                                        <th>Modification</th>
                                        <th>Suppression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while($ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                                            <td><?php echo $ligne_competence['competence'] ;?></td>
                                            <td><?php echo $ligne_competence['c_niveau']; ?></td>
                                            <td><a href="competence.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">modifier</a></td>
                                            <td><a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">supprimer</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="competence">Compétence</label>
                                <input type="text" name="competence" value="<?php echo ($ligne_competence['competence']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="c_niveau">Niveau</label>
                                <input type="number" name="c_niveau" value="<?php echo ($ligne_competence['c_niveau']); ?>">
                            </div>
                            <input hidden name="id_competence" value="<?php echo ($ligne_competence['id_competence']); ?>">
                            <input type="submit" value="mettre à jour">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php
        $resultat = $pdoCV -> query("SELECT * FROM t_competences");
        $ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="row">

            <!-- <footer>
            <div class="container">
            <div class="row">
            <div class="col-md-12">
            <div class="panel-footer"></div>
        </div>
    </div>
</div>
</footer> -->
<footer class="footer">
    <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
    </div>
</footer>
</div>

</div><!--fermeture container-->


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
