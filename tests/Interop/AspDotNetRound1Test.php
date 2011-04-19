<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "AspDotNetRound1Test::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Interop
 */
class AspDotNetRound1Test extends Wsdl2PhpTestCase {

  private $service;
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("AspDotNetRound1Test");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/AspDotNetRound1Test.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/SimpleTest.php';
  }

  public function setUp() {
    $this->service = new SimpleTest($this->wsdl);
  }

  public function testEchoVoid() {
    $res = $this->service->echoVoid();
    self::assertEquals($res, null);
  }

  public function testEchoString() {
    $string = 'string';
    $res = $this->service->echoString($string);
    self::assertEquals($res, $string);
  }

  public function testEchoStringArray() {
    $string = array('string1', 'string2', 'string3');
    $res = $this->service->echoStringArray($string);
    self::assertEquals(sizeof($res), 3);
    for($i=0; $i<sizeof($string); $i++) {
      self::assertEquals($res[$i], $string[$i]);
    }
  }

  public function testEchoInteger() {
    $integer = 5;
    $res = $this->service->echoInteger($integer);
    self::assertEquals($res, $integer);
  }

  public function testEchoIntegerArray() {
    $integer = array(1, 2, 3, 4, 5);
    $res = $this->service->echoIntegerArray($integer);
    self::assertEquals(sizeof($res), 5);
    for($i=0; $i<sizeof($integer); $i++) {
      self::assertEquals($res[$i], $integer[$i]);
    }
  }

  public function testEchoFloat() {
    $float = 1.2;
    $res = $this->service->echoFloat($float);
    self::assertEquals($res, $float);
  }

  public function testEchoFloatArray() {
    $float = array(1.2, 3.4, 5.6, 7.8, 9.10);
    $res = $this->service->echoFloatArray($float);
    self::assertEquals(sizeof($res), 5);
    for($i=0; $i<sizeof($float); $i++) {
      self::assertEquals($res[$i], $float[$i]);
    }
  }

  public function testEchoStruct() {
    $struct = new SOAPStruct();
    $struct->varInt = 5;
    $struct->varFloat = 5.1;
    $struct->varString = "five";
    $res = $this->service->echoStruct($struct);
    self::assertEquals(get_class($res), 'SOAPStruct');
    self::assertEquals($res->varInt, $struct->varInt);
    self::assertEquals($res->varFloat, $struct->varFloat);
    self::assertEquals($res->varString, $struct->varString);
  }

  public function testEchoStructArray() {
    $struct1 = new SOAPStruct();
    $struct1->varInt = 5;
    $struct1->varFloat = 5.1;
    $struct1->varString = "five";
    $struct2 = new SOAPStruct();
    $struct2->varInt = 6;
    $struct2->varFloat = 6.1;
    $struct2->varString = "six";
    $struct = array($struct1, $struct2);
    $res = $this->service->echoStructArray($struct);
    self::assertEquals(sizeof($res), 2);
    for($i=0; $i<sizeof($struct); $i++) {
      self::assertEquals(get_class($res[$i]), 'SOAPStruct');
      self::assertEquals($res[$i]->varInt, $struct[$i]->varInt);
      self::assertEquals($res[$i]->varFloat, $struct[$i]->varFloat);
      self::assertEquals($res[$i]->varString, $struct[$i]->varString);
    }
  }

  public function testEchoDate() {
    $date = date('Y-m-d').'T'.date('H:i:s').".0000000-08:00";
    $res = $this->service->echoDate($date);
    self::assertEquals($date, $res);
  }

  public function testEchoBase64() {
    $base64 = base64_encode('This is an encoded string');
    $res = $this->service->echoBase64($base64);
    self::assertEquals($res, $base64);
  }

  public function testEchoBoolean() {
    $bool = false;
    $res = $this->service->echoBoolean($bool);
    self::assertEquals($res, $bool);
  }

  public function testEchoDecimal() {
    $decimal = (float)1.234;
    $res = $this->service->echoDecimal($decimal);
    self::assertEquals($decimal, (float)$res);
  }

  public function testHexBinary() {
    $string = "This is a hex binary string";
    $hexbin = bin2hex(pack('H'.strlen($string), $string));
    $res = $this->service->echoHexBinary($hexbin);
    self::assertEquals($res, $hexbin);
  }

}

if (PHPUnit_MAIN_METHOD == "AspDotNetRound1Test::main") {
  AspDotNetRound1Test::main();
}

?>
