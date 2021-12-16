<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="container">
                <h2>
                    Dashboard
                </h2>
            </div>
            <hr class="featurette-divider">
            <div class="container">
                <div class="row" style="margin-bottom : 2%">
                    <table class="table table-striped">
                        <caption style="caption-side:top">
                            <h3>
                                Utilisateur
                            </h3>
                            <a class="btn btn-outline-info" role="button" href="{{route('export_utilisateur')}}" style="width: 50%">
                                Export des utilisateurs enregistrées au format csv
                            </a>
                        </caption>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                ID_EQUIPE
                            </th>
                            <th>
                                NOM
                            </th>
                            <th>
                                PRENOM
                            </th>
                            <th>
                                MAIL
                            </th>
                            <th>
                                Voté
                            </th>
                        </tr>
                        @for($i = 0; $i < $num_utilisateur; $i++)
                        <tr>
                            <td>
                                {{$read_table_utilisateur[$i]->ID}}
                            </td>
                            <td>
                                {{$read_table_utilisateur[$i]->ID_EQUIPE}}
                            </td>
                            <td>
                                {{$read_table_utilisateur[$i]->NOM}}
                            </td>
                            <td>
                                {{$read_table_utilisateur[$i]->PRENOM}}
                            </td>
                            <td>
                                {{$read_table_utilisateur[$i]->MAIL}}
                            </td>
                            @if($read_table_utilisateur[$i]->HAS_VOTED == 'true')
                            <td>
                                <button type="button" class="btn btn-success" style="width: 100%">OUI</button>
                            </td>
                            @else
                            <td>
                                <button type="button" class="btn btn-danger" style="width: 100%">NON</button>
                            </td>
                            @endif
                        </tr>
                        @endfor
                    </table>
                </div>
                {{-- <hr class="featurette-divider"> --}}
                <div class="row" style="margin-bottom : 2%">
                    <table class="table table-striped">
                        <caption style="caption-side:top">
                            <h3>
                                Note
                            </h3>
                            <a class="btn btn-outline-info" role="button" href="{{route('export_note')}}" style="width: 50%">
                                Export des notes enregistrées au format csv
                            </a>
                        </caption>
                        <tr>
                            <th>
                                ID_NOTANT
                            </th>
                            <th>
                                ID_NOTE
                            </th>
                            <th>
                                PARTICIPATION
                            </th>
                            <th>
                                ENGAGEMENT
                            </th>
                            <th>
                                TRAVAIL_EN_EQUIPE
                            </th>
                            <th>
                                EXPERTISE
                            </th>
                        </tr>
                        @for($i = 0; $i < $num_note; $i++)
                        <tr>
                            <td>
                                {{$read_table_note[$i]->ID_NOTANT}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->ID_NOTE}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->PARTICIPATION}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->ENGAGEMENT}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->TRAVAIL_EN_EQUIPE}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->EXPERTISE}}
                            </td>
                        </tr>
                        @endfor
                    </table>
                </div>
                <div class="row" style="margin-bottom : 2%">
                    <table class="table table-striped">
                        <caption style="caption-side:top">
                            <h3>
                                Equipe
                            </h3>
                            <a class="btn btn-outline-info" role="button" href="{{route('export_equipe')}}" style="width: 50%">
                                Export des equipes enregistrées au format csv
                            </a>
                        </caption>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                NOM
                            </th>
                        </tr>
                        @for($i = 0; $i < $num_equipe; $i++)
                        <tr>
                            <td>
                                {{$read_table_equipe[$i]->ID}}
                            </td>
                            <td>
                                {{$read_table_equipe[$i]->NOM}}
                            </td>
                        </tr>
                        @endfor
                    </table>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </body>
</html>