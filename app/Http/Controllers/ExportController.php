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
        fputcsv($fp, ['ID_NOTANT', 'ID_NOTE', 'PARTICIPATION', 'ENGAGEMENT', 'TRAVAIL_EN_EQUIPE', 'EXPERTISE'], ",");
        $result = DB::select("select * from note");
        foreach ($result as $key => $value) {
            $id_notant = $value->ID_NOTANT; 
            $id_note = $value->ID_NOTE;
            $participation = $value->PARTICIPATION;
            $engagement = $value->ENGAGEMENT;
            $travail_en_equipe = $value->TRAVAIL_EN_EQUIPE;
            $expertise = $value->EXPERTISE;
            $str = $id_notant . "," . $id_note . "," . $participation . "," . $engagement . "," . $travail_en_equipe . "," . $expertise;
            $str = explode(',', $str);
            fputcsv($fp, $str, ",");
        }
        exit();
        ob_end_flush();
        fclose($fp);
    }

    // table utilisateur
    public function exportDatabase_utilisateur() {
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
        fputcsv($fp, ['ID', 'ID_EQUIPE', 'NOM', 'PRENOM', 'MAIL'], ",");
        $result = DB::select("select * from utilisateur");
        foreach ($result as $key => $value) {
            $id = $value->ID; 
            $id_equipe = $value->ID_EQUIPE;
            $nom = $value->NOM;
            $prenom = $value->PRENOM;
            $mail = $value->MAIL;
            $str = $id . "," . $id_equipe . "," . $nom . "," . $prenom . "," . $mail;
            $str = explode(',', $str);
            fputcsv($fp, $str, ",");
        }
        exit();
        ob_end_flush();
        fclose($fp);
    }
}
