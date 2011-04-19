<?php
set_include_path(dirname(__FILE__).PATH_SEPARATOR.get_include_path());

if(!defined('PHPUnit_MAIN_METHOD')) {
  define('PHPUnit_MAIN_METHOD', 'ColdFusion_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'ComicsWebServiceTest.php';

class ColdFusion_AllTests {

  public static function main() {
    PHPUnit_TextUI_TestRunner::run(self::suite());
  }

  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite('ColdFusion interopability test suite');

    $suite->addTestSuite('ComicsWebServiceTest');

    return $suite;
  }
}

if(PHPUnit_MAIN_METHOD == 'ColdFusion_AllTests::main') {
  ColdFusion_AllTests::main();
}
?>
