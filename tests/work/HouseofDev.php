<?php
class CFCInvocationException {
}

/**
 * HouseofDev class
 * 
 * http://ws.houseofdev.com/cfcs/ws.cfc?wsdl 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class HouseofDev extends SoapClient {

  private static $classmap = array(
                                    'CFCInvocationException' => 'CFCInvocationException',
                                   );

  public function HouseofDev($wsdl = "/home/jbarciauskas/wsdl2php/0.2.1/tests/ColdFusion/ComicsWebServiceTest.wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param 
   * @return string
   */
  public function getComics() {
    return $this->__soapCall('getComics', array(),       array(
            'uri' => 'http://cfcs',
            'soapaction' => ''
           )
      );
  }

}

?>
