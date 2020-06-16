<?
include_once 'harness/include.php';

class api_student_Edit extends WebTestCase {

  function setUp() {
    $this->POST = array('name'  => 'James Meier',
                        'major' => 'Math',
                        'GPA'   => '3.3',
                        'id'    => 1);
    Db::query("INSERT INTO student SET  name = 'Joe Doe',".
                                      "major = 'CS',".
                                        "GPA = '3.1',".
                                        "id  = 1");
  }

  function tearDown() {
    Db::query("DELETE FROM student WHERE id = 1");
  }

  function testSuccess() { 
    $this->post( Prop::inst()->utRoot."/api/student/edit", json_encode($this->POST));    
    $this->assertText('{"status":"success"');

    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['name'],  'James Meier');
    $this->assertEqual($STUDENT['major'], 'Math');
    $this->assertEqual($STUDENT['GPA'],   '3.3');
  }

  function testEmptyName() {                           
    $this->POST['name'] = '';

    $this->post(Prop::inst()->utRoot."/api/student/edit", json_encode($this->POST));    
    $this->assertText('{"status":"error"');
      
    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['name'], 'Joe Doe');
  }

  function testEmptyMajor() {                           
    $this->POST['major'] = '';

    $this->post(Prop::inst()->utRoot."/api/student/edit", json_encode($this->POST));    
    $this->assertText('{"status":"success"');
      
    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    //StrUtil::echo($STUDENT, 'STUDENT');
    $this->assertEqual($STUDENT['major'], '');
    $this->assertEqual($STUDENT['name'],  'James Meier');
    $this->assertEqual($STUDENT['GPA'],   '3.3');
  }

  function testEmptyGPA() {                           
    $this->POST['GPA'] = '';

    $this->post(Prop::inst()->utRoot."/api/student/edit", json_encode($this->POST));    
    $this->assertText('{"status":"success"');
      
    $rec = Db::query("SELECT * FROM student WHERE id = 1");
    $STUDENT = mysqli_fetch_assoc($rec);
    //StrUtil::echo($STUDENT, 'STUDENT');
    $this->assertEqual($STUDENT['name'],  'James Meier');
    $this->assertEqual($STUDENT['major'], 'Math');
    $this->assertEqual($STUDENT['GPA'],   0.0);
  }  
}
HrTools::run(new api_student_Edit());
?>