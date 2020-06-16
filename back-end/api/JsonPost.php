<?
class JsonPost {

  public function postAsObj() {
    /* The data/properties from the HTTP POST arrive in form or json encoded strings.
     * Retrieve the data from the HTTP POST and convert it into an object.
     * ------------------------------------------------------------------- */
    $rawPostData = file_get_contents('php://input');
 
    $oPostData = json_decode($rawPostData);
    Debug::echo(StrUtil::asStr($oPostData, 'POST'));
     
    return $oPostData;
  }
}
?>  
