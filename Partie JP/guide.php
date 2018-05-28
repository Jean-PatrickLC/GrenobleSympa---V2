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
    <link href="lib/bootstrap-4.1.1/css/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="lib/bootstrap-4.1.1/js/bootstrap.min.js"></script>
    <!-- Annimation INPUT -->
    <script src="js/script.js"></script>
    <!-- AutoCompletion jquery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/autoComplete.js"></script>
</head>

<style>
    p.uppercase {
        text-transform: uppercase;
    }
</style>

<body class="text-center">
    <div class="section">
        <div class="transparance">
            <div class="cb"></div>
            <div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
                <div class="container">
                    <header class="masthead mb-auto">
                        <div class="inner">
                            <h3 class="masthead-brand">Grenoble Sympa</h3>
                            <nav class="nav nav-masthead justify-content-center">
                                <a class="nav-link" href="index.php">Accueil</a>
                                <a class="nav-link active" href="#">Guide</a>
                                <a class="nav-link" href="contact.php">Contact</a>
                            </nav>
                        </div>
                    </header>
                </div>
                <div class="container-middle">
                    <main role="main" class="inner cover">
                        <div class="jumbotron">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="saisie.php" class="contactForm" method="post">
                                            
                                            <div class="input-field">
                                                <input name="depart" type="text" class="form-input contact-start autoComplete"  required pattern="[a-zA-Z0-9-.ÉÈÊ'\s-]{1,50}">
                                                <span class="line"></span>
                                                <label for="">Départ</label>
                                            </div>
                                            
                                            <div class="input-field">
                                                <input name="arrivee" type="text" class="form-input contact-end autoComplete" required pattern="[a-zA-Z0-9-.ÉÈÊ'\s-]{1,50}">
                                                <span class="line"></span>
                                                <label for="">Arriver</label>
                                            </div>
                                            
                                            <div class="input-field">
                                                <select name="" id="">
                                                        <option value="voiture">Voiture</option>
                                                        <option value="vélo">Vélo</option>
                                                        <option value="marche">Marche</option>
                                                    </select>
                                                <span class="line"></span>
                                                <label for="">Choix de locomotion :</label>
                                            </div>
                                            <button type="submit" class="btn btn-warning">valider</button>
                                        </form>
                                    </div>
                                    <div class="col-md-8">
                                        <img src="http://images.frandroid.com/wp-content/uploads/2016/01/google-maps.png" alt="map google paris">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div class="container mt-auto">
                    <footer class="mastfoot mt-auto">
                        <div class="inner">
                            <p>Design by Judith, Damien, Jean-Patrick, Julien and Jérôme</p>
                            <p>Cover template for
                                <a href="https://getbootstrap.com/">Bootstrap</a>, by
                                <a href="https://twitter.com/mdo">@mdo</a>.</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
