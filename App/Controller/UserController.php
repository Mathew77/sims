<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\PrivilegeModel;
    use App\Controller;
    use Firebase\JWT\JWT;
    use App\TokenModel;
    use App\RequestMiddleware;    

    class UserController extends Controller {
        
        public function createNewUser($request, $response)
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
            // Do some validation...
            $validationObject = array(
                (Object) [
                    'validator' => 'required',
                    'data' => isset($data->firstName) ? $data->firstName : '',
                    'key' => 'First Name'
                ],
                (Object) [
                    'validator' => 'string',
                    'data' => isset($data->firstName) ? $data->firstName : '',
                    'key' => 'First Name'
                ],
               
               
            );

            $validationBag = Parent::validation($validationObject);                    
            if ($validationBag->status) {              
                $response->code(400)->json($validationBag);  
                return;
            }

            // Trim the response and create the account....
            $payload = array(
               
                'loginid' => $data->loginid,
                'pwd' => password_hash($data->password, PASSWORD_BCRYPT),
            );

            try {
                $UserModel = new UserModel();
                $UserData = $UserModel::createUser($payload);
                if ($UserData['status']) {
                    
                    // Initialize JWT Token....
                    $tokenExp = date('Y-m-d H:i:s');  
                    $tokenSecret = Parent::JWTSecret();
                    $tokenPayload = array(
                        'iat' => time(),
                        'iss' => 'PHP_MINI_REST_API', //!!Modify:: Modify this to come from a constant
                        "exp" => strtotime('+ 7 Days'),
                        "user_id" => $UserData['data']['user_id']
                    );
                    $Jwt = JWT::encode($tokenPayload, $tokenSecret);

                    // Save JWT Token...
                    $TokenModel = new TokenModel();
                    $TokenModel::createToken([
                        'user_id' => $UserData['data']['user_id'],
                        'jwt_token'=> $Jwt
                    ]);
                    $UserData['data']['token'] = $Jwt;
                    
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

        /**
         * login
         *
         * Authenticates a New User.
         *
         * @param mixed $request $response Contains the Request and Respons Object from the router.
         * @return mixed Anonymous
        */
        public function login($request, $response)
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
     

            // Trim the response 
            $payload = array(
                'loginid' => $data->userid,
                'pwd' => $data->pwd,
                'updated' => date('Y-m-d H:i:s')
            );

            try {
                $UserModel = new UserModel();
                $UserData = $UserModel::checkLoginId($payload['loginid']);
                if ($UserData['status']) {

                    if (password_verify($payload['pwd'], $UserData['data']['pwd'])) {
                        // Initialize JWT Token....
                        $tokenExp = date('Y-m-d H:i:s');  
                        $tokenSecret = Parent::JWTSecret();
                        $tokenPayload = array(
                            'iat' => time(),
                            'iss' => 'PHP_MINI_REST_API', //!!Modify:: Modify this to come from a constant
                            "exp" => strtotime('+ 7 Days'),
                            "user_id" => $UserData['data']['loginid']
                        );
                        $Jwt = JWT::encode($tokenPayload, $tokenSecret);
                        // Save JWT Token...
                        $TokenModel = new TokenModel();
                        $TokenModel->createToken([
                            'user_id' => $UserData['data']['userid'],
                            'jwt_token'=> $Jwt
                        ]);
                        $UserData['data']['token'] = $Jwt;
                        //check user Privilege
                        $UserData['data']['userid'];
                        $UserPrivilegeModel2 = new PrivilegeModel();
                        $UserDataPrivileges = $UserPrivilegeModel2->fetchUserPrivilegeById($UserData['data']['userid']);
                        $UserData['data']['privilege'] = $UserDataPrivileges;
                        // Return Response............
                        $Response['status'] = 201;
                        $Response['message'] = 'Login Successful';
                        $Response['data'] = $UserData;

                        $response->code(201)->json($Response);
                        return;
                    }

                    $Response['status'] = 401;
                    $Response['message'] = 'Please, check your User ID and Password and try again.';
                    $Response['data'] = [];
                    $response->code(401)->json($Response);
                    return;
                }

                $Response['status'] = 500;
                $Response['message'] = 'An unexpected error occurred and your action could not be completed. Please, try again later.';
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
