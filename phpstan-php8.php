<?php

declare(strict_types = 1);

if (version_compare(PHP_VERSION, '8.0', '>=')) {
    return array(
        'parameters' => array(
            'ignoreErrors' => array(
                array(
                    'message' => '#Property Zend_Crypt_Rsa_Key::\$_opensslKeyResource \(resource\) does not accept OpenSSLAsymmetricKey\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa/Key/Public.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Property Zend_Crypt_Rsa_Key::\$_opensslKeyResource \(resource\) does not accept OpenSSLAsymmetricKey\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa/Key/Private.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#3 \$private_key of function openssl_sign expects array\|OpenSSLAsymmetricKey\|OpenSSLCertificate\|string, resource given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#3 \$public_key of function openssl_verify expects array\|OpenSSLAsymmetricKey\|OpenSSLCertificate\|string, resource given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#3 \$private_key of callable \'openssl_private…\'\|\'openssl_public…\' expects array\|OpenSSLAsymmetricKey\|OpenSSLCertificate\|string, resource given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa.php',
                    'count'   => 2,
                ),
                array(
                    'message' => '#Parameter \#1 \$num1 of function gmp_div expects GMP\|int\|string, GMP\|resource\|string given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Math/BigInteger/Gmp.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#2 \$num2 of function gmp_div expects GMP\|int\|string, GMP\|resource\|string given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Math/BigInteger/Gmp.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#1 \$num of function gmp_strval expects GMP\|int\|string, GMP\|resource\|string given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Math/BigInteger/Gmp.php',
                    'count'   => 1,
                ),
            )
        )
    );
} else {
    return array();
}
