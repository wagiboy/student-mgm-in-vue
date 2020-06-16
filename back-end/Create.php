<?
class Create extends JsonResponse {
 /* [{
  *  "name": "Joe Doe",
  *  "major": "CS",
  *  "GPA": "3.1"
  * }]
  * ------------------------- */    
  public function __construct($oPost) {
    $this->oPost = $oPost;
  }

  function main() {
    $this->saveValues();
    $this->echoStatus();           
  }
  
  function saveValues() {
    try {
      Assert::false(empty($this->oPost->name), 'name is empty');
      Db::query("INSERT INTO student SET  name = '".Db::esc($this->oPost->name) ."',".
                                        "major = '".Db::esc($this->oPost->major)."',".
                                          "GPA = '".Db::esc($this->oPost->GPA)  ."' ");
    }
    catch (Exception $ex) {
      //echo $ex->asStr();
      $this->setError("error in Create::saveValues()");
    }    
  }
}
?>