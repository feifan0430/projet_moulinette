<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use function PHPSTORM_META\type;

class UploadController extends Controller
{
    public function showUploadPage() {
        return view('upload');
    }

    public function read_csv() {
        $file = $_FILES['excel_path'];
        $file_name = $file['tmp_name'];

        if($file_name == '') {
            die("Please choose a document. ");
        }

        $handle = fopen($file_name, 'r');
        if($handle === FALSE) die("Open Error");

        $csv_val = array('nom', 'prenom', 'email', 'id_equipe');
        $csv_arr = array();

        // remove DOM
        $data = fgetcsv($handle);
        // $data[0] = substr($data[0], 3);
        $tmp_row = array();
        foreach ($csv_val as $k => $v) {
            $tmp_row[$v] = trim(iconv('utf-8', 'utf-8', ltrim($data[$k], '`')));
        }
        // dd($tmp_row);
        $legal_input = 'true';
        foreach ($tmp_row as $key => $value) {
            if(strcmp($key, $value) != 0) {
                $legal_input = 'false';
            }
            echo (strcmp($key, $value)) . "<br>";
            echo ($key) . "<br>";
            echo "key: " . $key . " value: " . $value . "<br>";
        }
        // echo $legal_input;

        if($legal_input == 'true') {
            while(($data = fgetcsv($handle)) !== FALSE) {
                $tmp_row = array();
                foreach ($csv_val as $k => $v) {
                    $tmp_row[$v] = trim(iconv('gbk','utf-8', ltrim($data[$k], '`')));
                }
                $csv_arr[] = $tmp_row;
            }
    
            fclose($handle);
            // dd($csv_arr);
            foreach ($csv_arr as $key => $array) {
                DB::table('users')->insert([
                    // 'ID' => $array['ID'],
                    // 'NOM' => $array['NOM']
                    'id_equipe' => $array['id_equipe'],
                    'nom' => $array['nom'],
                    'prenom' => $array['prenom'],
                    'email' => $array['email'],
                    'password' => bcrypt($array['nom']),
                    'initial_password' => Crypt::encryptString($array['nom'])
                ]);
            }
        } else {
            echo "error";
        }
        return redirect(route('showUploadPage'));
    }

    
}