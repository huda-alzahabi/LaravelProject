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

}
