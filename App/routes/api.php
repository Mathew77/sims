<?php
    namespace App;
    use App\UserController;
    use App\CatalogController;
    use App\PrivilegeController;
    use App\PeriodController;
    use App\SummaryController;
    use App\StateController;

    $base  = dirname($_SERVER['PHP_SELF']);

	// Update request when we have a subdirectory    
	if(ltrim($base, '/')){ 

		$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
	}

    $Klein = new \Klein\Klein();
    header('Access-Control-Allow-Origin: *');

    header('Access-Control-Allow-Methods: GET, POST');

    header("Access-Control-Allow-Headers: X-Requested-With");

    /******************** User Routes || Authentication Routes **********************/
    
    $Klein->respond('POST', '/api/v1/user-auth', [ new UserController(), 'login' ]);
    $Klein->respond('POST', '/api/v1/user-privilege', [ new PrivilegeController(), 'fetchUserPriviledgesById' ]);
    $Klein->respond('GET', '/api/v1/cct-period', [ new PeriodController(), 'fetch_cct_period' ]); // Fetch CCT Period
    $Klein->respond('GET', '/api/v1/gee-period', [ new PeriodController(), 'fetch_gee_period' ]); // Fetch Gee Period
    $Klein->respond('GET', '/api/v1/npo-period', [ new PeriodController(), 'fetch_npo_period' ]); // Fetch Npo Period
    $Klein->respond('GET', '/api/v1/sfp-period', [ new PeriodController(), 'fetch_sfp_period' ]); // Fetch Sfp Period
    $Klein->respond('GET', '/api/v1/cct-summary', [ new SummaryController(), 'fetch_cct_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('GET', '/api/v1/gee-summary', [ new SummaryController(), 'fetch_gee_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('GET', '/api/v1/cct-summary', [ new SummaryController(), 'fetch_cct_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('GET', '/api/v1/cct-summary', [ new SummaryController(), 'fetch_cct_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('GET', '/api/v1/cct-summary', [ new SummaryController(), 'fetch_cct_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('GET', '/api/v1/state', [ new StateController(), 'fetch_state' ]); // Fetch State BY User ID
   
    // Dispatch all routes....
    $Klein->dispatch();

?>
