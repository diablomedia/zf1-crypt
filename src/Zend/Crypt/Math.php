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
 * @subpackage Math
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
class Zend_Crypt_Math extends Zend_Crypt_Math_BigInteger
{

    /**
     * Generate a pseudorandom number within the given range.
     * Will attempt to read from a systems RNG if it exists or else utilises
     * a simple random character to maximum length process. Simplicity
     * is a factor better left for development...
     *
     * @param string|int $minimum
     * @param string|int $maximum
     * @return string|false|int
     * @deprecated This method should not be used because it's broken and won't return a number in the range specified
     */
    public function rand($minimum, $maximum)
    {
        // The result of this block will return a binary string, which isn't a number between
        // minimum and maximum.
        if (file_exists('/dev/urandom')) {
            $frandom = fopen('/dev/urandom', 'r');
            if ($frandom !== false) {
                return fread($frandom, strlen($maximum) !== 0 ? strlen($maximum) - 1 : strlen($maximum));
            }
        }
        // This is the only case where this method actually returns a number between minimum
        // and maximum
        if (strlen($maximum) < 4) {
            return mt_rand($minimum, $maximum - 1);
        }

        // This will return a number that is the same length as the maximum input, but there's nothing
        // to guarantee that the returned number is greater than the minimum, or less than the maximum
        // since it's just generating a number of strlen($maximum) using random numbers for each position
        // in the string.
        $rand = '';
        $i2   = strlen($maximum) - 1;
        for ($i = 1; $i < $i2; $i++) {
            $rand .= mt_rand(0, 9);
        }
        $rand .= mt_rand(0, 9);
        return $rand;
    }

    /**
     * Return a random strings of $length bytes
     *
     * @param  integer $length
     * @param  boolean $strong
     * @return string|false
     */
    public static function randBytes($length, $strong = false)
    {
        $length = (int) $length;
        if ($length <= 0) {
            return false;
        }
        if (function_exists('random_bytes')) { // available in PHP 7
            return random_bytes($length);
        }
        if (function_exists('mcrypt_create_iv')) {
            $bytes = mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
            if ($bytes !== false && strlen($bytes) === $length) {
                return $bytes;
            }
        }
        if (file_exists('/dev/urandom') && is_readable('/dev/urandom')) {
            $frandom = fopen('/dev/urandom', 'r');
            if ($frandom !== false) {
                return fread($frandom, $length);
            }
        }
        if (true === $strong) {
            throw new Zend_Crypt_Exception(
                'This PHP environment doesn\'t support secure random number generation. ' .
                'Please consider installing the OpenSSL and/or Mcrypt extensions'
            );
        }
        $rand = '';
        for ($i = 0; $i < $length; $i++) {
            $rand .= chr(mt_rand(0, 255));
        }
        return $rand;
    }

    /**
     * Return a random integer between $min and $max
     *
     * @param  integer $min
     * @param  integer $max
     * @param  boolean $strong
     * @return integer
     */
    public static function randInteger($min, $max, $strong = false)
    {
        if ($min > $max) {
            throw new Zend_Crypt_Exception(
                'The min parameter must be lower than max parameter'
            );
        }
        $range = $max - $min;
        if ($range == 0) {
            return $max;
        } elseif ($range > PHP_INT_MAX || is_float($range)) {
            throw new Zend_Crypt_Exception(
                'The supplied range is too great to generate'
            );
        }
        if (function_exists('random_int')) { // available in PHP 7
            return random_int($min, $max);
        }
        // calculate number of bits required to store range on this machine
        $r    = $range;
        $bits = 0;
        while ($r) {
            $bits++;
            $r >>= 1;
        }
        $bits   = (int) max($bits, 1);
        $bytes  = (int) max(ceil($bits / 8), 1);
        $filter = (int) ((1 << $bits) - 1);
        do {
            $rnd = hexdec(bin2hex(self::randBytes($bytes, $strong)));
            $rnd &= $filter;
        } while ($rnd > $range);
        return ($min + $rnd);
    }

    /**
     * Get the big endian two's complement of a given big integer in
     * binary notation
     *
     * @param string $long
     * @return string
     */
    public function btwoc($long)
    {
        if (ord($long[0]) > 127) {
            return "\x00" . $long;
        }
        return $long;
    }

    /**
     * Translate a binary form into a big integer string
     *
     * @param string $binary
     * @return string
     */
    public function fromBinary($binary)
    {
        return $this->_math->binaryToInteger($binary);
    }

    /**
     * Translate a big integer string into a binary form
     *
     * @param string $integer
     * @return string
     */
    public function toBinary($integer)
    {
        return $this->_math->integerToBinary($integer);
    }
}
