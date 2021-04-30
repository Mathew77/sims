<?php
    namespace App;
    use App\Model;

   
    class CctModel extends Model {


        public static function createCctCore($payload)
        {
           $Sql = "INSERT INTO `cct_tr_core` 
                    (
                        beneficiaryid, 
                        periodid,
                        collected_date,
                        is_disability,
                        is_bank,
                        bank_distance,
                        is_bvn,
                        is_nin,
                        is_household_head,
                        income_source,
                        household_income_perday,
                        is_part_cooperative,
                        person_in_household,
                        dependant_below_18,
                        dependant_below_2,
                        dependent_in_school,
                        children_immunized,
                        remark,
                        created
                    ) 
                    
                    VALUES
                     (
                        :beneficiaryid, 
                        :periodid,
                        :collected_date,
                        :is_disability,
                        :is_bank,
                        :bank_distance,
                        :is_bvn,
                        :is_nin,
                        :is_household_head,
                        :income_source,
                        :household_income_perday,
                        :is_part_cooperative,
                        :person_in_household,
                        :dependant_below_18,
                        :dependant_below_2,
                        :dependent_in_school,
                        :children_immunized,
                        :remark,
                        :created
                     )";
            Parent::query($Sql);
            Parent::bindParams('beneficiaryid', $payload['beneficiaryid']);
            Parent::bindParams('periodid', $payload['periodid']);
            Parent::bindParams('collected_date', $payload['collected_date']);
            Parent::bindParams('is_disability', $payload['is_disability']);
            Parent::bindParams('is_bank', $payload['is_bank']);
            Parent::bindParams('bank_distance', $payload['bank_distance']);
            Parent::bindParams('is_bvn', $payload['is_bvn']);
            Parent::bindParams('is_nin', $payload['is_nin']);

            Parent::bindParams('is_household_head', $payload['is_household_head']);
            Parent::bindParams('income_source', $payload['income_source']);
            Parent::bindParams('household_income_perday', $payload['household_income_perday']);
            Parent::bindParams('is_part_cooperative', $payload['is_part_cooperative']);
            Parent::bindParams('person_in_household', $payload['person_in_household']);
            Parent::bindParams('dependant_below_18', $payload['dependant_below_18']);
            Parent::bindParams('dependant_below_2', $payload['dependant_below_2']);
            Parent::bindParams('dependent_in_school', $payload['dependent_in_school']);
            Parent::bindParams('children_immunized', $payload['children_immunized']);
            Parent::bindParams('remark', $payload['remark']);
            Parent::bindParams('created', $payload['created']);

            $newCctCore = Parent::execute();           
           
            //print( $newCctCore);
            if ($newCctCore ) {
                $cct_core_id = Parent::lastInsertedId();
                $payload['cct_core_id'] = $cct_core_id;
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

        public static function createCctCorePeriodic($payload)
        {
                      
            //FOR CORE TRANSACTION PERIOD
            $Sql = "INSERT INTO `cct_tr_periodic` 
                    (
                        beneficiaryid, 
                        periodid,
                        has_collected,
                        payment_date,
                        data_collected_date,
                        amount_paid,
                        total_amount,
                        is_challenging,
                        gps

                    ) 
                    
                    VALUES
                     (
                        :beneficiaryid, 
                        :periodid,
                        :has_collected,
                        :payment_date,
                        :data_collected_date,
                        :amount_paid,
                        :total_amount,
                        :is_challenging,
                        :gps

                     )";
            Parent::query($Sql);
            // Bind Params...
                Parent::bindParams('beneficiaryid', $payload['beneficiaryid']);
                Parent::bindParams('periodid', $payload['periodid']);
                Parent::bindParams('has_collected', $payload['has_collected']);
                Parent::bindParams('payment_date', $payload['payment_date']);
                Parent::bindParams('data_collected_date', $payload['data_collected_date']);
                Parent::bindParams('amount_paid', $payload['amount_paid']);
                Parent::bindParams('total_amount', $payload['total_amount']);
                Parent::bindParams('is_challenging', $payload['is_challenging']);
                Parent::bindParams('gps', $payload['gps']);
    
                $newCctCorePeriod = Parent::execute();
                var_dump($newCctCorePeriod);
           
            //print( $newCctCore);
            if ( $newCctCorePeriod) {
                $cct_core_id = Parent::lastInsertedId();
                $payload['cct_core_id'] = $cct_core_id;
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
