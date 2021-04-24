<?php
    namespace App;
    use App\Model;

    class Util extends Model {


        public function SeperateToString($string, $delimeter=",", $quote="'")
            {
                $array = explode($delimeter, $string);
                $output = "";
                $counter = 1;
                foreach($array as $v)
                {
                    if(count($array) == $counter)
                    {
                        $output .= $quote.$v.$quote;
                    }
                    else
                    {
                        $output .= $quote.$v.$quote.",";
                    }
                    $counter++;
                }
                return $output;
            }

 }
?>