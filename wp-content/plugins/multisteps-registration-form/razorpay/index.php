<?php

require('config.php');
require('razorpay-php/Razorpay.php');
@session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$cost = base64_decode($_GET['cost']);
$orderData = [
    'receipt'         => "receipt_order".rand(10000000,99999999),
    'amount'          => $cost * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$user_data=$_SESSION['user_data'];

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Super Markeet",
    "description"       => "E-Commerce Webiste.",
    "image"             => "https://www.supermarkeet.com/wp-content/uploads/2020/08/cropped-supermarkeet.png",
    "prefill"           => [
    "name"              => $user_data['owner_name'],
    "email"             => $user_data['email_address'],
    "contact"           => $user_data['phone_number'],
    ],
    "notes"             => [
    "address"           => $user_data['shop_address_1'],
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
