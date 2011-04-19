<?php
set_include_path(dirname(__FILE__).PATH_SEPARATOR.get_include_path());

if(!defined('PHPUnit_MAIN_METHOD')) {
  define('PHPUnit_MAIN_METHOD', 'Providers_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'eBayTest.php';
require_once 'GoogleSearchTest.php';
require_once 'AmazonWebServicesTest.php';

class Providers_AllTests {

  public static function main() {
    PHPUnit_TextUI_TestRunner::run(self::suite());
  }

  public static function suite() {
    $suite = new PHPUnit_Framework_TestSuite('Providers interopability test suite');

    $suite->addTestSuite('eBayTest');
    $suite->addTestSuite('GoogleSearchTest');
    $suite->addTestSuite('AmazonWebServicesTest');

    return $suite;
  }
}

if(PHPUnit_MAIN_METHOD == 'Providers_AllTests::main') {
  Providers_AllTests::main();
}
?>
