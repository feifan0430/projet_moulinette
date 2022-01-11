$(window).on('pageshow', function(){
    
})

function getUsers(){
    var idEquipe = $("#selectEquipe").val();
    if(idEquipe == ""){
        $("#selectUser").empty();
        $("#user").hide();
    }
    else{
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "getUsers",
            method: 'GET',
            data: {
                idEquipe:idEquipe,
            },
            success: function(data){
                fillSelectUser(JSON.parse(data));
            },
            error: function(data){
                alert("AN ERROR OCCUR ON THE LOADING OF THE RESOURCES");
            }
        });
    }
}

function fillSelectUser(userList){
    var selectUser = $("#selectUser");
    selectUser.empty().append('<option value="" selected>────────────────────────────</option>');
    userList.forEach(function(user){
        // selectUser.append('<option value="' + user['ID'] + '">'+user['PRENOM'] +' '+user['NOM'] + '</option>');
        selectUser.append('<option value="' + user['id'] + '">'+user['prenom'] +' '+user['nom'] + '</option>');
    });
    $("#user").show();
}

function makeTheButtonAppear(){
    if($("#selectUser").val() == "")
        $("#submitButton").hide();
    else
        $("#submitButton").show();
}