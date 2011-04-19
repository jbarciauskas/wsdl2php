<?php
if (!defined("PHPUnit_MAIN_METHOD")) {
  define("PHPUnit_MAIN_METHOD", "EmailVerifyTest::main");
}
require_once dirname(__FILE__).'/../Wsdl2PhpTestCase.php';

/**
 * @package wsdl2php.DotNet
 */
class EmailVerifyTest extends Wsdl2PhpTestCase {
  
  public static function main() {
    require_once "PHPUnit/TextUI/TestRunner.php";
    $suite  = new PHPUnit_Framework_TestSuite("EmailVerifyTest");
    $result = PHPUnit_TextUI_TestRunner::run($suite);
  }

  public function setUp() {
    $this->wsdl = dirname(__FILE__)."/EmailVerifyTest.wsdl";
    $this->run_wsdl2php($this->wsdl);
    require_once $this->work_dir.'/EmailVerNoTestEmail.php';
  }

  public function testVerifyEmail() {
    $record = new VerifyEmail();
    $record->email = "knut.urdalen@gmail.com";
    $verify = new EmailVerNoTestEmail($this->wsdl);
    $result = $verify->VerifyEmail($record);
    self::assertType('VerifyEmailResponse', $result);
  }

}

if (PHPUnit_MAIN_METHOD == "EmailVerifyTest::main") {
  EmailVerifyTest::main();
}

?>
