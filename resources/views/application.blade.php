<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - Flexpeak</title>

        <!-- Fonts -->
        <script type="text/javascript" src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" defer></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css" >

        <!-- Styles -->
    </head>
    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="/teachers">Professores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="/courses">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}" href="/students">Alunos</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <form class="d-none d-sm-inline-block navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar Por..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </header>
        <div class='container-body'>
            <div class="container-fluid" id="app">
                @yield('content')
            </div>
        </div>
    </body>
    
    <script type="text/javascript" src="{{ secure_asset('js/app.js') }}"></script>
    @yield('script-content')
</html>
