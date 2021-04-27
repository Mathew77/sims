<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\ProgrammesModel;  

    class ProgrammesController extends Controller {
        
       
 
        public function fetch_programmes($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'user_id' => $data->user_id,
                'programmes' => $data->programmes,
            );
            
            try {
               //Get ALL PROGRAMMES
                $Programmes = new ProgrammesModel();
                $ProgrammesDetails = $Programmes->allProgrammes($payload['user_id'], $payload['programmes']);

                if ($ProgrammesDetails['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $ProgrammesDetails['data'];
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
