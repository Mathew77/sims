<?php
    namespace App;
    use App\UserController;
    use App\CatalogController;
    use App\PrivilegeController;
    use App\PeriodController;

    $Klein = new \Klein\Klein();

    /******************** User Routes || Authentication Routes **********************/
    
    $Klein->respond('POST', '/api/v1/user-auth', [ new UserController(), 'login' ]);
    $Klein->respond('POST', '/api/v1/user-privilege', [ new PrivilegeController(), 'fetchUserPriviledgesById' ]);
    $Klein->respond('GET', '/api/v1/cct-period', [ new PeriodController(), 'fetch_cct_period' ]); // Fetch CCT Period
    $Klein->respond('GET', '/api/v1/gee-period', [ new PeriodController(), 'fetch_gee_period' ]); // Fetch Gee Period
    $Klein->respond('GET', '/api/v1/npo-period', [ new PeriodController(), 'fetch_npo_period' ]); // Fetch Npo Period
    $Klein->respond('GET', '/api/v1/sfp-period', [ new PeriodController(), 'fetch_sfp_period' ]); // Fetch Sfp Period
    
    // Dispatch all routes....
    $Klein->dispatch();

?>
