<?
include_once 'simpletest/unit_tester.php';

$suite = new TestSuite();
$suite->addFile('api/student/ut/utCreate.php');
$suite->addFile('api/student/ut/utEdit.php');
$suite->addFile('api/student/ut/utDelete.php');
$suite->addFile('api/student/ut/utListAll.php');
?>
