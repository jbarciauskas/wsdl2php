<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "eBayTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Providers
 */
class eBayTest extends Wsdl2PhpTestCase {

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/eBayTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/eBayAPIInterfaceService.php';
  }
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("eBayTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function testGetItemWithException() {

    $request = new GetItemRequestType();
    $request->ItemID = 1234;

    $ebay = new eBayAPIInterfaceService();
    try {
      $response = $ebay->GetItem($request);
    } catch(SoapFault $e) {
      self::assertEquals("com.ebay.app.pres.service.hosting.WebServiceDisabledException: The web service eBayAPI is not properly configured or not found and is disabled.", $e->faultstring);
      return;
    }
    var_dump($response);
  }

}

if (PHPUnit_MAIN_METHOD == "eBayTest::main") {
  eBayTest::main();
}

?>
