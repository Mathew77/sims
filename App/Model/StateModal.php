<?php
    namespace App;
    use App\Model;

    class StateModal extends Model {


        public function State($user_id)
        {
           
            if($user_id=="admin"){
                echo $myQuery = "SELECT * FROM `ms_state`";
            }else{
                echo $myQuery = "";
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

        public function Lga($user_id, $state_id)
        {
           
            if($user_id=="admin"){
                echo $myQuery = "SELECT * FROM `ms_lga` ";
            }else{
                echo $myQuery = "SELECT * FROM `ms_lga` WHERE `StateId` = 2";
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
