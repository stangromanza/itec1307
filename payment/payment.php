<?php

require_once dirname(__FILE__) . '/omise-php/lib/Omise.php';

define('OMISE_API_VERSION', '2017-11-02');
// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
// define('OMISE_SECRET_KEY', 'SECRET_KEY');
define('OMISE_PUBLIC_KEY', 'pkey_test_59h5zegwaso33nhfm7m');
define('OMISE_SECRET_KEY', 'skey_test_59h5zegwuft2mxq8jxu');

$charge = OmiseCharge::create(array(
            'amount' => 10025,
            'currency' => 'thb',
            'card' => $_POST["omiseToken"]
        ));

if ($charge['status'] == 'successful') {
    echo 'Success';
} else {
    echo 'Fail';
}

print('<pre>');
print_r($charge);
print('</pre>');
