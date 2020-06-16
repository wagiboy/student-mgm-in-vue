<? 
header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');     // avoid 'blocked by CORS policy' in GET
header('Access-Control-Allow-Headers: *');    // avoid 'blocked by CORS policy' in POST

include 'core/init/init.php';
include 'sys/tor/TorPrimeLocation.php';
include 'sys/tor/TorExtraLocation.php';
include 'sys/job/JobLocationRefinery.php';
include 'sys/tee/TeeImporter.php';
include 'sys/mail/include.php';

include 'api/include.php';

$apiDispatcher = new ApiDispatcher();
$apiDispatcher->run();
?>