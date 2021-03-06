<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Crypt
 * @subpackage Rsa
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @category   Zend
 * @package    Zend_Crypt
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Crypt_Rsa_Key_Private extends Zend_Crypt_Rsa_Key
{
    /**
     * @var Zend_Crypt_Rsa_Key_Public|null
     */
    protected $_publicKey = null;

    /**
     * @param string $pemString
     * @param string $passPhrase
     */
    public function __construct($pemString, $passPhrase = null)
    {
        $this->_pemString = $pemString;
        $this->_parse($passPhrase);
    }

    /**
     * @param string|null $passPhrase
     * @throws Zend_Crypt_Exception
     * @return void
     */
    protected function _parse($passPhrase)
    {
        $result = openssl_get_privatekey($this->_pemString, $passPhrase);
        if (!$result) {
            throw new Zend_Crypt_Exception('Unable to load private key');
        }
        $this->_opensslKeyResource = $result;
        $this->_details            = openssl_pkey_get_details($this->_opensslKeyResource);
    }

    /**
     * @return Zend_Crypt_Rsa_Key_Public
     */
    public function getPublicKey()
    {
        if ($this->_publicKey === null) {
            $this->_publicKey = new Zend_Crypt_Rsa_Key_Public($this->_details['key']);
        }
        return $this->_publicKey;
    }
}
