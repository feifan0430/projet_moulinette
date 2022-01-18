@extends('layouts.moulinette')
@section('content')
    <div class="container" style="margin-top: 2%">
        <div class="row" style="margin-bottom : 2%">
            <table class="table table-striped">
                <caption style="caption-side:top">
                    <h3>
                        Résultats de votre notation
                    </h3>
                </caption>
                <tr>
                    <th>
                        NOM
                    </th>
                    <th>
                        PRENOM
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
                </tr>
                @foreach ($list_notation as $notation)
                    <tr>
                        <td>
                            {{ $notation->nom }}
                        </td>
                        <td>
                            {{ $notation->prenom }}
                        </td>
                        <td>
                            {{ $notation->PARTICIPATION }}
                        </td>
                        <td>
                            {{ $notation->ENGAGEMENT }}
                        </td>
                        <td>
                            {{ $notation->TRAVAIL_EN_EQUIPE }}
                        </td>
                        <td>
                            {{ $notation->EXPERTISE }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection