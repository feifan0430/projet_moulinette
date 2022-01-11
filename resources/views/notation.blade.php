@extends('layouts.moulinette')
@section('content')
<div class="container">
    <form id="notationForm" action="{{ route('updateNotation') }}" method="post">
        {{ csrf_field() }}
    @foreach ($list_teammate as $teammate)
        <div class="row">
            <div class="row">
                <h3>
                    Pour {{ $teammate->nom }} {{ $teammate->prenom }} :
                </h3>
            </div>
            <div class="container">
                
                    <ol>
                        <li>
                            Participation
                        </li>
                        <label>
                            <input class="form-check-input" type="radio" name="participation_{{ $teammate->id }}" id="participation_1_{{ $teammate->id }}" value="1">
                            1
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="participation_{{ $teammate->id }}" id="participation_2_{{ $teammate->id }}" value="2">
                            2
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="participation_{{ $teammate->id }}" id="participation_3_{{ $teammate->id }}" value="3">
                            3
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="participation_{{ $teammate->id }}" id="participation_4_{{ $teammate->id }}" value="4">
                            4
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="participation_{{ $teammate->id }}" id="participation_5_{{ $teammate->id }}" value="5">
                            5
                        </label>

                        <li>
                            Engagement
                        </li>
                        <label>
                            <input class="form-check-input" type="radio" name="engagement_{{ $teammate->id }}" id="engagement_1_{{ $teammate->id }}" value="1">
                            1
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="engagement_{{ $teammate->id }}" id="engagement_2_{{ $teammate->id }}" value="2">
                            2
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="engagement_{{ $teammate->id }}" id="engagement_3_{{ $teammate->id }}" value="3">
                            3
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="engagement_{{ $teammate->id }}" id="engagement_4_{{ $teammate->id }}" value="4">
                            4
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="engagement_{{ $teammate->id }}" id="engagement_5_{{ $teammate->id }}" value="5">
                            5
                        </label>

                        <li>
                            Travail en equipe
                        </li>
                        <label>
                            <input class="form-check-input" type="radio" name="travail_en_equipe_{{ $teammate->id }}" id="travail_en_equipe_1_{{ $teammate->id }}" value="1">
                            1
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="travail_en_equipe_{{ $teammate->id }}" id="travail_en_equipe_2_{{ $teammate->id }}" value="2">
                            2
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="travail_en_equipe_{{ $teammate->id }}" id="travail_en_equipe_3_{{ $teammate->id }}" value="3">
                            3
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="travail_en_equipe_{{ $teammate->id }}" id="travail_en_equipe_4_{{ $teammate->id }}" value="4">
                            4
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="travail_en_equipe_{{ $teammate->id }}" id="travail_en_equipe_5_{{ $teammate->id }}" value="5">
                            5
                        </label>

                        <li>
                            Expertise
                        </li>
                        <label>
                            <input class="form-check-input" type="radio" name="expertise_{{ $teammate->id }}" id="expertise_1_{{ $teammate->id }}" value="1">
                            1
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="expertise_{{ $teammate->id }}" id="expertise_2_{{ $teammate->id }}" value="2">
                            2
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="expertise_{{ $teammate->id }}" id="expertise_3_{{ $teammate->id }}" value="3">
                            3
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="expertise_{{ $teammate->id }}" id="expertise_4_{{ $teammate->id }}" value="4">
                            4
                        </label>
                        <label>
                            <input class="form-check-input" type="radio" name="expertise_{{ $teammate->id }}" id="expertise_5_{{ $teammate->id }}" value="5">
                            5
                        </label>
                    </ol>
                
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn-outline" onclick="return checkRadio()">Envoyer</button>
</form>
</div>

<script>
    function checkRadio() {
        var groups=document.getElementById('notationForm'). getElementsByTagName('div') ; 
        alert('Veuillez compléter toutes les options');
        return false;
    }
</script>
@endsection