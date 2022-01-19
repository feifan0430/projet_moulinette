<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotationController extends Controller
{
    public function showNotationPage() {
        $list_teammate = DB::table('users')->where('id_equipe', Auth::user()->id_equipe)
                                           ->where('id', '!=', Auth::user()->id)
                                           ->get();
        $num_teammate = DB::table('users')->where('id_equipe', Auth::user()->id_equipe)
                                          ->where('id', '!=', Auth::user()->id)
                                          ->count('id');
        $list_notation = DB::table('note')->where('ID_NOTANT', Auth::user()->id)
                                          ->get();
        $num_notation = DB::table('note')->where('ID_NOTANT', Auth::user()->id)
                                         ->count('ID_NOTE');
        
        if ($num_teammate == $num_notation) {
            $list_notation = DB::table('note')->join('users', 'users.id', 'note.ID_NOTE')
                                              ->where('ID_NOTANT', Auth::user()->id)
                                              ->get();
            return view('resultatNotation')->with('list_notation', $list_notation);
        }else {
            return view('notation')->with('list_teammate', $list_teammate);
        }
    }

    public function updateNotation(Request $request) {
        $list_teammate = DB::table('users')->where('id_equipe', Auth::user()->id_equipe)
                                           ->where('id', '!=', Auth::user()->id)
                                           ->get();
                                           
        foreach($list_teammate as $teammate){
            DB::table('note')->insert(
                ['ID_NOTANT' => Auth::user()->id, 
                 'ID_NOTE' => $teammate->id,
                 'PARTICIPATION' => $request->input('participation_' . $teammate->id),
                 'ENGAGEMENT' => $request->input('engagement_' . $teammate->id),
                 'TRAVAIL_EN_EQUIPE' => $request->input('travail_en_equipe_' . $teammate->id),
                 'EXPERTISE' => $request->input('expertise_' . $teammate->id)
                ]
            );
        }

        function note_final () {
            $read_table_users = DB::table('users')->where('permission', 'etudiant')
                                                  ->get();
            foreach ($read_table_users as $read_table_user) {
                $num_teammate = DB::table('users')->where('id_equipe', $read_table_user->id_equipe)
                                                  ->where('id', '!=', $read_table_user->id)
                                                  ->count('id');
                $num_note = DB::table('note')->where('ID_NOTE', $read_table_user->id)
                                             ->count('ID_NOTANT');
                $request = DB::table('note_final')->where('ID_NOTE', $read_table_user->id)
                                                  ->count();
                
                if ($num_teammate == $num_note && $request == 0) {
                    $participation = DB::table('note')->where('ID_NOTE', $read_table_user->id)
                                                      ->sum('PARTICIPATION');
                    $participation /= $num_teammate;
                    $engagement = DB::table('note')->where('ID_NOTE', $read_table_user->id)
                                                   ->sum('ENGAGEMENT');
                    $engagement /= $num_teammate;
                    $travail_en_equipe = DB::table('note')->where('ID_NOTE', $read_table_user->id)
                                                          ->sum('TRAVAIL_EN_EQUIPE');
                    $travail_en_equipe /= $num_teammate;
                    $expertise = DB::table('note')->where('ID_NOTE', $read_table_user->id)
                                                  ->sum('EXPERTISE');
                    $expertise /= $num_teammate;
                    
                    DB::table('note_final')->insert([
                        'ID_NOTE' => $read_table_user->id,
                        'PARTICIPATION' => round($participation, 2),
                        'ENGAGEMENT' => round($engagement, 2),
                        'TRAVAIL_EN_EQUIPE' => round($travail_en_equipe, 2),
                        'EXPERTISE' => round($expertise, 2),
                        'SUM' => $participation + $engagement + $travail_en_equipe + $expertise,
                    ]);
                }
            }
        }

        note_final();

        return redirect(route('showNotationPage'));
    }

    public function showNoteActuelle (Request $request) {
        $user_id = $request->input('user_id');
        if (DB::table('note_final')->where('ID_NOTE', $user_id)->first()) {
            // DB::table('note_final')->update([]);
            $num_note = DB::table('note')->where('ID_NOTE', $user_id)->count();

            $participation = DB::table('note')->where('ID_NOTE', $user_id)
                                                      ->sum('PARTICIPATION');
            $participation /= $num_note;
            $engagement = DB::table('note')->where('ID_NOTE', $user_id)
                                                   ->sum('ENGAGEMENT');
            $engagement /= $num_note;
            $travail_en_equipe = DB::table('note')->where('ID_NOTE', $user_id)
                                                          ->sum('TRAVAIL_EN_EQUIPE');
            $travail_en_equipe /= $num_note;
            $expertise = DB::table('note')->where('ID_NOTE', $user_id)
                                                  ->sum('EXPERTISE');
            $expertise /= $num_note;
            DB::table('note_final')->where('ID_NOTE', $user_id)->update([
                // 'ID_NOTE' => $user_id,
                'PARTICIPATION' => round($participation, 2),
                'ENGAGEMENT' => round($engagement, 2),
                'TRAVAIL_EN_EQUIPE' => round($travail_en_equipe, 2),
                'EXPERTISE' => round($expertise, 2),
                'SUM' => $participation + $engagement + $travail_en_equipe + $expertise,
            ]);
        }
        else{
            $id_equipe = DB::table('users')->where('id', $user_id)->get('id_equipe');
            $id_equipe = $id_equipe[0]->id_equipe;
            $num_note = DB::table('note')->where('ID_NOTE', $user_id)->count();
            // echo $id_equipe;
            // $num_teammate = DB::table('users')->where('id_equipe', $id_equipe)
            //                                       ->where('id', '!=', $user_id)
            //                                       ->count();
            $participation = DB::table('note')->where('ID_NOTE', $user_id)
                                                      ->sum('PARTICIPATION');
            $participation /= $num_note;
            $engagement = DB::table('note')->where('ID_NOTE', $user_id)
                                                   ->sum('ENGAGEMENT');
            $engagement /= $num_note;
            $travail_en_equipe = DB::table('note')->where('ID_NOTE', $user_id)
                                                          ->sum('TRAVAIL_EN_EQUIPE');
            $travail_en_equipe /= $num_note;
            $expertise = DB::table('note')->where('ID_NOTE', $user_id)
                                                  ->sum('EXPERTISE');
            $expertise /= $num_note;
            DB::table('note_final')->insert([
                'ID_NOTE' => $user_id,
                'PARTICIPATION' => round($participation, 2),
                'ENGAGEMENT' => round($engagement, 2),
                'TRAVAIL_EN_EQUIPE' => round($travail_en_equipe, 2),
                'EXPERTISE' => round($expertise, 2),
                'SUM' => $participation + $engagement + $travail_en_equipe + $expertise,
            ]);
        }
        return redirect(route('showDashboard'));
    }

    public function test() {
        
    }
}
