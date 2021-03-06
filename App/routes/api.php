<?php
    namespace App;
    use App\UserController;
    use App\CatalogController;
    use App\PrivilegeController;
    use App\PeriodController;
    use App\SummaryController;
    use App\StateController;
    use App\ProgrammesController;
    use App\BeneficiaryController;
    use App\CctController;
    use App\GeepController;
    use App\NpoController;

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
    $Klein->respond('POST', '/api/v1/update-password', [ new UserController(), 'updatePassword' ]);
    $Klein->respond('POST', '/api/v1/user-privilege', [ new PrivilegeController(), 'fetchUserPriviledgesById' ]);
    $Klein->respond('GET', '/api/v1/cct-period', [ new PeriodController(), 'fetch_cct_period' ]); // Fetch CCT Period
    $Klein->respond('GET', '/api/v1/gee-period', [ new PeriodController(), 'fetch_gee_period' ]); // Fetch Gee Period
    $Klein->respond('GET', '/api/v1/npo-period', [ new PeriodController(), 'fetch_npo_period' ]); // Fetch Npo Period
    $Klein->respond('GET', '/api/v1/sfp-period', [ new PeriodController(), 'fetch_sfp_period' ]); // Fetch Sfp Period
    $Klein->respond('POST', '/api/v1/cct-summary', [ new SummaryController(), 'fetch_cct_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('POST', '/api/v1/gee-summary', [ new SummaryController(), 'fetch_gee_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('POST', '/api/v1/npo-summary', [ new SummaryController(), 'fetch_npo_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('POST', '/api/v1/sfp-summary', [ new SummaryController(), 'fetch_sfp_summary' ]); // Fetch cct Summary Detail 
    $Klein->respond('POST', '/api/v1/state', [ new StateController(), 'fetch_state' ]); // Fetch State BY User ID
    $Klein->respond('POST', '/api/v1/lga', [ new StateController(), 'fetch_lga' ]); // Fetch Lga BY User ID
    $Klein->respond('POST', '/api/v1/programmes', [ new ProgrammesController(), 'fetch_programmes' ]); // Fetch Lga BY User ID
    $Klein->respond('POST', '/api/v1/beneficiaries', [ new BeneficiaryController(), 'fetch_beneficiary' ]); // Fetch Lga BY User ID
    $Klein->respond('POST', '/api/v1/cct', [ new CctController(), 'CreateCctCore' ]); // Create CCT Core
    $Klein->respond('POST', '/api/v1/geep', [ new GeepController(), 'CreateGeepCores' ]); // Create GEEP Core
    $Klein->respond('POST', '/api/v1/geep/[:id]', [ new GeepController(), 'getGeepById' ]);
    $Klein->respond('POST', '/api/v1/geep-update/[:id]', [ new GeepController(), 'updateGeep' ]);
    $Klein->respond('POST', '/api/v1/npo', [ new NpoController(), 'CreateNpoCores' ]); // Create GEEP Core
    $Klein->respond('POST', '/api/v1/npo/[:id]', [ new NpoController(), 'getNpoById' ]);
    $Klein->respond('POST', '/api/v1/npo-update/[:id]', [ new NpoController(), 'updateNpo' ]);
    // Dispatch all routes....
    $Klein->dispatch();

?>