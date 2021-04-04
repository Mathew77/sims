<?php
    namespace App;
    use App\UserController;
    use App\CatalogController;
    use App\PrivilegeController;

    $Klein = new \Klein\Klein();

    /******************** User Routes || Authentication Routes **********************/
    $Klein->respond('POST', '/api/v1/user', [ new UserController(), 'createNewUser' ]);
    $Klein->respond('POST', '/api/v1/user-auth', [ new UserController(), 'login' ]);
   // $Klein->respond('POST', '/api/v1/user-privilege', [ new PrivilegeController(), 'fetchUser' ]);

    
    // Dispatch all routes....
    $Klein->dispatch();

?>
