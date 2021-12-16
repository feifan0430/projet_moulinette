<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class NotationController extends Controller
{
    /**
     * Get the form to pocede to the notation of your partners
     *
     * @param Request $request
     */
    public function getForm(Request $request){
        $idEquipe = $request->input("selectEquipe");
        $idUser = $request->input("selectUser");

        $partners = Utilisateur::where("ID_EQUIPE", "=", $idEquipe)
                                ->where("ID", "!=", $idUser)
                                ->get();
        $data = [
            "partners" => $partners,
            "idUser" => $idUser,
        ];
        return view('notation', $data);
    }

    public function applyNotes(Request $request){
        $inputs = $request->keys();
        $idNotant = $request->input('idNotant');
        $datas = array();
        foreach($inputs as $input){
            if($input == 'idNotant' || $input == "_token")
                continue;
            $idUser = explode("_", $input)[1];
            $category = explode("_", $input)[0];
            if(!isset($datas[$idUser]))
                $datas = self::addUserToTable($datas, $idUser);
            $datas[$idUser][$category] = $request->input($input);
        }

        foreach($datas as $idUser => $notesUser){
            //\Debugbar::info($idUser." : ".$notesUser);
            $noteData = [
                "ID_NOTANT" => $idNotant,
                "ID_NOTE" => $idUser,
                "PARTICIPATION" => $notesUser["participation"],
                "ENGAGEMENT" => $notesUser["engagement"],
                "TRAVAIL_EN_EQUIPE" => $notesUser["travailEquipe"],
                "EXPERTISE" => $notesUser["expertise"],
            ];
            Note::create($noteData);
        }

        return view('notesSaved');
    }

    private static function addUserToTable($table, $userId){
        $table[$userId] = [
            "participation" => "0",
            "engagement" => "0",
            "travailEquipe" => "0",
            "expertise" => "0",
        ];
        return $table;
    }
}
