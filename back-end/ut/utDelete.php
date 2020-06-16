<?
include_once 'harness/include.php';

class api_student_Delete extends WebTestCase {

  function setUp() {
    $this->POST = array('id' => 1);
    Db::query("INSERT INTO student SET  name = 'Joe Doe',".
                                      "major = 'CS',".
                                        "GPA = '3.1',".
                                        "id  = 1");
  }

  function tearDown() {
    Db::query("DELETE FROM student WHERE id = 1");
  }

  function testSuccess() { 
    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['id'], 1);

    $this->post( Prop::inst()->utRoot."/api/student/delete", json_encode($this->POST));    
    $this->assertText('{"status":"success"');

    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertTrue(empty($STUDENT));
  }

  function testNoneExistingId() { 
    $this->POST = array('id' => 456);

    $this->post( Prop::inst()->utRoot."/api/student/delete", json_encode($this->POST));    
    $this->assertText('{"status":"success"');

    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['name'],  'Joe Doe');
    $this->assertEqual($STUDENT['major'], 'CS');
    $this->assertEqual($STUDENT['GPA'],   '3.1');
  }
}
HrTools::run(new api_student_Delete());
?>