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

        return route('showNotationPage');
    }
}
