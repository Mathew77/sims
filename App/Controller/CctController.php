<?php
    namespace App;

    use Exception;
    use App\CctModel;
    use App\PrivilegeModel;
    use App\Controller;
    use Firebase\JWT\JWT;
    use App\TokenModel;
    use App\RequestMiddleware;    

    class CctController extends Controller {
        
        public function CreateCctCore($request, $response)
        {
            $Response = [];
            $sapi_type = php_sapi_name();     
            $Middleware = new RequestMiddleware();
            $Middleware = $Middleware::acceptsJson();   

            if (!$Middleware) {
                array_push($Response, [
                    'status' => 400,
                    'message' => 'Sorry, Only JSON Contents are allowed to access this Endpoint.',
                    'data' => []
                ]);

                $response->code(400)->json($Response);
                return;
            }

            $data = json_decode($request->body());                   

            // Trim the response and create the CCT Core and Transaction....
            $payload = array(
                'beneficiaryid'=> $data->beneficiaryid ,
                'periodid'=> $data->periodid,
                'collected_date'=> $data->collected_date,
                'is_disability'=> $data->is_disability ,
                'is_bank'=> $data->is_bank ,
                'bank_distance'=> $data->bank_distance,
                'is_bvn' => $data->is_bvn,
                'is_nin'=> $data->is_nin ,
                'is_household_head'=> $data->is_household_head,
                'income_source'=> $data->income_source ,
                'household_income_perday' => $data->household_income_perday,
                'is_part_cooperative'=> $data->is_part_cooperative ,
                'person_in_household' => $data->person_in_household,
                'dependant_below_18'=> $data->dependant_below_18 ,
                'dependant_below_2'=> $data->dependant_below_2 ,
                'dependent_in_school'=> $data->dependent_in_school ,
                'children_immunized'=> $data->children_immunized ,
                'remark'=> $data->remark ,
                'created'=> $data->created,
                //This is for the Core Transaction
                'periodid' => $data->periodid,
                'has_collected' => $data->has_collected,
                'payment_date' => $data->payment_date,
                'data_collected_date'=> $data->data_collected_date,
                'amount_paid' => $data->amount_paid,
                'total_amount' => $data->total_amount,
                'is_challenging' => $data->is_challenging,
                'gps' => $data->gps

            );

            try {
                $CctModel = new CctModel();
                $CctData = $CctModel::createCctCore($payload);
                if ($CctData['status']) {
                    
                    // Initialize JWT Token....
                    $tokenExp = date('Y-m-d H:i:s');  

                    // Return Response............
                    $Response['status'] = 201;
                    $Response['message'] = '';
                    $Response['data'] = $UserData;

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
