<?php
set_include_path(dirname(__FILE__).PATH_SEPARATOR.get_include_path());

if(!defined('PHPUnit_MAIN_METHOD')) {
  define('PHPUnit_MAIN_METHOD', 'Interop_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'AspDotNetRound1Test.php';
require_once 'AspDotNetRound2Test.php';
require_once 'MicrosoftSoapToolkitV3RoundBTypedTest.php';
require_once 'SoapLiteRound1Test.php';

class Interop_AllTests {

  public static function main() {
    PHPUnit_TextUI_TestRunner::run(self::suite());
  }

  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite('Interopability test suite');

    $suite->addTestSuite('AspDotNetRound1Test');
    $suite->addTestSuite('AspDotNetRound2Test');
    $suite->addTestSuite('MicrosoftSoapToolkitV3RoundBTypedTest');
    $suite->addTestSuite('SoapLiteRound1Test');
    
    return $suite;
  }
}

if(PHPUnit_MAIN_METHOD == 'Interop_AllTests::main') {
  Interop_AllTests::main();
}
?>
