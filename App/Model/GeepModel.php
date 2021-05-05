<?php
    namespace App;
    use App\Model;

   
    class GeepModel extends Model {


        public static function createGeepCoreModel($payload)
        {
           $Sql = "INSERT INTO `gee_tr_core` 
                    (
                        beneficiaryid, 
                        periodid,
                        dependent_immunized,
                        is_dependent_below_2,
                        is_dependent_in_school,
                        dependent_below_2,
                        is_head_of_household,
                        is_dependent,
                        dependent_below_18,
                        is_disabled,
                        tax_amount,
                        frequency_of_tax,
                        is_tax_payer,
                        profit_plough_back,
                        has_paid_back,
                        repayment_due,
                        staff_employed_male,
                        staff_employed_female,
                        category_of_loan,
                        amount_received,
                        avg_daily_turnover,
                        avg_daily_expense,
                        avg_turnover_bf_loan,
                        remark,
                        created,
                        gps,
                        user_id

                    ) 
                    
                    VALUES
                     (
                        :beneficiaryid, 
                        :periodid,
                        :dependent_immunized,
                        :is_dependent_below_2,
                        :is_dependent_in_school,
                        :dependent_below_2,
                        :is_head_of_household,
                        :is_dependent,
                        :dependent_below_18,
                        :is_disabled,
                        :tax_amount,
                        :frequency_of_tax,
                        :is_tax_payer,
                        :profit_plough_back,
                        :has_paid_back,
                        :repayment_due,
                        :staff_employed_male,
                        :staff_employed_female,
                        :category_of_loan,
                        :amount_received,
                        :avg_daily_turnover,
                        :avg_daily_expense,
                        :avg_turnover_bf_loan,
                        :remark,
                        :created,
                        :gps,
                        :user_id
                     )";
            Parent::query($Sql);
            Parent::bindParams('beneficiaryid', $payload['beneficiaryid']);
            Parent::bindParams('periodid', $payload['periodid']);
            Parent::bindParams('dependent_immunized', $payload['dependent_immunized']);
            Parent::bindParams('is_dependent_below_2', $payload['is_dependent_below_2']);
            Parent::bindParams('is_dependent_in_school', $payload['is_dependent_in_school']);
            Parent::bindParams('dependent_below_2', $payload['dependent_below_2']);

            Parent::bindParams('is_head_of_household', $payload['is_head_of_household']);
            Parent::bindParams('is_dependent', $payload['is_dependent']);
            Parent::bindParams('dependent_below_18', $payload['dependent_below_18']);
            Parent::bindParams('is_disabled', $payload['is_disabled']);
            Parent::bindParams('tax_amount', $payload['tax_amount']);
            Parent::bindParams('frequency_of_tax', $payload['frequency_of_tax']);
            Parent::bindParams('is_tax_payer', $payload['is_tax_payer']);
            Parent::bindParams('profit_plough_back', $payload['profit_plough_back']);
            Parent::bindParams('has_paid_back', $payload['has_paid_back']);

            Parent::bindParams('repayment_due', $payload['repayment_due']);
            Parent::bindParams('staff_employed_male', $payload['staff_employed_male']);
            Parent::bindParams('staff_employed_female', $payload['staff_employed_female']);
            Parent::bindParams('category_of_loan', $payload['category_of_loan']);

            Parent::bindParams('amount_received', $payload['amount_received']);
            Parent::bindParams('avg_daily_turnover', $payload['avg_daily_turnover']);
            Parent::bindParams('avg_daily_expense', $payload['avg_daily_expense']);
            Parent::bindParams('avg_turnover_bf_loan', $payload['avg_turnover_bf_loan']);

            Parent::bindParams('remark', $payload['remark']);
            Parent::bindParams('created', $payload['created']);
            Parent::bindParams('gps', $payload['gps']);
            Parent::bindParams('user_id', $payload['user_id']);
            $newGeepCore = Parent::execute();           
           
            //print( $newCctCore);
            if ($newGeepCore ) {
                $geep_core_id = Parent::lastInsertedId();
                $payload['geep_core_id'] = $geep_core_id;
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
