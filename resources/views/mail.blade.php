@extends('layouts.moulinette')
@section('content')
    <div class="container" style="margin-top: 5%">
        <div class="row">
            <h3>
                Send Mails.
            </h3>
        </div>
        <div class="row" style="margin-top: 2%">
            <form action="{{ route('showUploadPage') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Confirmer pour envoyer ?')">
                    Send
                </button>
            </form>
        </div>
    </div>
@endsection