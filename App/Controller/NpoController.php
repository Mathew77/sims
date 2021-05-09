<?php
    namespace App;

    use Exception;
    use App\NpoModel;
    use App\Controller;
    use App\BeneficiaryModel;
    

    class NpoController extends Controller {
        
        public function CreateNpoCores($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());                   
            //var_dump( $data);
            // Trim the response and create the CCT Core and Transaction....
            $payload = array(
                'beneficiaryid'=> $data->beneficiaryid,
                'periodid'=> $data->periodid,
                'collected_date'=> $data->collected_date,
                'has_received_stipend'=> $data->has_received_stipend,
                'work_days_inperiod'=> $data->work_days_inperiod,
                'total_work_days' => $data->total_work_days,
                'absent_reason'=> $data->absent_reason,
                'has_gained_skill'=> $data->has_gained_skill,
                'has_commence_trade'=> $data->has_commence_trade,
                'plan_after' => $data->plan_after,
                'user_id' => $data->user_id

            );

            try {
                $NpoModel = new NpoModel();
                $NpoModel = $NpoModel::createNpoCoreModel($payload);
                
                if ($NpoModel['status'] ) {
                    
                    // Initialize JWT Token....
                    $tokenExp = date('Y-m-d H:i:s');  

                    // Return Response............
                    $Response['status'] = 201;
                    $Response['message'] = '';
                    $Response['data'] = $NpoModel;

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

        public function getNpoById($request, $response)
        {
            $Response = [];

            try {
                
                $NpoModel = new NpoModel();
                $NpoData = $NpoModel::findNpoById($request->id);
                $BeneficiciaryModel = new BeneficiaryModel();
                $BeneficiaryDetail = $BeneficiciaryModel->beneficiaryDetail($NpoData['data']['beneficiaryid'], "npower");
                $NpoData['data']['beneficiaryDetail'] = $BeneficiaryDetail;
                if ($NpoData['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $NpoData['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 400;
                $Response['data'] = [];
                $Response['message'] = 'An unexpected error occurred and your product could not be retrieved. Please, try again later.';
                
                $response->code(400)->json($Response);
                return;
            } catch (Exception $e) {
                $Response['status'] = 500;
                $Response['message'] = $e->getMessage();
                $Response['data'] = [];
                
                $response->code(500)->json($Response);
                return;
            }
        }

          /**
         * updateGeep
         *
         * Updates a Geep.
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
        */
        public function updateNpo($request, $response)
        {
            $Response = [];
            $data = json_decode($request->body()); 
             $Payload = array(
                'id' => $request->id,
                'beneficiaryid'=> $data->beneficiaryid,
                'periodid'=> $data->periodid,
                'collected_date'=> $data->collected_date,
                'has_received_stipend'=> $data->has_received_stipend,
                'work_days_inperiod'=> $data->work_days_inperiod,
                'total_work_days' => $data->total_work_days,
                'absent_reason'=> $data->absent_reason,
                'has_gained_skill'=> $data->has_gained_skill,
                'has_commence_trade'=> $data->has_commence_trade,
                'plan_after' => $data->plan_after,
                'user_id' => $data->user_id,
  
            );

            try {  
                $NpoModel = new NpoModel(); 
           
                $Npo = $NpoModel::updateNpo($Payload);
                if ($Npo['status']) {
                    $Npo['data'] = $NpoModel::findNpoById($request->id)['data'];
                    $Response['status'] = 200;
                    $Response['data'] = $Npo['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 400;
                $Response['data'] = [];
                $Response['message'] = 'An unexpected error occurred and your product could not be updated. Please, try again later.';
                
                $response->code(400)->json($Response);
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