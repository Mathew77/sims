<?php
    namespace App;

    use Exception;
    use App\UserModel;
    use App\PrivilegeModel;
    use App\JwtMiddleware;
    use App\RequestMiddleware;   

    class PrivilegeController extends Controller {
        
       
 
        public function fetchUser($request, $response)
        {
            $Response = [];
            // Call the Middleware
           
            $JwtMiddleware = new JwtMiddleware();
            $jwtMiddleware = $JwtMiddleware::getAndDecodeToken();
            if (isset($jwtMiddleware) && $jwtMiddleware == false) {
                $response->code(400)->json([
                    'status' => 401,
                    'message' => 'Sorry, the authenticity of this token could not be verified.',
                    'data' => []
                ]);
                return;
            }

            // try {
            //    // $ProductModel = new ProductModel();
            //     $PrivilegeModel = new PrivilegeModel();
            //     $products = $ProductModel::fetchProducts();

            //     if ($products['status']) {
            //         $Response['status'] = 200;
            //         $Response['data'] = $products['data'];
            //         $Response['message'] = '';

            //         $response->code(200)->json($Response);
            //         return;
            //     }

            //     $Response['status'] = 400;
            //     $Response['data'] = [];
            //     $Response['message'] = 'An unexpected error occurred and your product could not be retrieved. Please, try again later.';
                
            //     $response->code(400)->json($Response);
            //     return;
            // } catch (Exception $e) {
            //     $Response['status'] = 500;
            //     $Response['message'] = $e->getMessage();
            //     $Response['data'] = [];
                
            //     $response->code(500)->json($Response);
            //     return;
            // }
        }
        
    }
?>
