<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard() {
        $num_users = DB::table('users')->where('email', '!=', 'admin@imt-nord-europe.fr')->count('email');
        $read_table_users = DB::table('users')->where('email', '!=', 'admin@imt-nord-europe.fr')->get();
        // dd($read_table_users);
        $num_note = DB::table('note_final')->count('ID_NOTE');
        $read_table_note = DB::table('note_final')->join('users', 'users.id', 'note_final.ID_NOTE')->get();
        $num_equipe = DB::table('equipe')->count('ID');
        $read_table_equipe = DB::select('select * from equipe');

        for($i = 0; $i < $num_users; $i++){
            $num_vote = DB::table('note')->where('ID_NOTANT', $read_table_users[$i]->id)
                                         ->count('ID_NOTE');
            $num_membre_equipe = DB::table('users')->where('id_equipe', $read_table_users[$i]->id_equipe)
                                                   ->count('id');
            if($num_vote == $num_membre_equipe - 1) {
                DB::table('users')->where('id', $read_table_users[$i]->id)
                                  ->update(['has_voted' => 'true']);
            }else{
                DB::table('users')->where('id', $read_table_users[$i]->id)
                                  ->update(['has_voted' => 'false']);
            }
        }

        return view('dashboard')->with('num_users', $num_users)
                                ->with('read_table_users', $read_table_users)
                                ->with('num_note', $num_note)
                                ->with('read_table_note', $read_table_note)
                                ->with('num_equipe', $num_equipe)
                                ->with('read_table_equipe', $read_table_equipe);
    }
}
