<? 
header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');     // avoid 'blocked by CORS policy' in GET
header('Access-Control-Allow-Headers: *');    // avoid 'blocked by CORS policy' in POST

include 'core/init/init.php';
include 'api/JsonResponse.php';

$call = $_GET['call'];

if (empty($call)) {
  $errmsg = "no api call given";  
} else {
  $errmsg = "no such api call '$call'"; 
}

$jsonResponse = new JsonResponse();
$jsonResponse->setError($errmsg);
$jsonResponse->echoStatus();
?>