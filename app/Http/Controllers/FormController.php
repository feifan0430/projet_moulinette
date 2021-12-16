<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Utilisateur;

class FormController extends Controller
{
    /**
     * Get the form to select who you are
     */
    public function getForm(){
        $listeEquipes = Equipe::all();
        $data = [
            "listeAllTeams" => $listeEquipes,
        ];
        return view('form', $data);
    }

    /**
     * Get the users of the selected team
     *
     * @param Request $request
     */
    public function getUsersAjax(Request $request){
        $idEquipe = $request->input('idEquipe');
        $userList = Utilisateur::where('ID_EQUIPE', '=', $idEquipe)->get();
        print json_encode($userList);
    }
}
