<?php include_once('traitement.php'); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">
    <title>Grenoble Sympa</title>
    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap-4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="lib/bootstrap-4.1.1/js/bootstrap.min.js"></script>
    <!-- COMBO BOX -->
    <link rel="stylesheet" type="text/css" href="lib/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="lib/easyui/themes/icon.css">
    <script type="text/javascript" src="lib/easyui/jquery.easyui.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <span class="navbar-brand span-titre">Grenoble Sympa</span>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto" style="margin-bottom:none;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="guide.php">Guide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- CORPS PAGE -->
    <section class="section-guide">
        <div class="container-fluid">
            <div class="row">
                <main class="main">
                    <div id="map"></div>
    
                    <div id="right-panel">
                        <!-- DEPART -->
                        <select id="start" class="easyui-combobox" name="state" label="Départ :" labelPosition="top" style="width:100%;" required>
                            <option value="" selected> </option>
                            <?php
                                // Affichage tableau 2 dimmensions :
                                foreach($result as $ligne){
                                    // Lecture de chaque tableau de chaque ligne
                                    foreach($ligne as $cle=>$valeur){
                                        if ($cle == 0) {
                                            echo '<option value="'. $valeur .' Grenoble, FR">'. $valeur .'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
    
                        <!-- ARRIVER -->
                        <select id="end" class="easyui-combobox" name="state" label="Arriver :" labelPosition="top" style="width:100%;" required>
                            <option value="" selected> </option>
                            <?php
                                // Affichage tableau 2 dimmensions :
                                foreach($result as $ligne){
                                    // Lecture de chaque tableau de chaque ligne
                                    foreach($ligne as $cle=>$valeur){
                                        if ($cle == 0) {
                                            echo '<option value="'. $valeur .' Grenoble, FR">'. $valeur .'</option>';
                                        }
                                    }
                                }
                            ?>
                        </select>
    
                        <!-- TRANSPORT -->
                        <select id="mode" class="easyui-combobox" name="state" label="Moyen de transport :" labelPosition="top" style="width:50%;"
                            required>
                            <option value="DRIVING">voiture</option>
                            <option value="WALKING">marche</option>
                            <option value="BICYCLING">vélo</option>
                        </select>
    
                        <select multiple id="waypoints" style="margin-top: 10px;">
                            <option value="GARE DE GRENOBLE, FR">GARE DE GRENOBLE, FR</option>
                            <option value="PARC VILLA ELIE BLANCHET Grenoble, FR">PARC VILLA ELIE BLANCHET, FR</option>
                            <option value="SQUARE DE LA PLACE VICTOR HUGO Grenoble, FR">SQUARE DE LA PLACE VICTOR HUGO, FR</option>
                        </select>
    
                        <div class="form-group row form-btn">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" id="submit" class="btn btn-success">valider</button>
                            </div>
                        </div>
    
                    </div>
    
    
                    <script src="js/map.js"></script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdcKah4k65g7cQ18H-xXMqz72AoMowDY8&callback=initMap"></script>
                </main>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="container">
            <div class="inner">
                <p>
                    Design by Judith, Damien, Jean-Patrick, Julien and Jérôme
                    <br>
                </p>
            </div>
        </div>
    </footer>

</body>

</html>