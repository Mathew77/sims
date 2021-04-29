<?php
    namespace App;
    use App\Model;

    class SummaryModal extends Model {


        public function cctSummary($state, $period, $user_id, $user_lga)
        {
            if($user_id !='admin'){
            $StringData = Parent::SeperateToString($user_lga);
            $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid  IN (SELECT LgaId FROM `ms_lga` WHERE StateId=$state  AND Fullname IN ($StringData))  
                        AND cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON cct_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE cct_ms_beneficiary.stateid = $state
                        AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            }else{
                $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(cct_tr_core.id) 
                        FROM cct_tr_core 
                        WHERE cct_tr_core.periodid = $period 
                        AND cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid) as current, Count(cct_ms_beneficiary.beneficiaryid) AS total FROM cct_ms_beneficiary 
                        INNER JOIN ms_state ON cct_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON cct_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE cct_ms_beneficiary.stateid = $state
                        AND cct_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
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

        public function geeSummary($state, $period, $user_id, $user_lga)
        {
            if($user_id !='admin'){
            $StringData = Parent::SeperateToString($user_lga);
            $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                            (SELECT Count(gee_tr_core.id) 
                            FROM gee_tr_core 
                            WHERE gee_tr_core.periodid  IN (SELECT LgaId FROM `ms_lga` WHERE StateId=$state  AND Fullname IN ($StringData))  
                            AND gee_ms_beneficiary.beneficiaryid = gee_tr_core.beneficiaryid) as current, Count(gee_ms_beneficiary.beneficiaryid) AS total FROM gee_ms_beneficiary 
                            INNER JOIN ms_state ON gee_ms_beneficiary.stateid = ms_state.StateId 
                            INNER JOIN ms_lga ON gee_ms_beneficiary.lgaid = ms_lga.LgaId 
                            WHERE gee_ms_beneficiary.stateid = $state 
                            AND gee_ms_beneficiary.active = 1 
                            GROUP BY ms_lga.Fullname";
            }else{
                $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                            (SELECT Count(gee_tr_core.id) 
                            FROM gee_tr_core 
                            WHERE gee_tr_core.periodid = $period 
                            AND gee_ms_beneficiary.beneficiaryid = gee_tr_core.beneficiaryid) as current, Count(gee_ms_beneficiary.beneficiaryid) AS total FROM gee_ms_beneficiary 
                            INNER JOIN ms_state ON gee_ms_beneficiary.stateid = ms_state.StateId 
                            INNER JOIN ms_lga ON gee_ms_beneficiary.lgaid = ms_lga.LgaId 
                            WHERE gee_ms_beneficiary.stateid = $state 
                            AND gee_ms_beneficiary.active = 1 
                            GROUP BY ms_lga.Fullname";
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

        public function npoSummary($state, $period, $user_id, $user_lga)
        {
            if($user_id !='admin'){
            $StringData = Parent::SeperateToString($user_lga);
            $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(npo_tr_core.id) 
                        FROM npo_tr_core 
                        WHERE npo_tr_core.periodid IN (SELECT LgaId FROM `ms_lga` WHERE StateId=$state  AND Fullname IN ($StringData)) 
                        AND npo_ms_beneficiary.beneficiaryid = npo_tr_core.beneficiaryid) as current, Count(npo_ms_beneficiary.beneficiaryid) AS total FROM npo_ms_beneficiary 
                        INNER JOIN ms_state ON npo_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON npo_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE npo_ms_beneficiary.stateid = $state
                        AND npo_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            }else{
                $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(npo_tr_core.id) 
                        FROM npo_tr_core 
                        WHERE npo_tr_core.periodid = $period 
                        AND npo_ms_beneficiary.beneficiaryid = npo_tr_core.beneficiaryid) as current, Count(npo_ms_beneficiary.beneficiaryid) AS total FROM npo_ms_beneficiary 
                        INNER JOIN ms_state ON npo_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON npo_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE npo_ms_beneficiary.stateid = $state
                        AND npo_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
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

        public function sfpSummary($state, $period, $user_id, $user_lga)
        {
            if($user_id !='admin'){
            $StringData = Parent::SeperateToString($user_lga);
            
             $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(sfp_tr_core.coreid) 
                        FROM sfp_tr_core 
                        WHERE sfp_tr_core.periodid IN (SELECT LgaId FROM `ms_lga` WHERE StateId=$state  AND Fullname IN ($StringData)) 
                        AND sfp_ms_beneficiary.beneficiaryid = sfp_tr_core.beneficiaryid) as current, Count(sfp_ms_beneficiary.beneficiaryid) AS total FROM sfp_ms_beneficiary 
                        INNER JOIN ms_state ON sfp_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON sfp_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE sfp_ms_beneficiary.stateid = $state
                        AND sfp_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
            }else{
                $myQuery = "SELECT ms_lga.Fullname AS LGA, 
                        (SELECT Count(sfp_tr_core.coreid) 
                        FROM sfp_tr_core 
                        WHERE sfp_tr_core.periodid = $period 
                        AND sfp_ms_beneficiary.beneficiaryid = sfp_tr_core.beneficiaryid) as current, Count(sfp_ms_beneficiary.beneficiaryid) AS total FROM sfp_ms_beneficiary 
                        INNER JOIN ms_state ON sfp_ms_beneficiary.stateid = ms_state.StateId 
                        INNER JOIN ms_lga ON sfp_ms_beneficiary.lgaid = ms_lga.LgaId 
                        WHERE sfp_ms_beneficiary.stateid = $state
                        AND sfp_ms_beneficiary.active = 1 
                        GROUP BY ms_lga.Fullname";
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
