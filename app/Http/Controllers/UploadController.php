<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use function PHPSTORM_META\type;

class UploadController extends Controller
{
    public function showUploadPage() {
        return view('upload')->with('isUploaded', 'pas_encore');
    }

    public function read_csv() {
        $file = $_FILES['excel_path'];
        $file_name = $file['tmp_name'];

        if($file_name == '') {
            // die("Please choose a document. ");
            return view('upload')->with('isUploaded', 'false');
            // return redirect(route('showUploadPage', array('isUploaded' => 'false')));
        }

        $handle = fopen($file_name, 'r');
        if($handle === FALSE) {
            // die("Open Error");
            // return redirect(route('showUploadPage'))->with('isUploaded', 'false');
            return view('upload')->with('isUploaded', 'false');
        };

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
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

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
                $initial_password = generateRandomString();
                DB::table('users')->insert([
                    'id_equipe' => $array['id_equipe'],
                    'nom' => $array['nom'],
                    'prenom' => $array['prenom'],
                    'email' => $array['email'],
                    'password' => bcrypt($initial_password),
                    'initial_password' => Crypt::encryptString($initial_password),
                    'permission' => 'etudiant'
                ]);
            }
        } else {
            // return redirect(route('showUploadPage'))->with('isUploaded', 'false');
            return view('upload')->with('isUploaded', 'false');
        }
        return redirect(route('showUploadPage'))->with('isUploaded', 'true');
    }

    
}