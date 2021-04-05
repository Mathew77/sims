<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\PrivilegeModel;
    use App\JwtMiddleware;
    use App\RequestMiddleware;   

    class PrivilegeController extends Controller {
        
       
 
        public function fetchUserPriviledgesById($request, $response)
        {
            $Response = [];
            // Call the Middleware
           
            $JwtMiddleware = new JwtMiddleware();
            $jwtMiddleware = $JwtMiddleware->getAndDecodeToken();

            if (isset($jwtMiddleware) && $jwtMiddleware == false) {
                $response->code(400)->json([
                    'status' => 401,
                    'message' => 'Sorry, the authenticity of this token could not be verified.',
                    'data' => []
                ]);
                return;
            }
            $data = json_decode($request->body());
             // Trim the response 
             $payload = array(
                'userId' => $data->userid,
            );
            try {
               //Get User Privilege 
                $PrivilegeModel = new PrivilegeModel();
                $UserPrivileges = $PrivilegeModel->fetchUserPrivilegeById($payload['userId']);

                if ($UserPrivileges['status']) {
                    $Response['status'] = 200;
                    $Response['data'] = $UserPrivileges['data'];
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
