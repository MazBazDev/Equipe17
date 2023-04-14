<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

        <!-- Bootstraps -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="row p-4">
            <div class="col-md-4 d-flex flex-column mb-3">
                <div class="p-3 d-flex flex-row" >
                    <img src="{{ asset('images/bde-ynov.jpeg') }}" style="height: 10em; width: 10em" alt="...">
                    <div>
                      <h3 class="pt-2 text-black fs-4">BDE - Ynov Lyon</h3>
                      <p class="text-black">27 rue Raoul Servant</p>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-primary btn-lg mx-4" data-bs-toggle="modal" data-bs-target="#createEventModal">Créer un évènement</button>
                
                <div class="modal fade" id="createEventModal">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Créer un évènement</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form>
                                <div class="form-group">
                                  <label for="eventName">Nom de l'évènement</label>
                                  <input type="text" class="form-control" id="eventName" placeholder="Entrez le nom de l'évènement">
                                </div>
                                <div class="form-group">
                                  <label for="eventJoueur">Nombre de joueurs maximum</label>
                                  <input type="integer" class="form-control" id="eventJoueur" placeholder="Entrez le nombre de participant maximum">
                                </div>
                                <div class="form-group">
                                    <label for="eventDateStart">Date de début de l'évènement</label>
                                    <input type="date" class="form-control" id="eventDateStart">
                                </div>
                                <div class="form-group">
                                  <label for="eventDateEnd">Date de fin de l'évènement</label>
                                  <input type="date" class="form-control" id="eventDateEnd">
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-primary">Créer</button>
                          </div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex flex-column mb-3">
                <p class="text-black text-center">Évènement en cours</p>

                <div class="card mt-3 mx-5">
                    <img src="{{ asset('images/baby-foot.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">YParty 5</h5>
                      <p class="card-text">Joueurs : 50</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 column">
              <div clas="ow d-flex flex-column mb-3">
                <p class="text-black text-center">Évènements à venir</p>

                <div class="card mb-3 shadow">
                    <div class="card-body rounded">
                      <h2 class="card-title">YParty 6</h2>
                      <p class="card-text mb-0 d-flex justify-content-between">
                        <span class="event-participants">Joueurs : 50</span>
                        <span class="event-date">16 avril 2023</span>
                      </p>
                    </div>
                </div>
                
              </div>
              <div class="row d-flex flex-column mb-3">
                <p class="text-black text-center">Vos derniers évènements</p>

                <div class="card mb-3 shadow">
                    <div class="card-body rounded">
                      <h2 class="card-title">YParty 4</h2>
                      <p class="card-text mb-0 d-flex justify-content-between">
                        <span class="event-participants">Joueurs : 50</span>
                        <span class="event-date">12 avril 2023</span>
                      </p>
                    </div>
                </div>

                <div class="card mb-3 shadow">
                    <div class="card-body rounded">
                        <h2 class="card-title">YParty 3</h2>
                        <p class="card-text mb-0 d-flex justify-content-between">
                        <span class="event-participants">Joueurs : 50</span>
                        <span class="event-date">12 avril 2023</span>
                        </p>
                    </div>
                </div>

                <div class="card mb-3 shadow">
                    <div class="card-body rounded">
                      <h2 class="card-title">YParty 2</h2>
                      <p class="card-text mb-0 d-flex justify-content-between">
                        <span class="event-participants">Joueurs : 50</span>
                        <span class="event-date">12 avril 2023</span>
                      </p>
                    </div>
                </div>

                <div class="card mb-3 shadow">
                    <div class="card-body rounded">
                      <h2 class="card-title">YParty 1</h2>
                      <p class="card-text mb-0 d-flex justify-content-between">
                        <span class="event-participants ">Joueurs : 50</span>
                        <span class="event-date">12 avril 2023</span>
                      </p>
                    </div>
                </div>
              </div>
            </div>
        <div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
</html>

