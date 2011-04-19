<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "InteropTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Interop
 */
class InteropTest extends Wsdl2PhpTestCase {
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("InteropTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/InteropTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/InteropService.php';
  }

  public function testDoGetCachedPageWithException() {


  }

}

if (PHPUnit_MAIN_METHOD == "InteropTest::main") {
  InteropTest::main();
}

?>
