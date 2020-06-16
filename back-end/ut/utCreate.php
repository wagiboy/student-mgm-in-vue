<?
include_once 'harness/include.php';

class api_student_Create extends WebTestCase {

  function setUp() {
    $this->POST = array('name'  => 'Joe Doe',
                        'major' => 'CS',
                        'GPA'   => '3.1');
  }

  function tearDown() {
    Db::query("DELETE FROM student WHERE name = 'Joe Doe'");
  }

  function testSuccess() { 
    $this->post( Prop::inst()->utRoot."/api/student/create", json_encode($this->POST));    
    $this->assertText('{"status":"success"');

    $rec = Db::query("SELECT * FROM student WHERE name = 'Joe Doe'");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['name'],  'Joe Doe');
    $this->assertEqual($STUDENT['major'], 'CS');
    $this->assertEqual($STUDENT['GPA'],   '3.1');
  }

  function testEmptyName() {                           
    $this->POST['name'] = '';

    $this->post(Prop::inst()->utRoot."/api/student/create", json_encode($this->POST));    
    $this->assertText('{"status":"error"');
    $this->assertText('error in Create::saveValues()');
      
    $rec = Db::query("SELECT * FROM student WHERE name = ''");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['name'], '');
  }

  function testEmptyMajor() {                           
    $this->POST['major'] = '';

    $this->post(Prop::inst()->utRoot."/api/student/create", json_encode($this->POST));    
    $this->assertText('{"status":"success"');
      
    $rec = Db::query("SELECT * FROM student WHERE name = 'Joe Doe'");
    $STUDENT = mysqli_fetch_assoc($rec);
    //StrUtil::echo($STUDENT, 'STUDENT');
    $this->assertEqual($STUDENT['major'], '');
    $this->assertEqual($STUDENT['name'],  'Joe Doe');
    $this->assertEqual($STUDENT['GPA'],   '3.1');
  }  

  function testGPA() {
    $this->POST['GPA'] = '';

    $this->post(Prop::inst()->utRoot."/api/student/create", json_encode($this->POST));
    $this->assertText('{"status":"success"');  
      
    $rec = Db::query("SELECT * FROM student WHERE name = 'Joe Doe'");
    $STUDENT = mysqli_fetch_assoc($rec);
    $this->assertEqual($STUDENT['name'],  'Joe Doe');
    $this->assertEqual($STUDENT['major'], 'CS');
    $this->assertEqual($STUDENT['GPA'],   0.0);      
  }
}
HrTools::run(new api_student_Create());
?>