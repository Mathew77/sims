<?php
    namespace App;
    use App\Model;

    class SummaryModal extends Model {


        public function cctSummary($state, $period)
        {
            
            $state = "'ABIA','ADAMAWA', 'SOKOTO'";
           
            echo $var =   $state;
            $period = 3;
           echo $myQuery = "SELECT ms_state.Fullname AS STATE, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = $period AND 
                        cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total 
                        FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid IN (ms_state.StateId)
                        WHERE cct_ms_beneficiary.stateid IN 
                        (SELECT `StateId` FROM ms_state WHERE Fullname IN ($var)) AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_state.Fullname";
            
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

        public function geeSummary($state, $period)
        {
            
            $state = "'ABIA','ADAMAWA', 'SOKOTO'";
           
            echo $var =   $state;
            $period = 3;
           echo $myQuery = "SELECT ms_state.Fullname AS STATE, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = $period AND 
                        cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total 
                        FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid IN (ms_state.StateId)
                        WHERE cct_ms_beneficiary.stateid IN 
                        (SELECT `StateId` FROM ms_state WHERE Fullname IN ($var)) AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_state.Fullname";
            
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

        public function npoSummary($state, $period)
        {
            
            $state = "'ABIA','ADAMAWA', 'SOKOTO'";
           
            echo $var =   $state;
            $period = 3;
           echo $myQuery = "SELECT ms_state.Fullname AS STATE, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = $period AND 
                        cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total 
                        FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid IN (ms_state.StateId)
                        WHERE cct_ms_beneficiary.stateid IN 
                        (SELECT `StateId` FROM ms_state WHERE Fullname IN ($var)) AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_state.Fullname";
            
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

        public function sfpSummary($state, $period)
        {
            
            $state = "'ABIA','ADAMAWA', 'SOKOTO'";
           
            echo $var =   $state;
            $period = 3;
           echo $myQuery = "SELECT ms_state.Fullname AS STATE, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = $period AND 
                        cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total 
                        FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid IN (ms_state.StateId)
                        WHERE cct_ms_beneficiary.stateid IN 
                        (SELECT `StateId` FROM ms_state WHERE Fullname IN ($var)) AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_state.Fullname";
            
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
