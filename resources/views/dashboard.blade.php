@extends('layouts.moulinette')
@section('content')
        <div class="container" style="margin-top: 2%">
            <div class="container">
                <h2>
                    Tableau de bord
                </h2>
            </div>
            <hr class="featurette-divider">
            <div class="container">
                <div class="row" style="margin-bottom : 2%">
                    <table class="table table-striped">
                        <caption style="caption-side:top">
                            <h3>
                                Etudiants
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
                                ID EQUIPE
                            </th>
                            <th>
                                NOM
                            </th>
                            <th>
                                PRENOM
                            </th>
                            <th>
                                E-MAIL
                            </th>
                            <th>
                                NOTE ACTUELLE
                            </th>
                            <th>
                                VOTE
                            </th>
                        </tr>
                        @for($i = 0; $i < $num_users; $i++)
                        @if ($read_table_users[$i]->permission == 'etudiant')
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
                                <td>
                                    <form action="{{ route('showNoteActuelle') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $read_table_users[$i]->id }}">
                                        <button type="submit" class="btn" style="width: 80%; background-color: #00b8de; color: white">
                                            Montre maintenant
                                        </button>
                                    </form>
                                </td>
                                @if($read_table_users[$i]->has_voted == 'true')
                                <td>
                                    <button class="btn btn-success" style="width: 90%">OUI</button>
                                </td>
                                @else
                                <td>
                                    <button class="btn btn-danger" style="width: 90%">NON</button>
                                </td>
                                @endif
                            </tr>
                        @endif
                        @endfor
                    </table>
                </div>
                {{-- <hr class="featurette-divider"> --}}
                <div class="row" style="margin-bottom : 2%">
                    <table class="table table-striped">
                        <caption style="caption-side:top">
                            <h3>
                                Note finale
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
                                ID EQUIPE
                            </th>
                            <th>
                                PARTICIPATION
                            </th>
                            <th>
                                ENGAGEMENT
                            </th>
                            <th>
                                TRAVAIL EN EQUIPE
                            </th>
                            <th>
                                EXPERTISE
                            </th>
                            <th>
                                NOTE FINALE
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
                {{-- <div class="row" style="margin-bottom : 2%">
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
                </div> --}}
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <hr class="featurette-divider">
                <p class="pull-right">
                    <a href="#">
                        Back to top
                    </a>
                </p>
                <p>
                    &copy; 2021 &middot; IMT Nord Europe
                </p>
            </div>
        </div>
@endsection