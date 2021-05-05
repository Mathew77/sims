<?php
    namespace App;
    use App\Model;

   
    class NpoModel extends Model {


        public static function createNpoCoreModel($payload)
        {
            $current_date= Parent::getNowDbDate();
            $Sql = "INSERT INTO `npo_tr_core` 
                    (
                        beneficiaryid, 
                        periodid,
                        collected_date,
                        has_received_stipend,
                        work_days_inperiod,
                        total_work_days,
                        absent_reason,
                        has_gained_skill,
                        has_commence_trade,
                        plan_after,
                        userid

                    ) 
                    
                    VALUES
                     (
                        :beneficiaryid, 
                        :periodid,
                        :collected_date,
                        :has_received_stipend,
                        :work_days_inperiod,
                        :total_work_days,
                        :absent_reason,
                        :has_gained_skill,
                        :has_commence_trade,
                        :plan_after,
                        :userid

                     )";
            $sqlquery = Parent::query($Sql);
                
            Parent::bindParams('beneficiaryid', $payload['beneficiaryid']);
            Parent::bindParams('periodid', $payload['periodid']);
            Parent::bindParams('collected_date', $current_date);
            Parent::bindParams('has_received_stipend', $payload['has_received_stipend']);
            Parent::bindParams('work_days_inperiod', $payload['work_days_inperiod']);
            Parent::bindParams('total_work_days', $payload['total_work_days']);
            Parent::bindParams('absent_reason', $payload['absent_reason']);
            Parent::bindParams('has_gained_skill', $payload['has_gained_skill']);
            Parent::bindParams('has_commence_trade', $payload['has_commence_trade']);
            Parent::bindParams('plan_after', $payload['plan_after']);
            Parent::bindParams('userid', $payload['user_id']);
            $newNpoCore = Parent::execute();           
           
            //print( $newCctCore);
            if ($newNpoCore ) {
                $npo_core_id = Parent::lastInsertedId();
                $payload['npo_core_id'] = $npo_core_id;
                $Response = array(
                    'status' => true,
                    'data' => $payload
                );
                return $Response;
            }

            $Response = array(
                'status' => false,
                'data' => []
            );
            return $Response;
        }

      
    }
?>
