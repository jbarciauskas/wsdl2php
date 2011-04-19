<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "TemperatureConvertTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.Axis
 */
class TemperatureConvertTest extends Wsdl2PhpTestCase {

  private $service;
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("TemperatureConvertTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function __construct($name) {
    parent::__construct($name);
    $this->wsdl = dirname(__FILE__)."/TemperatureConvertTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/TemperatureConvertService.php';
  }

  public function setUp() {
    $this->service = new TemperatureConvertService($this->wsdl);
  }

  public function testCelsiusTOFahrenheit() {
    $temp = 37.5;
    $res = $this->service->CelsiusTOFahrenheit($temp);
    self::assertEquals($res, 99.5);
  }

  public function testCelsiusTOKelvin() {
    $temp = 37.5;
    $res = $this->service->CelsiusTOKelvin($temp);
    self::assertEquals($res, 310.65);
  }

  public function testCelsiusTORankine() {
    $temp = 37.5;
    $res = $this->service->CelsiusTORankine($temp);
    self::assertEquals($res, 559.17);
  }

  public function testCelsiusTOReaumur() {
    $temp = 37.5;
    $res = $this->service->CelsiusTOReaumur($temp);
    self::assertEquals($res, 30.0);
  }
  
  public function testFahrenheitTOCelsius() {
    $temp = 99.5;
    $res = $this->service->FahrenheitTOCelsius($temp);
    self::assertEquals($res, 37.5);
  }

  public function testFahrenheitTOKelvin() {
    $temp = 99.5;
    $res = $this->service->FahrenheitTOKelvin($temp);
    self::assertEquals($res, 310.65);
  }

  public function testFahrenheitTORankine() {
    $temp = 99.5;
    $res = $this->service->FahrenheitTORankine($temp);
    self::assertEquals($res, 559.17);
  }

  public function testFahrenheitTOReaumur() {
    $temp = 99.5;
    $res = $this->service->FahrenheitTOReaumur($temp);
    self::assertEquals($res, 30.0);
  }

  public function testKelvinTOCelsius() {
    $temp = 310.65;
    $res = $this->service->KelvinTOCelsius($temp);
    self::assertEquals($res, 37.5);
  }

  public function testKelvinTOFahrenheit() {
    $temp = 310.65;
    $res = $this->service->KelvinTOFahrenheit($temp);
    self::assertEquals($res, 99.5);
  }

  public function testKelvinTORankine() {
    $temp = 310.65;
    $res = $this->service->KelvinTORankine($temp);
    self::assertEquals($res, 559.17);
  }

  public function testKelvinTOReaumur() {
    $temp = 310.65;
    $res = $this->service->KelvinTOReaumur($temp);
    self::assertEquals($res, 30.0);
  }

  public function testRankineTOCelsius() {
    $temp = 559.17;
    $res = $this->service->RankineTOCelsius($temp);
    self::assertEquals($res, 37.5);
  }

  public function testRankineTOFahrenheit() {
    $temp = 559.17;
    $res = $this->service->RankineTOFahrenheit($temp);
    self::assertEquals($res, 99.5);
  }

  public function testRankineTOKelvin() {
    $temp = 559.17;
    $res = $this->service->RankineTOKelvin($temp);
    self::assertEquals($res, 310.65);
  }

  public function testRankineTOReaumur() {
    $temp = 559.17;
    $res = $this->service->RankineTOReaumur($temp);
    self::assertEquals($res, 30.0);
  }

  public function testReaumurTOCelsius() {
    $temp = 30.0;
    $res = $this->service->ReaumurTOCelsius($temp);
    self::assertEquals($res, 37.5);
  }

  public function testReaumurTOFahrenheit() {
    $temp = 30.0;
    $res = $this->service->ReaumurTOFahrenheit($temp);
    self::assertEquals($res, 99.5);
  }

  public function testReaumurTOKelvin() {
    $temp = 30.0;
    $res = $this->service->ReaumurTOKelvin($temp);
    self::assertEquals($res, 310.65);
  }

  public function testReaumurTORankine() {
    $temp = 30.0;
    $res = $this->service->ReaumurTORankine($temp);
    self::assertEquals($res, 559.17);
  }

}

if (PHPUnit_MAIN_METHOD == "TemperatureConvertTest::main") {
  TemperatureConvertTest::main();
}

?>
