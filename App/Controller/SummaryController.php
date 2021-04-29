<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\SummaryModal;  

    class SummaryController extends Controller {
        
       
 
        public function fetch_cct_summary($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response $user_id, $user_lga
             $payload = array(
                'state_id' => $data->state_id,
                'period' => $data->period,
                'user_id' => $data->user_id,
                'user_lga' => $data->user_lga,
            );
            
            try {
               //Get CCT PERIOD
                $Summary = new SummaryModal();
                $SummaryDetail = $Summary->cctSummary($payload['state_id'], $payload['period']);

                if ($SummaryDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $SummaryDetail['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 400;
                $Response['data'] = [];
                $Response['message'] = 'An unexpected error occurred and your User Priviledges could not be retrieved. Please, try again later.';
                
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

        public function fetch_gee_summary($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'state_id' => $data->state_id,
                'period' => $data->period,
                'user_id' => $data->user_id,
                'user_lga' => $data->user_lga
            );
            
            try {
               //Get CCT PERIOD
                $Summary = new SummaryModal();
                $SummaryDetail = $Summary->geeSummary($payload['state_id'], $payload['period'],$payload['user_id'], $payload['user_lga']);

                if ($SummaryDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $SummaryDetail['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 400;
                $Response['data'] = [];
                $Response['message'] = 'An unexpected error occurred and your User Priviledges could not be retrieved. Please, try again later.';
                
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

        public function fetch_npo_summary($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'state_id' => $data->state_id,
                'period' => $data->period,
                'user_id' => $data->user_id,
                'user_lga' => $data->user_lga
            );
            
            try {
               //Get CCT PERIOD
                $Summary = new SummaryModal();
                $SummaryDetail = $Summary->npoSummary($payload['state_id'], $payload['period'],$payload['user_id'], $payload['user_lga']);

                if ($SummaryDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $SummaryDetail['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 400;
                $Response['data'] = [];
                $Response['message'] = 'An unexpected error occurred and your User Priviledges could not be retrieved. Please, try again later.';
                
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
        
        public function fetch_sfp_summary($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'state_id' => $data->state_id,
                'period' => $data->period,
                'user_id' => $data->user_id,
                'user_lga' => $data->user_lga
            );
            
            try {
               //Get CCT PERIOD
                $Summary = new SummaryModal();
                $SummaryDetail = $Summary->sfpSummary($payload['state_id'], $payload['period'],$payload['user_id'], $payload['user_lga']);

                if ($SummaryDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $SummaryDetail['data'];
                    $Response['message'] = '';

                    $response->code(200)->json($Response);
                    return;
                }

                $Response['status'] = 200;
                $Response['data'] = [];
                $Response['message'] = 'No record found. Please, try again later.';
                
                $response->code(200)->json($Response);
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
