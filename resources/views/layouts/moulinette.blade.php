{{-- Laravel Vue --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Fan FEI">
    <meta name="description" content="UV PROJET Moulinette">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Moulinette</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="p-3 text-white" style="background-color: #00b8de">
                    <div class="container" class="p-3 bg-dark text-white">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                <li>
                                    <a href="{{ route('index') }}" class="nav-link px-2 text-white">
                                        Accueil
                                    </a>
                                </li>
                                @if (Route::has('login'))
                                @auth
                                @if (Auth::user()->permission == 'etudiant')
                                <li>
                                    <a href="{{ route('showNotationPage') }}" class="nav-link px-2 text-white">
                                        Notation
                                    </a>
                                </li> 
                                @endif   
                                @if (Auth::user()->permission == 'admin')
                                <li>
                                    <a href="{{ route('showUploadPage') }}" class="nav-link px-2 text-white">
                                        Ajouter des ??tudiants
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('showMailPage') }}" class="nav-link px-2 text-white">
                                        Envoyer l'e-mail
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('showDashboard') }}" class="nav-link px-2 text-white">
                                        Tableau de bord
                                    </a>
                                </li>
                                @endif
                                @endauth
                                @endif
                            </ul>
                
                            {{-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                            </form> --}}
                            
                            <div class="text-end">
                                @if (Route::has('login'))
                                @auth
                                <div class="dropdown text-end">
                                    <a href="#" class="d-block px-2 text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Bonjour, {{ Auth::user()->prenom }} 
                                    </a>
                                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                        <li>
                                            <a class="dropdown-item" href={{ route('showUpdatePasswordPage') }}>
                                                Changer le mot de passe
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>                                        
                                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" >
                                                    {{ __('Se d??connecter') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                    <li>
                                        <a class="nav-link px-2 text-white" href="{{ route('login') }}">
                                            Se connecter
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="nav-link px-2 text-white" href="{{ route('register') }}">
                                            Register
                                        </a>
                                    </li> --}}
                                </ul>
                                @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>