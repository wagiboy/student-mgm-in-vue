<?
class Edit extends JsonResponse {
 /* [{
  *  "name": "Joe Doe",
  *  "major": "CS",
  *  "GPA": "3.1",
  *  "id":  "23"
  * }]
  * ------------------------- */    
  public function __construct($oPost) {
    $this->oPost = $oPost;
  }

  function main() {
    $this->updateValues();
    $this->echoStatus();           
  }
  
  function updateValues() {
    try {
      Assert::false(empty($this->oPost->name), 'name is empty');
      Db::query("UPDATE student SET  name = '".Db::esc($this->oPost->name) ."',".
                                   "major = '".Db::esc($this->oPost->major)."',".
                                     "GPA = '".Db::esc($this->oPost->GPA)  ."' ".
                "WHERE id = ".$this->oPost->id);
    }
    catch (Exception $ex) {
      echo $ex->asStr();
      $this->setError("error in Create::saveValues()");
    }    
  }
}
?>