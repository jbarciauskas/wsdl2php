<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "GoogleSearchTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Providers
 */
class GoogleSearchTest extends Wsdl2PhpTestCase {
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("GoogleSearchTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/GoogleSearchTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/GoogleSearchService.php';
  }

  public function testDoGetCachedPageWithException() {

    $google = new GoogleSearchService();
    try {
      $response = $google->doGetCachedPage('key', 'http://www.php.net');
    } catch(SoapFault $e) {
      //var_dump($e->faultstring);
      if($e->faultstring == "Exception from service object: Invalid authorization key: key" or $e->faultstring == "Bad Gateway") {
	return;
      } else {
	self::fail($e->faultstring);
      }
    }
  }

}

if (PHPUnit_MAIN_METHOD == "GoogleSearchTest::main") {
  GoogleSearchTest::main();
}

?>
