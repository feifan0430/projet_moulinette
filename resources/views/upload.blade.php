@extends('layouts.moulinette')
@section('content')
    
    <div class="container">
        <form method="post" role="form" action="{{route('read_csv')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                {{-- <label for="inputfile">Upload .csv</label> --}}
                <input type="file" name="excel_path" accept=".csv">
                <p class="help-block">
                    Upload .csv
                </p>
            </div>
            <button type="submit" class="btn btn-outline-primary">Upload</button>
        </form>
    </div>
@endsection