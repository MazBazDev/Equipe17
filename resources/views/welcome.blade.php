<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="sablier.svg">

    <!-- [EDIT] Remplis les 3 balises ci-dessous -->
    <title>Challenge 48h - EQUIPE 17</title>
    <meta name="description" content="Description de la page pour les moteurs de recherche">
    <meta name="keywords" content="Mots-clés de la page, séparés par des virgules">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      .carousel-item {
        height: 300px;
      }
    </style>
  </head>

  <body>
    <!-- [EDIT] Dans la navbar, précise le nom de ton projet -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Equipe 17</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#presentation">Présentation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#equipe">L'équipe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="visuels">Visuels</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#liens-pratiques">Liens pratiques</a>
            </li>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                </div>
                    
                @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
        <div id="presentation" class="col-lg-12 text-center">
          <h1>Equipe 17</h1>
        </div>
        <div class="row">
          <div class="col-md-8 d-flex align-items-center">
              <p>Le projet consiste à créer une application web permettant d’avoir du matchmaking autour du babyfoot.<br>
                Ainsi qu’un baby-foot connecté permettant de suivre le score en direct et de jouer avec tous les étudiants des différents campus Ynov.<br>
                Ce projet permet de créé une communauté et un vrai lien entre tous les étudiants des différents campus d'Ynov qu'importe la ville, le campus et leurs filières.
              </p>
          </div>
        <div class="col-md-4 d-flex align-items-center">
          <img src="{{ asset("/logo.png") }}"  class="img-fluid mx-auto d-block">
        </div>
      </div>
      
      
      <div id="equipe" class="col-lg-12 text-center mb-5">
        <h2>L'ÉQUIPE</h2>
      </div>

      <!-- [EDIT] Cette section doit présenter l'intégralité des membres du groupe  -->
      <div class="row justify-content-center mb-5">
        <!-- [EDIT] PRESENTATION ETUDIANT 1 -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
          <img src="https://cdn.discordapp.com/attachments/1095995508343980105/1096634675616817303/image.png" class="card-img-top" alt="Etudiant 1">
            <div class="card-body">
              <h5 class="card-title">YBARRE Martin</h5>
              <p class="card-text">Ma partie du projet concerne le Back-office. <br>
                Elaboration d'algorithme, amdinistration de la Base de données, développement de tout ce qui concerne les stats des jouers,<br>
                et l'affichage de tous les classments concernant les jouers ou les écoles.</p>
            </div>
          </div>
        </div>

        <!-- [EDIT] PRESENTATION ETUDIANT 2 -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
          <img src="https://cdn.discordapp.com/attachments/1095995508343980105/1096634599091753121/IMG_3448.jpg" class="card-img-top" alt="Mazigh">
            <div class="card-body">
              <h5 class="card-title">YYAKOUBEN Mazigh</h5>
              <p class="card-text">En charge avec Martin et Mathis de la partie Back du projet. <br>
                J'ai pour ma part développé la partie concernant la gestion de la connexion. <br>
                Pour résumer les étapes de mon travail j'ai du créé les controlleurs, y ajouter les méthodes de connexion,<br>
                créer les routes, puis le formulaire de connexion.
            </p>
            </div>
          </div>
        </div>

        <!-- [EDIT] PRESENTATION ETUDIANT 3 -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
          <img src="https://cdn.discordapp.com/attachments/1095995508343980105/1096634877312499833/image0.jpg" class="card-img-top" alt="Mathis">
            <div class="card-body">
              <h5 class="card-title">YLECHERF Mathis</h5>
              <p class="card-text">J'ai effectuées toute la partie qui concerne le déroulement d'un match,<br>
                de la génération d'un QR-code afin de se connecter à la partie, jusqu'à la fin du match puis l'inscription du score.</p>
            </div>
          </div>
        </div>

        <!-- [EDIT] PRESENTATION ETUDIANT 4 -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
          <img src="lorem-ipsum.jpg" class="card-img-top" alt="Eoghan">
            <div class="card-body">
              <h5 class="card-title">YMARCONI Eoghan</h5>
              <p class="card-text">Ici, je décris mon rôle et les tâches que j'ai effectuées</p>
            </div>
          </div>
        </div>

        <!-- [EDIT] PRESENTATION ETUDIANT 5 -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
          <img src="{{ asset('/home/HTML.jpg') }}" class="card-img-top" alt="Etudiant 1">
            <div class="card-body">
              <h5 class="card-title">YBIYAMOU Jade</h5>
              <p class="card-text">J'ai eu pour role d'établir le design des pages avec une partie du groupe,<br>
                        Ensuite j'ai développé une des parties HTML et ce sympathique template épuré.</p>
            </div>
          </div>
        </div>

        <!-- [EDIT] PRESENTATION ETUDIANT 6 -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="card">
          <img src="{{ asset("home/IOT.jpg") }}" class="card-img-top" alt="Etudiant 1">
            <div class="card-body">
              <h5 class="card-title">YLOSSIGNOL-DRILLIEN Nolan</h5>
              <p class="card-text">En ce qui me concerne j'ai participé a l'élaboration du design avec une partie du groupe.<br>
                J'ai ensuite travaillé sur la partie IOT. </p>
            </div>
          </div>
        </div>

         <!-- [EDIT] PRESENTATION ETUDIANT 7 -->
         <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card">
            <img src="{{ asset("home/lorem-ipsum.jpg") }}" class="card-img-top" alt="Etudiant 1">
              <div class="card-body">
                <h5 class="card-title">YBARTHELEMY Lucas</h5>
                <p class="card-text">En charge de l'élaboration du design avec Figma, j'ai ensuite établie le code Html,<br>
                    participé à la conception du cahier des charges,. 
                </p>
              </div>
            </div>
          </div>
      </div>

      <div id="visuels" class="col-lg-12 text-center mb-5">
        <h2>VISUELS DU PROJET</h2>
      </div>

      <!-- [EDIT] Remplis le carousel avec des screenshots de ton projet accompagnés d'une légende -->
      <div id="carouselExampleCaptions" class="carousel slide mb-5">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="lorem-ipsum.jpg" class="d-block w-100" alt="screenshot1">
            <div class="carousel-caption d-none d-md-block">
              <h3>Screenshot n°1</h3>
              <p>Légende screenshot n°1</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="lorem-ipsum.jpg" class="d-block w-100" alt="screenshot2">
            <div class="carousel-caption d-none d-md-block">
              <h3>Screenshot n°2</h3>
              <p>Légende screenshot n°2</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="lorem-ipsum.jpg" class="d-block w-100" alt="screenshot3">
            <div class="carousel-caption d-none d-md-block">
              <h3>Screenshot n°3</h3>
              <p>Légende screenshot n°3</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div id="liens-pratiques" class="col-lg-12 text-center mb-5">
        <h2>LIENS PRATIQUES</h2>
      </div>
      <!-- [EDIT] Mets le lien du Github du projet et du PDF du dossier technique -->

      <div class="row justify-content-center mb-5">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Github</h5>
              <p class="card-text">Consultez notre code source et notre organisation sur Github.</p>
              <a href="https://github.com/MazBazDev/Equipe17/" class="btn btn-primary">Visiter</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">PDF</h5>
              <p class="card-text">Téléchargez notre dossier technique au format PDF.</p>
              <a href="{{ asset('/home/CHALL48H_EQUIPE_17.pdf') }}" class="btn btn-primary">Télécharger</a>
            </div>
          </div>
        </div>
      </div> 

    <hr>

    <div class="text-center mb-3">
      Fait avec 😴 pour le Challenge 48h
    </div>
  </div>
  </body>

  <footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </footer>
</html>