@extends('layouts.moulinette')
@section('content')
    <div class="container" style="margin-top: 5%">
        @if ($toShow == 'sendMailPage')
            <div class="row">
                <h3>
                    Envoyer le mot de passe initial pour chaque étudiant.
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('sendMail') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Confirmer pour envoyer ?')" style="background-color: #00b8de; color: white">
                        Envoyer
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'success')
            <div class="row">
                <h3>
                    Envoyé avec succès.
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('index') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" onclick="" style="background-color: #00b8de; color: white">
                        Retour à la page d'accueil
                    </button>
                </form>
            </div>
        @endif

        @if ($toShow == 'fail')
            <div class="row">
                <h3>
                    Échec de l'envoi, veuillez vérifier le format de fichier csv.
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('showMailPage') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" onclick="" style="background-color: #00b8de; color: white">
                        Renvoyer
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection