<?php
    namespace App;
    use App\Model;
    
    

    class BeneficiaryModel extends Model {


        public function ListOfbeneficiary($lga_id, $state_id,$programme_type)
        {
           
             //$StringData = Parent::SeperateToString($user_state);
            if($programme_type=="cct"){  
                $myQuery = "SELECT
                            *,
                            if(cct_tr_core.id > 0, 'Yes','No') AS record,
                            cct_tr_core.id AS ID,
                            cct_tr_core.periodid AS period_id
                            FROM
                            cct_ms_beneficiary
                            LEFT JOIN cct_tr_core ON cct_ms_beneficiary.beneficiaryid = cct_tr_core.beneficiaryid
                            WHERE
                            cct_ms_beneficiary.stateid = $state_id AND
                            cct_ms_beneficiary.lgaid = $lga_id";
                
            }elseif($programme_type=="geep"){
                $myQuery = "SELECT
                            *,
                            if(gee_tr_core.id > 0, 'Yes','No') AS record,
                            gee_tr_core.id AS ID,
                            gee_tr_core.periodid AS period_id
                            FROM
                            gee_ms_beneficiary
                            LEFT JOIN gee_tr_core ON gee_ms_beneficiary.beneficiaryid = gee_tr_core.beneficiaryid
                            WHERE
                            gee_ms_beneficiary.stateid = $state_id AND
                            gee_ms_beneficiary.lgaid = $lga_id";
            }elseif($programme_type=="npower"){
                 $myQuery ="SELECT
                            *,
                            if(npo_tr_core.id > 0, 'Yes','No') AS record,
                            npo_tr_core.id AS ID,
                            npo_tr_core.periodid AS period_id
                            FROM
                            npo_ms_beneficiary
                            LEFT JOIN npo_tr_core ON npo_ms_beneficiary.beneficiaryid = npo_tr_core.beneficiaryid
                            WHERE
                            npo_ms_beneficiary.stateid = $state_id AND
                            npo_ms_beneficiary.lgaid = $lga_id";
                
            }elseif($programme_type=="nhgsfp"){
                $myQuery = "SELECT
                            *,
                            if(sfp_tr_core.id > 0, 'Yes','No') AS record,
                            sfp_tr_core.id AS ID,
                            sfp_tr_core.periodid AS period_id
                            FROM
                            sfp_ms_beneficiary
                            LEFT JOIN sfp_tr_core ON sfp_ms_beneficiary.beneficiaryid = sfp_tr_core.beneficiaryid
                            WHERE
                            sfp_ms_beneficiary.stateid = $state_id AND
                            sfp_ms_beneficiary.lgaid = $lga_id";

            }else{
                $myQuery =null;
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
