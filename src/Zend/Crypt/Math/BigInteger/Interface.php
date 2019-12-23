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
 * Support for arbitrary precision mathematics in PHP.
 *
 * Interface for a wrapper across any PHP extension supporting arbitrary
 * precision maths.
 *
 * @category   Zend
 * @package    Zend_Crypt
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
interface Zend_Crypt_Math_BigInteger_Interface
{
    /**
     * @param string $operand
     * @param int $base
     * @return string
     */
    public function init($operand, $base = 10);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $right_operand
     * @return string
     */
    public function add($left_operand, $right_operand);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $right_operand
     * @return string
     */
    public function subtract($left_operand, $right_operand);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $right_operand
     * @return string|int
     */
    public function compare($left_operand, $right_operand);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $right_operand
     * @return string|null
     */
    public function divide($left_operand, $right_operand);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $modulus
     * @return string
     */
    public function modulus($left_operand, $modulus);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $right_operand
     * @return string
     */
    public function multiply($left_operand, $right_operand);

    /**
     * @param string|GMP|resource $left_operand
     * @param int|string      $right_operand
     * @return string
     */
    public function pow($left_operand, $right_operand);

    /**
     * @param string|GMP|resource $left_operand
     * @param string|GMP|resource $right_operand
     * @param string|GMP|resource $modulus
     * @return string
     */
    public function powmod($left_operand, $right_operand, $modulus);

    /**
     * @param string|GMP|resource $operand
     * @return string
     */
    public function sqrt($operand);

    /**
     * @param string $operand
     * @return string
     */
    public function binaryToInteger($operand);

    /**
     * @param string|GMP|resource $operand GMP number resource
     * @return string
     */
    public function integerToBinary($operand);

    /**
     * @param string $operand
     * @return string
     */
    public function hexToDecimal($operand);
}
