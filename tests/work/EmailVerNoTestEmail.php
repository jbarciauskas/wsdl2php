<?php
class VerifyMXRecord {
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $LicenseKey;
}
class VerifyMXRecordResponse {
    /**
     * @var int
     */
    public $VerifyMXRecordResult;
}
class AdvancedVerifyEmail {
    /**
     * @var string
     */
    public $email;
    /**
     * @var int
     */
    public $timeout;
    /**
     * @var string
     */
    public $LicenseKey;
}
class AdvancedVerifyEmailResponse {
    /**
     * @var ReturnIndicator
     */
    public $AdvancedVerifyEmailResult;
}
class ReturnIndicator {
    /**
     * @var string
     */
    public $ResponseText;
    /**
     * @var int
     */
    public $ResponseCode;
    /**
     * @var string
     */
    public $LastMailServer;
    /**
     * @var boolean
     */
    public $GoodEmail;
}
class VerifyEmail {
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $LicenseKey;
}
class VerifyEmailResponse {
    /**
     * @var ReturnIndicator
     */
    public $VerifyEmailResult;
}
class ReturnCodes {
}
class ReturnCodesResponse {
    /**
     * @var ArrayOfAnyType
     */
    public $ReturnCodesResult;
}

/**
 * EmailVerNoTestEmail class
 * 
 * These functions deal with Email Address Verification.  <b>CDYNE advertises a 100% SLA.  
 * Try to find that kind of SLA from other web service vendors!</b> 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class EmailVerNoTestEmail extends SoapClient {

  private static $classmap = array(
                                    'VerifyMXRecord' => 'VerifyMXRecord',
                                    'VerifyMXRecordResponse' => 'VerifyMXRecordResponse',
                                    'AdvancedVerifyEmail' => 'AdvancedVerifyEmail',
                                    'AdvancedVerifyEmailResponse' => 'AdvancedVerifyEmailResponse',
                                    'ReturnIndicator' => 'ReturnIndicator',
                                    'VerifyEmail' => 'VerifyEmail',
                                    'VerifyEmailResponse' => 'VerifyEmailResponse',
                                    'ReturnCodes' => 'ReturnCodes',
                                    'ReturnCodesResponse' => 'ReturnCodesResponse',
                                   );

  public function EmailVerNoTestEmail($wsdl = "/home/jbarciauskas/wsdl2php/0.2.1/tests/DotNet/EmailVerifyTest.wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   * This function will verify the domains DNS (MX) mail entries.  If the function returns 
   * 0 the persons email domain is invalid.  More than 0 will indicate there is mail servers 
   * to accept an email.  This function is great for quick email domain verification.  It is 
   * not as powerful as the other email routines.  Use a LicenseKey of 0 for testing.  A -9999 
   * as a result means that you have tested to many emails.  Please try again later if you 
   * get this value. 
   *
   * @param VerifyMXRecord $parameters
   * @return VerifyMXRecordResponse
   */
  public function VerifyMXRecord(VerifyMXRecord $parameters) {
    return $this->__soapCall('VerifyMXRecord', array($parameters),       array(
            'uri' => 'http://ws.cdyne.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   * This function will verify an email address and also includes the ability to timeout the 
   * verification process.  The Verification can be slowed down by the email server being verified 
   * against. <b>Timeout is in seconds</b> Use a licensekey of 0 for testing <br> NOTE: A timeout 
   * error (7) does not mean an email will not go through.  You should treat this as a good 
   * email address. 
   *
   * @param AdvancedVerifyEmail $parameters
   * @return AdvancedVerifyEmailResponse
   */
  public function AdvancedVerifyEmail(AdvancedVerifyEmail $parameters) {
    return $this->__soapCall('AdvancedVerifyEmail', array($parameters),       array(
            'uri' => 'http://ws.cdyne.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   * This function allows you to verify an email address against the mail servers it belongs 
   * to.  This function differs from the advanced function only by it automatically setting 
   * a timeout of 5 seconds 
   *
   * @param VerifyEmail $parameters
   * @return VerifyEmailResponse
   */
  public function VerifyEmail(VerifyEmail $parameters) {
    return $this->__soapCall('VerifyEmail', array($parameters),       array(
            'uri' => 'http://ws.cdyne.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   * This function will give you all the possible code returns 
   *
   * @param ReturnCodes $parameters
   * @return ReturnCodesResponse
   */
  public function ReturnCodes(ReturnCodes $parameters) {
    return $this->__soapCall('ReturnCodes', array($parameters),       array(
            'uri' => 'http://ws.cdyne.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
