<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function palindrome(){
        $count=0;
        $palindromes = array("level", "radar", "sweet","lolol");
                $N=count($palindromes);

        for ($x = 0; $x <$N; $x++) {
             $l = 0;
             $r = strlen($palindromes[$x]) - 1;
             $flag = 0;

            while($r > $l){
                if ($palindromes[$x][$l] != $palindromes[$x][$r]){
                    $flag = 1;
                     break;
                 }
             $l++;
             $r--;
            }

            if ($flag == 0){
                $count+=1;
            }

        }
        return response()->json([
            "status" => "Success",
            "Number of palindromes is"=> $count
        ], 200);
    }
    public function secondsPassed(){
        $starttime = mktime(0,0,0,4,14,1732);
        $endtime = microtime(true);
        $timediff = $endtime - $starttime;

        return response()->json([
            "status" => "Success",
            "Seconds passed since 1732:"=> $timediff
        ], 200);
    }
    public function textOnly(){
        $curl = curl_init();
        $url="https://icanhazdadjoke.com/slack";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 4);
        $json = curl_exec($curl);
        if(!$json) {
            echo curl_error($curl);
        }
        curl_close($curl);
        $jsonArray = json_decode($json,true);
        $key = "attachments";
        $inner_arr = $jsonArray[$key];
        $first_element=reset($inner_arr);
        $string=json_encode($first_element,true);
        $array=json_decode($string,true);
         $key2 = "text";
        $result = $array[$key2];
        return $result;
    }

}
