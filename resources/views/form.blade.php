<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Notez vos partenaires</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('js/form.js')}}"></script>
    </head>

    <body>
        <h1>Notez vos partenaires</h1>

        <form id="formConnectedUser" action="{{ url('/notation') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="selectEquipe">Choisissez votre équipe</label>
                <select id="selectEquipe" name="selectEquipe" onchange="getUsers()">
                    <option value="" selected>────────────────────────────</option>
                    @foreach($listeAllTeams as $team)
                        <option value="{{$team->ID}}">{{$team->NOM}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <div id="user" style="display:none">
                <label for="selectUser">Vous êtes : </label>
                <select id="selectUser" name="selectUser" onchange="makeTheButtonAppear()">
                    
                </select>
            </div>

            <br>
            <div id=submitButton style="display:none">
                <button type="submit">Submit</button>
            </div>
        </form>
    </body>
</html>