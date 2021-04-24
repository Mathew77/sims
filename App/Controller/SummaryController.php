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
             // Trim the response 
             $payload = array(
                'state_id' => $data->state_id,
                'period' => $data->period,
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
            );
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->geePeriod($payload['state_id'], $payload['period']);

                if ($ProgramPeriod['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $ProgramPeriod['data'];
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
            );
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->npoPeriod($payload['state_id'], $payload['period']);

                if ($ProgramPeriod['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $ProgramPeriod['data'];
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
            );
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->sfpPeriod($payload['state_id'], $payload['period']);

                if ($ProgramPeriod['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $ProgramPeriod['data'];
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
    }
?>
