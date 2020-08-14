<?php

// Only defined when php/openssl compiled with MD2 support
if (!defined('OPENSSL_ALGO_MD2')) {
    define('OPENSSL_ALGO_MD2', 4);
}
if (!defined('OPENSSL_ALGO_DSS1')) {
    define('OPENSSL_ALGO_DSS1', 5);
}
