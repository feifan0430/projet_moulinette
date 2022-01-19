@extends('layouts.moulinette')
@section('content')
    @if ($isUploaded == 'success')
        <div class="container" style="margin-top: 5%">
            <h3>
                Ajouté avec succès.
            </h3>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('showDashboard') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" style="background-color: #00b8de; color: white">
                        Voir la liste des étudiants
                    </button>
                </form>
            </div>
        </div>
    @endif

    @if ($isUploaded == 'fail')
        <div class="container" style="margin-top: 5%">
            <div class="row">
                <h3>
                    Échec de l'ajout, veuillez réessayer.
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('showUploadPage') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" style="background-color: #00b8de; color: white">
                        Re-enregistrer
                    </button>
                </form>
            </div>
        </div>
    @endif

    @if ($isUploaded == 'pas_encore')
        <div class="container" style="margin-top: 5%">
            <div class="row">
                <h3>
                    Ajouter un fichier csv:
                </h3>
            </div>
            <form method="post" role="form" action="{{route('read_csv')}}" enctype="multipart/form-data" style="margin-top: 2%">
                @csrf
                <div class="form-group" style="margin-bottom: 1%">
                    {{-- <label for="inputfile">Upload .csv</label> --}}
                    <input type="file" name="excel_path" accept=".csv">
                    <br/>
                    <small class="help-block">
                        <i>
                            Veuillez un fichier .csv
                        </i>
                    </small>
                </div>
                <button type="submit" class="btn" style="background-color: #00b8de; color: white">
                    Enregistrer
                </button>
            </form>
        </div>

        {{-- <div class="container" style="margin-top: 5%">
            <div class="row">
                <h3>
                    Supprimer toutes les informations sur l'étudiant:
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('deleteUsers') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Confirmer pour supprimer ?')" style="background-color: #00b8de; color: white">
                        Supprimer
                    </button>
                </form>
            </div>
        </div> --}}
    @endif

    @if ($isUploaded == 'success_delete')
        <div class="container" style="margin-top: 5%">
            <div class="row">
                <h3>
                    Supprimé avec succès.
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('showUploadPage') }}" method="get">
                    @csrf
                    <button type="submit" class="btn" style="background-color: #00b8de; color: white">
                        Re-enregistrer
                    </button>
                </form>
            </div>
        </div>
    @endif
@endsection