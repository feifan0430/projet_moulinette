<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Notez vos partenaires</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <h1>Notez vos partenaires</h1>

        <form id="formNotation" action="{{ url('/confirmNote') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" id="idNotant" name="idNotant" value="{{$idUser}}">
            @foreach($partners as $partner)
                <div id="note_{{$partner->ID}}">
                    <h3>{{$partner->PRENOM}} {{$partner->NOM}} :</h3>
                    <div id="participation_{{$partner->ID}}">
                        <h4 style="margin: 10px 50px;">Participation : </h4>
                        <table style="border: none; margin: 5px 80px;">
                            <tr>
                                <td style="text-align: center;"><label for="participation_0_{{$partner->ID}}">0</label></td>
                                <td style="text-align: center;"><label for="participation_1_{{$partner->ID}}">1</label></td>
                                <td style="text-align: center;"><label for="participation_2_{{$partner->ID}}">2</label></td>
                                <td style="text-align: center;"><label for="participation_3_{{$partner->ID}}">3</label></td>
                                <td style="text-align: center;"><label for="participation_4_{{$partner->ID}}">4</label></td>
                                <td style="text-align: center;"><label for="participation_5_{{$partner->ID}}">5</label></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input type="radio" id="participation_0_{{$partner->ID}}" name="participation_{{$partner->ID}}" value="0"></td>
                                <td style="text-align: center;"><input type="radio" id="participation_1_{{$partner->ID}}" name="participation_{{$partner->ID}}" value="1"></td>
                                <td style="text-align: center;"><input type="radio" id="participation_2_{{$partner->ID}}" name="participation_{{$partner->ID}}" value="2"></td>
                                <td style="text-align: center;"><input type="radio" id="participation_3_{{$partner->ID}}" name="participation_{{$partner->ID}}" value="3"></td>
                                <td style="text-align: center;"><input type="radio" id="participation_4_{{$partner->ID}}" name="participation_{{$partner->ID}}" value="4"></td>
                                <td style="text-align: center;"><input type="radio" id="participation_5_{{$partner->ID}}" name="participation_{{$partner->ID}}" value="5"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="engagement_{{$partner->ID}}">
                        <h4 style="margin: 10px 50px;">Engagement : </h4>
                        <table style="border: none; margin: 5px 80px;">
                            <tr>
                                <td style="text-align: center;"><label for="engagement_0_{{$partner->ID}}">0</label></td>
                                <td style="text-align: center;"><label for="engagement_1_{{$partner->ID}}">1</label></td>
                                <td style="text-align: center;"><label for="engagement_2_{{$partner->ID}}">2</label></td>
                                <td style="text-align: center;"><label for="engagement_3_{{$partner->ID}}">3</label></td>
                                <td style="text-align: center;"><label for="engagement_4_{{$partner->ID}}">4</label></td>
                                <td style="text-align: center;"><label for="engagement_5_{{$partner->ID}}">5</label></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input type="radio" id="engagement_0_{{$partner->ID}}" name="engagement_{{$partner->ID}}" value="0"></td>
                                <td style="text-align: center;"><input type="radio" id="engagement_1_{{$partner->ID}}" name="engagement_{{$partner->ID}}" value="1"></td>
                                <td style="text-align: center;"><input type="radio" id="engagement_2_{{$partner->ID}}" name="engagement_{{$partner->ID}}" value="2"></td>
                                <td style="text-align: center;"><input type="radio" id="engagement_3_{{$partner->ID}}" name="engagement_{{$partner->ID}}" value="3"></td>
                                <td style="text-align: center;"><input type="radio" id="engagement_4_{{$partner->ID}}" name="engagement_{{$partner->ID}}" value="4"></td>
                                <td style="text-align: center;"><input type="radio" id="engagement_5_{{$partner->ID}}" name="engagement_{{$partner->ID}}" value="5"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="travailEquipe_{{$partner->ID}}">
                        <h4 style="margin: 10px 50px;">Travail en équipe : </h4>
                        <table style="border: none; margin: 5px 80px;">
                            <tr>
                                <td style="text-align: center;"><label for="travailEquipe_0_{{$partner->ID}}">0</label></td>
                                <td style="text-align: center;"><label for="travailEquipe_1_{{$partner->ID}}">1</label></td>
                                <td style="text-align: center;"><label for="travailEquipe_2_{{$partner->ID}}">2</label></td>
                                <td style="text-align: center;"><label for="travailEquipe_3_{{$partner->ID}}">3</label></td>
                                <td style="text-align: center;"><label for="travailEquipe_4_{{$partner->ID}}">4</label></td>
                                <td style="text-align: center;"><label for="travailEquipe_5_{{$partner->ID}}">5</label></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input type="radio" id="travailEquipe_0_{{$partner->ID}}" name="travailEquipe_{{$partner->ID}}" value="0"></td>
                                <td style="text-align: center;"><input type="radio" id="travailEquipe_1_{{$partner->ID}}" name="travailEquipe_{{$partner->ID}}" value="1"></td>
                                <td style="text-align: center;"><input type="radio" id="travailEquipe_2_{{$partner->ID}}" name="travailEquipe_{{$partner->ID}}" value="2"></td>
                                <td style="text-align: center;"><input type="radio" id="travailEquipe_3_{{$partner->ID}}" name="travailEquipe_{{$partner->ID}}" value="3"></td>
                                <td style="text-align: center;"><input type="radio" id="travailEquipe_4_{{$partner->ID}}" name="travailEquipe_{{$partner->ID}}" value="4"></td>
                                <td style="text-align: center;"><input type="radio" id="travailEquipe_5_{{$partner->ID}}" name="travailEquipe_{{$partner->ID}}" value="5"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="expertise_{{$partner->ID}}">
                        <h4 style="margin: 10px 50px;">Expertise : </h4>
                        <table style="border: none; margin: 5px 80px;">
                            <tr>
                                <td style="text-align: center;"><label for="expertise_0_{{$partner->ID}}">0</label></td>
                                <td style="text-align: center;"><label for="expertise_1_{{$partner->ID}}">1</label></td>
                                <td style="text-align: center;"><label for="expertise_2_{{$partner->ID}}">2</label></td>
                                <td style="text-align: center;"><label for="expertise_3_{{$partner->ID}}">3</label></td>
                                <td style="text-align: center;"><label for="expertise_4_{{$partner->ID}}">4</label></td>
                                <td style="text-align: center;"><label for="expertise_5_{{$partner->ID}}">5</label></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><input type="radio" id="expertise_0_{{$partner->ID}}" name="expertise_{{$partner->ID}}" value="0"></td>
                                <td style="text-align: center;"><input type="radio" id="expertise_1_{{$partner->ID}}" name="expertise_{{$partner->ID}}" value="1"></td>
                                <td style="text-align: center;"><input type="radio" id="expertise_2_{{$partner->ID}}" name="expertise_{{$partner->ID}}" value="2"></td>
                                <td style="text-align: center;"><input type="radio" id="expertise_3_{{$partner->ID}}" name="expertise_{{$partner->ID}}" value="3"></td>
                                <td style="text-align: center;"><input type="radio" id="expertise_4_{{$partner->ID}}" name="expertise_{{$partner->ID}}" value="4"></td>
                                <td style="text-align: center;"><input type="radio" id="expertise_5_{{$partner->ID}}" name="expertise_{{$partner->ID}}" value="5"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
            @endforeach
            <input type="submit" value="Envoyer les notes">
        </form>
    </body>
</html>