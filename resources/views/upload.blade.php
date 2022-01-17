@extends('layouts.moulinette')
@section('content')
    @if ($isUploaded == 'true')
        <div class="container">
            <h3>
                Uploaded Successfully.
            </h3>
        </div>
    @endif
    @if ($isUploaded == 'false')
        <div class="container" style="margin-top: 5%">
            <div class="row">
                <h3>
                    Uploaded Failed Please Retry.
                </h3>
            </div>
            <div class="row" style="margin-top: 2%">
                <form action="{{ route('showUploadPage') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">
                        Re-télécharger
                    </button>
                </form>
            </div>
        </div>
    @endif
    @if ($isUploaded == 'pas_encore')
            <div class="container" style="margin-top: 5%">
                <form method="post" role="form" action="{{route('read_csv')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="inputfile">Upload .csv</label> --}}
                        <input type="file" name="excel_path" accept=".csv">
                        <p class="help-block">
                            Veuillez télécharger le fichier csv
                        </p>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Télécharger</button>
                </form>
            </div>
    @endif
@endsection