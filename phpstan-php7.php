<?php

declare(strict_types = 1);

if (version_compare(PHP_VERSION, '8.0', '<')) {
    return array(
        'parameters' => array(
            'ignoreErrors' => array(
                array(
                    'message' => '#Parameter \#2 \$passphrase of function openssl_get_privatekey expects string, string\|null given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa/Key/Private.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#1 \$configargs of function openssl_pkey_new expects array, array\|null given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Rsa.php',
                    'count'   => 1,
                ),
                array(
                    'message' => '#Parameter \#1 \$gmpnumber of function gmp_strval expects GMP\|int\|string, GMP\|resource\|string given\.#',
                    'path'    => __DIR__ . '/src/Zend/Crypt/Math/BigInteger/Gmp.php',
                    'count'   => 1,
                ),
            )
        )
    );
} else {
    return array();
}
