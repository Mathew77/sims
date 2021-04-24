<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\StateModal;  


    class StateController extends Controller {
        
       
 
        public function fetch_state($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'user_id' => $data->user_id,
            );
            try {
               //Get CCT PERIOD
                $States = new StateModal();
                $stateDetail = $States->State($payload['user_id']);

                if ($stateDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $stateDetail['data'];
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

        public function fetch_lga($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'user_id' => $data->user_id,
                'state_id' => $data->state_id,
            );
            try {

                $States = new StateModal();
                $stateDetail = $States->State($payload['user_id'], $payload['state_id']);
                if ($stateDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $stateDetail['data'];
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
