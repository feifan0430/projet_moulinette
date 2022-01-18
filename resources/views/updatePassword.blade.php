@extends('layouts.moulinette')
@section('content')
    <div class="container" style="margin-top: 5%">
        @if ($toShow == 'UpdateForm')
            <div class="row">
                <form style="min-width: 300px; width: 35%; padding: 15px; margin: auto;" action="{{ route('updatePassword') }}" method="POST">
                    {{ csrf_field() }}
                    <h3 class="h3 mb-3 fw-normal">
                        Modifier le mot de passe
                    </h1>
                    <div class="form-floating" style="margin-bottom: 3%">
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Password">
                        <label for="floatingPassword">
                            Mot de passe actuel
                        </label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 3%">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Password">
                        <label for="floatingPassword">
                            Nouveau mot de passe
                        </label>
                    </div>
                    <div class="form-floating" style="margin-bottom: 3%">
                        <input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" placeholder="Password">
                        <label for="floatingPassword">
                            Saisissez une seconde fois
                        </label>
                    </div>
                
                    <button class="w-100 btn btn-lg" type="submit" onclick="" style="background-color: #00b8de; color: white">
                        Enregistrer
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'WrongOldPassword')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Erreur de mot de passe actuel !
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; min-width: 300px; width: 35%">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg" type="submit" onclick="" style="background-color: #00b8de; color: white">
                        Enregistrer à nouveau
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'WrongConfirmPassword')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Erreur de confirmation !
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; width: 35%; min-width: 300px;">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg" type="submit" onclick="" style="background-color: #00b8de; color: white">
                        Enregistrer à nouveau
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'SameNewPassword')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Même mot de passe !
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('showUpdatePasswordPage') }}" method="GET" style="padding: 15px; margin: auto; width: 35%; min-width: 300px;">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg" type="submit" onclick="" style="background-color: #00b8de; color: white">
                        Enregistrer à nouveau
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'SuccessfullyUpdated')
            <div class="row" style="margin-bottom: 5%; margin-top: 10%">
                <h2 style="text-align: center">
                    Modifié avec succès !
                </h2>
            </div>
            <div class="row">
                <form action="{{ route('index') }}" method="GET" style="padding: 15px; margin: auto; width: 35%; min-width: 300px;">
                    {{ csrf_field() }}
                    <button class="w-100 btn btn-lg" type="submit" onclick="" style="background-color: #00b8de; color: white">
                        Retour à la page d'accueil
                    </button>
                </form>
            </div>
        @endif
    </div>

@endsection