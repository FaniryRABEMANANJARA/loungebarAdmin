<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link " href="pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> <li class="nav-item">
          <a class="nav-link " href="{{ route('dashboard') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tableau de bord</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Liste des users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('categorie') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('produit') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Liste des produits</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('commande') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Commandes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('historique') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Historique</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="{{asset('img/illustrations/icon-documentation.svg')}}" alt="sidebar_illustration">
      </div>
      <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <p class="text-xs font-weight-bold mb-0">Vous avez besoin d'aide?</p>
          </div>
          <span style="color:green"><a href="" target="_blank" class="btn btn-success btn-sm w-100 mb-3"><i class="fa fa-whatsapp" aria-hidden="true"> Whatsapp</i></a></span>
          <span style="color:blue"><a class="btn btn-primary btn-sm mb-0 w-100" href="" type="button"><i class="fa fa-instagram" aria-hidden="true"> Instagram</i></a></span>
  
        </div>
      </div>
    </div>