<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <div class="container-fluid">
        <a class="navbar-brand">
        {{ config('app.name', 'complex-cladiri') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('complexe.index') }}">Complexe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cladiri.index') }}">Cladiri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apartamente.index') }}">Apartamente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('proprietari.index') }}">Proprietari</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto"></ul>
        </div>
    </div>
</nav>