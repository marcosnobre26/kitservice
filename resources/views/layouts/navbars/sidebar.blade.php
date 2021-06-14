<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('kitnets.index') }}">KitNets <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('condominiums.index') }}">Condominios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comercialrooms.index') }}">Salas Comerciais</a>
        </li>

        <!--@can('condominiums_view')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('condominiums.index') }}">
                    <i class="fas fa-clinic-medical"></i>
                    <p>KitNets</p>
                </a>
            </li>
        @endcan-->
        
      </ul>
    </div>
  </nav>