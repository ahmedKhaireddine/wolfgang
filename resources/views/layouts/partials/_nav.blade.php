<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-static-top">
  <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{asset('uploads/logo.svg')}}" style="width:100px;" alt="logo du site"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse px-2 px-lg-5" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ set_active_route('homepage') }}">
        <a class="nav-link" href="{{ route('homepage') }}">Acceuil</a>
      </li>
      <li class="nav-item {{ set_active_route('products.index') }}">
        <a class="nav-link" href="{{ route('products.index') }}">Nos produits</a>
      </li>
      <li class="nav-item {{ set_active_route('messages.create') }}">
        <a class="nav-link" href="{{ route('messages.create') }}">Contactez-nous</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
        </li>
    </ul>
  </div>
</nav>