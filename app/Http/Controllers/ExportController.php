<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{   
    // table equipe
    public function exportDatabase_equipe() {
        // $strFileName = 'equipe.csv'; 
        ob_clean();
        $fp = fopen('php://output', 'a');
        header('Expires: 0');
        header('Cache-control: private');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=equipe.csv');
        print(chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($fp, ['ID','NOM'], ",");
        $result = DB::select("select * from equipe");
        foreach ($result as $key => $value) {
            $id = $value->ID; 
            $nom = $value->NOM;
            $str = $id . "," . $nom;
            $str = explode(',', $str);
            fputcsv($fp, $str, ",");
        }
        exit();
        ob_end_flush();
        fclose($fp);
    }

    // table note
    public function exportDatabase_note() {
        // $strFileName = 'note.csv';
        ob_clean();
        $fp = fopen('php://output', 'a');
        header('Expires: 0');
        header('Cache-control: private');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=note.csv');
        print(chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($fp, ['ID', 'NOM', 'PRENOM', 'ID_EQUIPE', 'PARTICIPATION', 'ENGAGEMENT', 'TRAVAIL_EN_EQUIPE', 'EXPERTISE', 'SUM'], ",");
        // $result = DB::select("select * from note");
        $result = DB::table('note_final')->join('users', 'users.id', 'note_final.ID_NOTE')->get();
        foreach ($result as $key => $value) { 
            $id_note = $value->ID_NOTE;
            $nom = $value->nom;
            $prenom = $value->prenom;
            $id_equipe = $value->id_equipe;
            $participation = $value->PARTICIPATION;
            $engagement = $value->ENGAGEMENT;
            $travail_en_equipe = $value->TRAVAIL_EN_EQUIPE;
            $expertise = $value->EXPERTISE;
            $sum = $value->SUM;
            $str = $id_note . "," . $nom . "," . $prenom . "," . $id_equipe . "," . $participation . "," . $engagement . "," . $travail_en_equipe . "," . $expertise . "," . $sum;
            $str = explode(',', $str);
            fputcsv($fp, $str, ",");
        }
        exit();
        ob_end_flush();
        fclose($fp);
    }

    // table utilisateur
    public function exportDatabase_users() {
        // $strFileName = 'utilisateur.csv';
        ob_clean();
        $fp = fopen('php://output', 'a');
        header('Expires: 0');
        header('Cache-control: private');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=utilisateur.csv');
        print(chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($fp, ['id', 'nom', 'prenom', 'email', 'id_equipe'], ",");
        $result = DB::select("select * from users");
        foreach ($result as $key => $value) {
            $id = $value->id; 
            $id_equipe = $value->id_equipe;
            $nom = $value->nom;
            $prenom = $value->prenom;
            $email = $value->email;
            $str = $id . "," . $nom . "," . $prenom . "," . $email . "," . $id_equipe;
            $str = explode(',', $str);
            fputcsv($fp, $str, ",");
        }
        exit();
        ob_end_flush();
        fclose($fp);
    }
}
