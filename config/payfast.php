<?php
return [
    'merchant_id' => env('PAYFAST_MERCHANT_ID'), 'merchant_key' => env('PAYFAST_MERCHANT_KEY'),
    'passphrase' => env('PAYFAST_PASSPHRASE'), 'sandbox' => env('PAYFAST_SANDBOX', true),
    'url' => env('PAYFAST_SANDBOX', true) ? 'https://sandbox.payfast.co.za/eng/process' : 'https://www.payfast.co.za/eng/process',
];
