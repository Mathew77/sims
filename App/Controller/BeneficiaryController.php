<?php
    namespace App;

    use Exception;
    use App\BeneficiaryModel;



    class BeneficiaryController extends Controller {
        
       
 
        public function fetch_beneficiary($request, $response)
        {
            $Response = [];

            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'lga_id' => $data->lga_id,
                'state_id' => $data->state_id,
                'programme_type' => $data->programme_type,
            );
            try {
               // $user_states
                $benefit = new BeneficiaryModel();
                $benefitDetail = $benefit->ListOfbeneficiary($payload['lga_id'], $payload['state_id'],$payload['programme_type']);

                if ($benefitDetail['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $benefitDetail['data'];
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
