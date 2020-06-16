<?
class Delete extends JsonResponse {
 /* [{
  *  "id": "232"
  * }]
  * ------------------------- */    
  public function __construct($oPost) {
    $this->oPost = $oPost;
  }

  function main() {
    $this->deleteStudent();
    $this->echoStatus();           
  }
  
  function deleteStudent() {
    try {
      Assert::false(empty($this->oPost->id), 'id is empty');
      Db::query("DELETE FROM student WHERE id = ".$this->oPost->id);
    }
    catch (Exception $ex) {
      echo $ex->asStr();
      $this->setError("error in Delete()");
    }    
  }
}
?>