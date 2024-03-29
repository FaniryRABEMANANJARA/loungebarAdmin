<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
  <title>
    Users
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{asset('img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">AgriSmartCart</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
  @include('nav.menu')
   
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   @include('nav.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">

      <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tableaux des utilisateurs</h6>
              <a href="{{route('ajouterUsers')}}" class="btn btn-success "><i class="fa fa-plus" aria-hidden="true"></i></a>
              <form action="{{ route('users') }}" method="GET">
              <!-- Ajoutez les champs de recherche dont vous avez besoin -->
              <input type="text" name="nom" placeholder="Nom">
              <input type="prenoms" name="prenoms" placeholder="Prenoms">
    <!-- <input type="number" name="prix_max" placeholder="Prix maximum"> -->
    <button class="btn-success" type="submit">Rechercher</button>
</form>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prénoms</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rôle</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('img/marie.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <p class="text-xs font-weight-bold mb-0">{{ $user->nom }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->prenoms }}</p>
                        
                      </td>
                      <td class="align-middle text-left">
                      <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                      </td>

                      <td class="align-middle text-left">
                        <span class="badge badge-sm bg-gradient-success">{{ $user->role }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $user->adresse }}</span>
                      </td>
                      <td class="align-middle">
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('modificationUsers', ['id' => $user->id_users]) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Modifier</a>
                
                      </td>
                      <td class="align-middle">
                      <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('supprimerUtilisateur', ['id' => $user->id_users]) }}"><i class="far fa-trash-alt me-2"></i>Supprimer</a>
                
      </td>             
                    </tr>
                    @endforeach
   
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      </div>
   
  
    @include('nav.footer')
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>