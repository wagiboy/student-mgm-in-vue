<?                                                  
class ListAll extends JsonResponse {
 /* GET /api/student/list  
  * [
  *  {"id":"1","name":"Joe Doe","major":"CS","GPA","3.1"},
  *  {"id":"2","name":"James Meier","major":"Math","GPA","3.3"},
  *  ...
  * ] 
  * ----------------------------------------------------------- */
  public function main() {
    try {
      $recs = Db::query("SELECT * FROM student");
      $aSTUDENT = Db::fetchAll($recs);
      $this->echoResponse($aSTUDENT);
    }
    catch (Exception $ex) {
      echo $ex->asStr();
      $this->setError("error in Get::fetchStudents()");
    }    
  }
}
?>