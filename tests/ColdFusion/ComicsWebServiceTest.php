<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "ComicsWebServiceTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.ColdFusion
 */
class ComicsWebServiceTest extends Wsdl2PhpTestCase {

  public function setUp() {
    $this->wsdl = dirname(__FILE__).'/ComicsWebServiceTest.wsdl';
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/HouseofDev.php';
  }
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("ComicsWebServiceTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function testGetComics() {
    $comics = new HouseofDev($this->wsdl);
    $res = $comics->getComics();
    self::assertType('string', $res);
  }

}

if (PHPUnit_MAIN_METHOD == "ComicsWebServiceTest::main") {
  ComicsWebServiceTest::main();
}

?>
