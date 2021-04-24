<?php
    namespace App;
    use App\Model;

    class SummaryModal extends Model {


        public function cctSummary($state, $period)
        {
            $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = 3 
                        AND cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON cct_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE cct_ms_beneficiary.stateid = $period 
                        AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            
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

           $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = 3 
                        AND cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON cct_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE cct_ms_beneficiary.stateid = $period 
                        AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            
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
            
            $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = 3 
                        AND cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON cct_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE cct_ms_beneficiary.stateid = $period 
                        AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            
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
            
            $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = 3 
                        AND cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON cct_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE cct_ms_beneficiary.stateid = $period 
                        AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            
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
