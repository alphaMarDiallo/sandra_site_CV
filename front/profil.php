<?php require('connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <!-- <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'> -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
        <link href="https://fonts.googleapis.com/css?family=|Gentium+Book+BasicSource+Serif+Pro" rel="stylesheet">
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="css/style1.css">
        <title>Objectifs pro.</title>
        <?php
        $resultat = $pdoCV->query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
        ?>
        <!--script affichage de l'heure!-->
        <SCRIPT LANGUAGE="JavaScript">
            function HeureCheckEJS()
            {
                krucial = new Date;
                heure = krucial.getHours();
                min = krucial.getMinutes();
                sec = krucial.getSeconds();
                jour = krucial.getDate();
                mois = krucial.getMonth() + 1;
                annee = krucial.getFullYear();
                if (sec < 10)
                    sec0 = "0";
                else
                    sec0 = "";
                if (min < 10)
                    min0 = "0";
                else
                    min0 = "";
                if (heure < 10)
                    heure0 = "0";
                else
                    heure0 = "";
                DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
                which = DinaHeure;
                if (document.getElementById) {
                    document.getElementById("ejs_heure").innerHTML = which;
                }
                setTimeout("HeureCheckEJS()", 1000);
            }
            window.onload = HeureCheckEJS;
        </SCRIPT>
    </head>
    <body>
        <?php include("inc/include_nav.php"); ?>
        <div class="meny-arrow"></div>
        <div class="contents">
            <div class="box">
                <!--                <h1>Sandra HÉRISSON</h1>-->
                <h1><?= $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom']; ?></h1>
                <br>
                <h2>Mes objectifs pro.</h2>
                <br>
                <br>
                <body id="top">
               <main>
                 <div class="appareil">
                   <div class="bandes">
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                     <div></div>
                   </div>
                   <div class="objectif"></div>
                   <div class="lentille"></div>
                   <div class="souslentille"></div>
                   <div class="pointe"></div>
                   <div class="flash"></div>
                   <div class="fente"></div>
                 </div>
                 <div class="photo"><div class="cache"></div></div>
                 <!-- <div class="photo"><div class="cache"></div></div> -->
               </main>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

            </div>
        </div>
        <script src="js/meny.js"></script>
        <script>
            var meny = Meny.create({
                menuElement: document.querySelector('.meny'),
                contentsElement: document.querySelector('.contents'),
                // [optional] alignement du menu (top/right/bottom/left)
                position: Meny.getQuery().p || 'left',
                // [optional] hauteur du menu (pour la position top ou bottom)
                height: 200,
                // [optional] largeur du menu (pour la position left ou right)
                width: 260,
                // [optional] distance de d�clenchement du menu par rapport au menu
                threshold: 40,
                // [optional] utilisation des mouvement de la souris pour l'ouverture ou la fermeture
                mouse: true,
                // [optional] utilisation de l'approche
                touch: true
            });

            if (Meny.getQuery().u && Meny.getQuery().u.match(/^http/gi)) {
                var contents = document.querySelector('.contents');
                contents.style.padding = '0px';
                contents.innerHTML = '<div class="cover"></div><iframe src="' + Meny.getQuery().u + '" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
            }
        </script>

        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/index2.js"></script>
    </body>
</html>
