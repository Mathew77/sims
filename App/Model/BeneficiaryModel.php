<?php
    namespace App;
    use App\Model;
    
    

    class BeneficiaryModel extends Model {


        public function ListOfbeneficiary($lga_id, $state_id,$programme_type)
        {
           
             //$StringData = Parent::SeperateToString($user_state);
            if($programme_type=="cct"){  
                $myQuery = "SELECT * FROM `cct_ms_beneficiary` WHERE `lgaid`=$lga_id AND `stateid`=$state_id";
            }elseif($programme_type=="geep"){
                $myQuery = "SELECT * FROM `gee_ms_beneficiary` WHERE `lgaid`=$lga_id AND `stateid`=$state_id";
            }elseif($programme_type=="npower"){
                $myQuery = "SELECT * FROM `npo_ms_beneficiary` WHERE `lgaid`=$lga_id AND `stateid`=$state_id";
            }elseif($programme_type=="sfp"){
                $myQuery = "SELECT * FROM `sfp_ms_beneficiary` WHERE `lgaid`=$lga_id AND `stateid`=$state_id";
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
