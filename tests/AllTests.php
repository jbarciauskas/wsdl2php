<?php
set_include_path(dirname(__FILE__).PATH_SEPARATOR.get_include_path());

if(!defined('PHPUnit_MAIN_METHOD')) {
  define('PHPUnit_MAIN_METHOD', 'AllTests::main');
}
 
require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
 
require_once 'ColdFusion/AllTests.php';
require_once 'DotNet/AllTests.php';
require_once 'Providers/AllTests.php';
require_once 'Axis/AllTests.php';
require_once 'Interop/AllTests.php';

class AllTests {

  public static function main() {
    PHPUnit_TextUI_TestRunner::run(self::suite());
  }
 
  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite('wsdl2php interopability test suite');
 
    $suite->addTest(ColdFusion_AllTests::suite());
    $suite->addTest(DotNet_AllTests::suite());
    $suite->addTest(Providers_AllTests::suite());
    $suite->addTest(Axis_AllTests::suite());
    $suite->addTest(Interop_AllTests::suite());

    return $suite;
  }
}
 
if(PHPUnit_MAIN_METHOD == 'AllTests::main') {
  AllTests::main();
}
