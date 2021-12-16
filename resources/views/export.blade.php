<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Exporter la base de données au format csv</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <div class="container" style="height: 200px">
            <div class="row">
                <h1 style="text-align:center">
                    Exporter la base de données au format csv
                </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-2 offset-md-3">
                    <a class="btn btn-outline-info" role="button" href="{{route('export_equipe')}}" style="width: 100%">
                        EQUIPE
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-info" role="button" href="{{route('export_note')}}" style="width: 100%">
                        NOTE
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-info" role="button" href="{{route('export_utilisateur')}}" style="width: 100%">
                        UTILISATEUR
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
