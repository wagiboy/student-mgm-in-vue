<?
class JsonResponse {

  const SESSION_ID_NAME = 'UD5fxQ';  // use to preserve the session when redirecting from localhost:8080 -> 127.0.0.1  

  protected $status = 'success';
  protected $errmsg = '';

  public function setError($errmsg) {
    /* Sets the 
     * 1) status to error and the 
     * 2) error string for use in status reporting 
     * ------------------------------------------- */
    $this->status = 'error';
    $this->errmsg = StrUtil::exConcat($this->errmsg, ' - ', $errmsg);
  }

  public function echoStatus() {
    /* Echo the 
     * 1) status and
     * 2) error message unless status is success.
     * ------------------------------------------ */
    if ($this->status == 'success') { 
      $aReturnStatus = array('status'              => 'success',
                             self::SESSION_ID_NAME => session_id());  
      echo json_encode($aReturnStatus);                             
    } 
    else {
      $this->echoError();
    }
  }

  public function echoResponse($RESPONSE) {
    if ($this->status == 'success') {
      //header('x-total-count: '.count($RESPONSE));        
      echo json_encode($RESPONSE);    
    } 
    else {
      $this->echoError();
    }
  }

  private function echoError() {
    $aReturnStatus = array('status' => 'error',
                           'errmsg' => $this->errmsg);    
    echo json_encode($aReturnStatus);                             
  }
}
?>  
