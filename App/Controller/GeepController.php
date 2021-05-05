<?php
    namespace App;

    use Exception;
    use App\GeepModel;
    use App\Controller;
    

    class GeepController extends Controller {
        
        public function CreateGeepCores($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());                   
            //var_dump( $data);
            // Trim the response and create the CCT Core and Transaction....
            $payload = array(
                'beneficiaryid'=> $data->beneficiaryid,
                'periodid'=> $data->periodid,
                'created'=> $data->created,
                'remark'=> $data->remark ,
                'dependent_immunized'=> $data->dependent_immunized,
                'is_dependent_below_2'=> $data->is_dependent_below_2,
                'is_dependent_in_school' => $data->is_dependent_in_school,
                'dependent_below_2'=> $data->dependent_below_2,
                'dependent_below_18'=> $data->dependent_below_18,
                'is_dependent'=> $data->is_dependent,
                'is_disabled' => $data->is_disabled,
                'is_head_of_household' => $data->is_head_of_household,
                'person_in_household' => $data->person_in_household,
                'tax_amount'=> $data->tax_amount ,
                'frequency_of_tax'=> $data->frequency_of_tax ,
                'is_tax_payer'=> $data->is_tax_payer ,
                'profit_plough_back'=> $data->profit_plough_back ,
                'has_paid_back'=> $data->has_paid_back ,
                'repayment_due'=> $data->repayment_due,
                'staff_employed_male' => $data->staff_employed_male,
                'staff_employed_female' => $data->staff_employed_female,
                'category_of_loan' => $data->category_of_loan,
                'amount_received'=> $data->amount_received,
                'avg_daily_turnover' => $data->avg_daily_turnover,
                'avg_daily_expense' => $data->avg_daily_expense,
                'avg_turnover_bf_loan' => $data->avg_turnover_bf_loan,
                'gps' => $data->gps,
                'user_id' => $data->user_id,

            );

            try {
                $GeepModel = new GeepModel();
                $GeepData = $GeepModel::createGeepCoreModel($payload);
                
                if ($GeepData['status'] ) {
                    
                    // Initialize JWT Token....
                    $tokenExp = date('Y-m-d H:i:s');  

                    // Return Response............
                    $Response['status'] = 201;
                    $Response['message'] = '';
                    $Response['data'] = $GeepData;

                    $response->code(201)->json($Response);
                    return;
                }

                $Response['status'] = 500;
                $Response['message'] = 'An unexpected error occurred and your account could not be created. Please, try again later.';
                $Response['data'] = [];

                $response->code(500)->json($Response);
                return;
            } catch (Exception $e) {
                $Response['status'] = 500;
                $Response['message'] = $e->getMessage();
                $Response['data'] = [];
                
                $response->code(500)->json($Response);
                return;
            }
        }


        
    }
?>
