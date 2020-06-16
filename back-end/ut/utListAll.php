<?
include_once 'harness/include.php';

class api_student_ListAll extends WebTestCase {

  function setUp() {
    Db::query("INSERT INTO student SET  name = 'Joe Doe',".
                                      "major = 'CS',".
                                        "GPA = '3.1',".
                                        "id  = 1");
  }

  function tearDown() {
    Db::query("TRUNCATE TABLE student");
  }

  function testSuccess() { 
    $this->get( Prop::inst()->utRoot."/api/student/list");    
    $this->assertText('{"id":"1"');
    $this->assertText('"name":"Joe Doe"');
    $this->assertText('"major":"CS"');
  }

  function testNonStudentInDB() { 
    Db::query("TRUNCATE TABLE student");
    $this->get( Prop::inst()->utRoot."/api/student/list"); 
    $this->assertNoText(' ');  
  } 
}
HrTools::run(new api_student_ListAll());
?>  