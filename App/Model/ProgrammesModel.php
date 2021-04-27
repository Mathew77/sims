<?php
    namespace App;
    use App\Model;

    class ProgrammesModel extends Model {


        public function allProgrammes($user_id, $programmes)
        {
            if($programmes=='admin'){
             $Sql = "SELECT * FROM `ms_program` ";
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

        }else
        {
            $StringData = Parent::SeperateToString($programmes);
            $Sql = "SELECT * FROM `ms_program` WHERE label IN ($StringData) ";
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


    }
?>
