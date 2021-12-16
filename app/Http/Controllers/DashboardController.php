<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard() {
        $num_utilisateur = DB::table('utilisateur')->count('ID');
        $read_table_utilisateur = DB::select('select * from utilisateur');
        $num_note = DB::table('note')->count('ID_NOTANT');
        $read_table_note = DB::select('select * from note');
        $num_equipe = DB::table('equipe')->count('ID');
        $read_table_equipe = DB::select('select * from equipe');

        for($i = 0; $i < $num_utilisateur; $i++){
            $num_vote = DB::table('note')->where('ID_NOTE', $read_table_utilisateur[$i]->ID)
                                         ->count('ID_NOTANT');
            $num_membre_equipe = DB::table('utilisateur')->where('ID_EQUIPE', $read_table_utilisateur[$i]->ID_EQUIPE)
                                                         ->count('ID');
            if($num_vote == $num_membre_equipe - 1) {
                DB::table('utilisateur')->where('ID', $read_table_utilisateur[$i]->ID)
                                        ->update(['HAS_VOTED' => 'true']);
            }else{
                DB::table('utilisateur')->where('ID', $read_table_utilisateur[$i]->ID)
                                        ->update(['HAS_VOTED' => 'false']);
            }
        }

        $num_utilisateur = DB::table('utilisateur')->count('ID');
        $read_table_utilisateur = DB::select('select * from utilisateur');
        $num_note = DB::table('note')->count('ID_NOTANT');
        $read_table_note = DB::select('select * from note');
        $num_equipe = DB::table('equipe')->count('ID');
        $read_table_equipe = DB::select('select * from equipe');

        return view('dashboard')->with('num_utilisateur', $num_utilisateur)
                                ->with('read_table_utilisateur', $read_table_utilisateur)
                                ->with('num_note', $num_note)
                                ->with('read_table_note', $read_table_note)
                                ->with('num_equipe', $num_equipe)
                                ->with('read_table_equipe', $read_table_equipe);
    }
}
