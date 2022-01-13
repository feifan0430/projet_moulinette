@extends('layouts.moulinette')
@section('content')
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
                                Users
                            </h3>
                            <a class="btn btn-outline-info" role="button" href="{{route('export_users')}}" style="width: 50%">
                                Export des users enregistrées au format csv
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
                        @for($i = 0; $i < $num_users; $i++)
                        <tr>
                            <td>
                                {{$read_table_users[$i]->id}}
                            </td>
                            <td>
                                {{$read_table_users[$i]->id_equipe}}
                            </td>
                            <td>
                                {{$read_table_users[$i]->nom}}
                            </td>
                            <td>
                                {{$read_table_users[$i]->prenom}}
                            </td>
                            <td>
                                {{$read_table_users[$i]->email}}
                            </td>
                            @if($read_table_users[$i]->has_voted == 'true')
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
                                ID
                            </th>
                            <th>
                                NOM
                            </th>
                            <th>
                                PRENOM
                            </th>
                            <th>
                                ID_EQUIPE
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
                            <th>
                                SUM
                            </th>
                        </tr>
                        @for($i = 0; $i < $num_note; $i++)
                        <tr>
                            <td>
                                {{$read_table_note[$i]->ID_NOTE}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->nom}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->prenom}}
                            </td>
                            <td>
                                {{$read_table_note[$i]->id_equipe}}
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
                            <td>
                                {{$read_table_note[$i]->SUM}}
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
        </div>
@endsection