<?php
    namespace App;
    use App\Model;
    
    

    class StateModal extends Model {


        public function State($user_id, $user_state)
        {
           
             $StringData = Parent::SeperateToString($user_state);

            if($user_state=="admin"){
               $myQuery = "SELECT * FROM `ms_state`";
            }else{
                $myQuery = "SELECT * FROM `ms_state` WHERE  Fullname IN ($StringData)";
            }
           
            
            $Sql = $myQuery;
            Parent::query($Sql);

            $Data = Parent::fetchAll();
            if (!empty($Data)) {
                return array(
                    'status' => true,
                    'data' => $Data
                );
            }

            return array(
                'status' => false,
                'data' => []
            );
        }

        public function Lga($user_id, $user_lga, $state_id)
        {
           
            $StringData = Parent::SeperateToString($user_lga);
            if($user_lga=="admin"){
                 $myQuery = "SELECT * FROM `ms_lga` ";
            }else{
                 $myQuery = "SELECT * FROM `ms_lga` WHERE StateId=$state_id AND Fullname IN ($StringData) ";
            }
           
            
            $Sql = $myQuery;
            Parent::query($Sql);

            $Data = Parent::fetchAll();
            if (!empty($Data)) {
                return array(
                    'status' => true,
                    'data' => $Data
                );
            }

            return array(
                'status' => false,
                'data' => []
            );
        }

    }
?>
