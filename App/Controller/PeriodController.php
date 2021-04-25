<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\PeriodModal;  

    class PeriodController extends Controller {
        
       
 
        public function fetch_cct_period($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
          
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->cctPeriod();

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

        public function fetch_gee_period($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
           
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->geePeriod();

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

        public function fetch_npo_period($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
           
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->npoPeriod();

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
        
        public function fetch_sfp_period($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
           
            try {
               //Get CCT PERIOD
                $PeriodModal2 = new PeriodModal();
                $ProgramPeriod = $PeriodModal2->sfpPeriod();

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
