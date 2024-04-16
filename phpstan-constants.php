<?php

// Only defined when php/openssl compiled with MD2 support
if (!defined('OPENSSL_ALGO_MD2')) {
    define('OPENSSL_ALGO_MD2', 4);
}
if (!defined('OPENSSL_ALGO_DSS1')) {
    define('OPENSSL_ALGO_DSS1', 5);
}
if (!defined('MCRYPT_DEV_URANDOM')) {
    define('MCRYPT_DEV_URANDOM', '/dev/urandom');
}
