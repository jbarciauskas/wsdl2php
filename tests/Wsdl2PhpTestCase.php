<?php
require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";
require_once "PHPUnit/Framework/IncompleteTestError.php";

class Wsdl2PhpTestCase extends PHPUnit_Framework_TestCase {
  
  private $config_file = "phpunit.ini";
  protected $config = array(); // unit test configuration
  protected $work_dir; // working directory (used for output of wsdl2php)
  protected $wsdl; // reference to current wsdl file in use
  
  public function __construct() {
    parent::__construct();
    $this->config = parse_ini_file(dirname(__FILE__).'/'.$this->config_file);
    $this->work_dir = dirname(__FILE__).'/work';
  }

  public function setUp() {
  }

  protected function run_wsdl2php($wsdl) {
    
    if(!is_dir($this->work_dir)) { // create working directory
      mkdir($this->work_dir);
    }
    chdir($this->work_dir);

    //var_dump(shell_exec("wsdl2php $wsdl"));
    
    shell_exec("wsdl2php $wsdl");

  }

}

?>
