<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "AmazonWebServicesTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Providers
 */
class AmazonWebServicesTest extends Wsdl2PhpTestCase {
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("AmazonWebServicesTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/AmazonWebServicesTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/AmazonSearchService.php';
  }

  public function testKeywordSearchRequestWithException() {
    
    $request = new KeywordRequest();
    $request->keyword = 'php';
    $request->page = 1;

    $amazon = new AmazonSearchService($this->wsdl);
    try {
      $response = $amazon->KeywordSearchRequest($request);
    } catch(SoapFault $e) {
      self::assertEquals("We encountered an error at our end while processing your request. Please try again", trim($e->faultstring));
      return;
    }
    var_dump($response);

  }

}

if (PHPUnit_MAIN_METHOD == "AmazonWebServicesTest::main") {
  AmazonWebServicesTest::main();
}

?>
