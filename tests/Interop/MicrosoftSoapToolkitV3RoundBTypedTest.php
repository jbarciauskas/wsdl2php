<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "MicrosoftSoapToolkitV3RoundBTypedTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Interop
 */
class MicrosoftSoapToolkitV3RoundBTypedTest extends Wsdl2PhpTestCase {

  private $service;
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("MicrosoftSoapToolkitV3RoundBTypedTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/MicrosoftSoapToolkitV3RoundBTypedTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/SoapTest.php';
  }

  public function setUp() {
    $this->service = new SoapTest($this->wsdl, array('style' => SOAP_DOCUMENT, 'use' => SOAP_LITERAL));
  }

  public function testEchoStructAsSimpleTypes() {
    $struct = new SOAPStruct();
    $struct->varString = 'string';
    $struct->varInt = 1;
    $struct->varFloat = 1.5;
    $result = $this->service->echoStructAsSimpleTypes($struct);
    self::assertEquals($struct->varString, $result['outputString']);
    self::assertEquals($struct->varInt, $result['outputInteger']);
    self::assertEquals($struct->varFloat, $result['outputFloat']);
  }

  public function testEchoSimpleTypesAsStruct() {
    $string = 'string';
    $int = 1;
    $float = 1.5;
    $struct = $this->service->echoSimpleTypesAsStruct($string, $int, $float);
    self::assertEquals($string, $struct->varString);
    self::assertEquals($int, $struct->varInt);
    self::assertEquals($float, $struct->varFloat);
  }

  public function testEcho2DStringArray() {
    $array = array('string');
    $result = $this->service->echo2DStringArray($array);
    self::assertEquals($array, $result);
    self::assertEquals($array[0], $result[0]);
  }

  public function testEchoNestedStruct() {
    $struct = new SOAPStruct();
    $struct->varString = 'string';
    $struct->varInt = 1;
    $struct->varFloat = 1.5;
    $nestedStruct = new SOAPStructStruct();
    $nestedStruct->varString = 'string';
    $nestedStruct->varInt = 1;
    $nestedStruct->varFloat = 1.5;
    $nestedStruct->varStruct = $struct;
    $result = $this->service->echoNestedStruct($nestedStruct);
    self::assertEquals($nestedStruct, $result);
  }

  public function testEchoNestedArray() {
    $struct = new SOAPArrayStruct();
    $struct->varString = 'string';
    $struct->varInt = 1;
    $struct->varFloat = 1.5;
    $struct->varArray = array('value1');
    $result = $this->service->echoNestedArray($struct);
    self::assertEquals($struct, $result);
  }

}

if (PHPUnit_MAIN_METHOD == "MicrosoftSoapToolkitV3RoundBTypedTest::main") {
  MicrosoftSoapToolkitV3RoundBTypedTest::main();
}

?>
