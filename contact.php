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
  <!-- Custom styles for this template -->
  <link href="lib/bootstrap-4.1.1/css/cover.css" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>

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
                <a class="nav-link" href="guide.php">Guide</a>
                <a class="nav-link active" href="contact.php">Contact</a>
              </nav>
            </div>
          </header>
        </div>

        <div class="container">
          <main role="main" class="inner cover">



            <h3>Contactez-nous</h3>

            <form action="mail.php" method="POST">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Identité</span>
                </div>
                <input type="text" name="contact-nom" class="form-control" placeholder="Nom">
                <input type="text" name="contact-prenom" class="form-control" placeholder="prénom">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Votre sexe</label>
                </div>
                <select class="custom-select" name="contact-sexe" id="inputGroupSelect01">
                  <option selected>Vous êtes...</option>
                  <option value="Homme">Homme</option>
                  <option value="Femme">Femme</option>
                </select>
              </div>

              <div class="input-group mb-3">
                <input type="text" name="contact-email" class="form-control" placeholder="Votre adresse mail" aria-label="Recipient's username"
                  aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">@example.com</span>
                </div>
              </div>

              <label>Ecrivez nous :</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Corps de votre mail</span>
                </div>
                <textarea name="contact-commentaire" class="form-control" aria-label="With textarea"></textarea>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="submit" value="Envoyer">On envoie!</button>
                </div>
              </div>
            </form>

          </main>
        </div>

        <div class="container mt-auto">
          <footer class="mastfoot mt-auto">
            <div class="inner">
              <p>Design by Judith, Damien, Jean-Patrick, and Julien</p>
              <p>Cover template for
                <a href="https://getbootstrap.com/">Bootstrap</a>, by
                <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </footer>
        </div>

      </div>
    </div>

  </div>



  <script type="text/JavaScript" src="js/script.js"></script>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>