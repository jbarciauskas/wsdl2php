<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "EmptySATest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Interop
 */
class EmptySATest extends Wsdl2PhpTestCase {
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("EmptySATest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/EmptySATest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/EmptySA.php';
  }

  public function testEchoString() {
    $client = new EmptySA();
    $result = $client->echoString('foo');
    self::assertEquals('foo', $result);
  }

}

if (PHPUnit_MAIN_METHOD == "EmptySATest::main") {
  EmptySATest::main();
}

?>
