<?php
    namespace App;
    use App\Model;

    class PeriodModal extends Model {


        public function cctPeriod()
        {
            
             $Sql = "SELECT * FROM `cct_ms_period` WHERE `start_date`<= CURDATE()";
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

        public function geePeriod()
        {
            
             $Sql = "SELECT * FROM `gee_ms_period`  WHERE `start_date`<= CURDATE() ";
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

        public function npoPeriod()
        {
            
             $Sql = "SELECT * FROM `npo_ms_period` WHERE `start_date`<= CURDATE()";
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

        public function sfpPeriod()
        {
            
             $Sql = "SELECT * FROM `sfp_ms_period` WHERE `start_date`<= CURDATE() ";
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
