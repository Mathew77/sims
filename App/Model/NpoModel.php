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
            Parent::bindParams('created', $current_date);
            Parent::bindParams('updated', $current_date);
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

         /**
         * findGeepById
         *
         * fetches a Geep by it's ID
         *
         * @param int $Id  The Id of the row to be returned...
         * @return array Anonymous
         */
        public static function findNpoById($Id)
        {
            $Sql = "SELECT * FROM `npo_tr_core` WHERE id = :id";
            Parent::query($Sql);
            Parent::bindParams('id', $Id);
            $npo = Parent::fetch();
            if (!empty($npo)) {
                return array(
                    'status' => true,
                    'data' => $npo
                );
            }

            return array(
                'status' => false,
                'data' => []
            );
        }

         /**
         * updateNpo
         *
         * update a Npo based on the Npo ID
         *
         * @param array  $Payload  An array of values to be updated...
         * @return array Anonymous
         */
        public static function updateNpo($payload)
        {
            $current_date= Parent::getNowDbDate();
            $Sql = "UPDATE `npo_tr_core` SET 
                    beneficiaryid=:beneficiaryid,
                    periodid=:periodid,
                    collected_date=:collected_date,
                    has_received_stipend=:has_received_stipend,
                    work_days_inperiod=:work_days_inperiod,
                    total_work_days=:total_work_days,
                    absent_reason=:absent_reason,
                    has_gained_skill=:has_gained_skill,
                    has_commence_trade=:has_commence_trade,
                    plan_after=:plan_after,
                    userid=:userid
                    WHERE 
                    id = :id";

            Parent::query($Sql);
            //print_r($payload['beneficiaryid']); 
            Parent::bindParams('id', $payload['id']);
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
            //Parent::bindParams('created', $current_date);
            Parent::bindParams('updated', $current_date);
            $newGeepCore = Parent::execute();    

            $geep = Parent::execute();
            if ($geep) {
                return array(
                    'status' => true,
                    'data' => $payload,
                );
            }

            return array(
                'status' => false,
                'data' => []
            );
        }

      
    }
?>
