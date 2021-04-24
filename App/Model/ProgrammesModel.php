<?php
    namespace App;
    use App\Model;

    class ProgrammesModel extends Model {


        public function allProgrammes()
        {
            
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
        }


    }
?>
