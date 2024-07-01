<?php
require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..' . '')->load();

require __DIR__ . '/../briapi-sdk/autoload.php';

use BRI\TransferCredit\InterbankTransfer;
use BRI\Util\GetAccessToken;

$interbankTransfer = new InterbankTransfer();

// env values
$clientId = $_ENV['CONSUMER_KEY']; // customer key
$clientSecret = $_ENV['CONSUMER_SECRET']; // customer secret
$pKeyId = $_ENV['PRIVATE_KEY']; // private key

// url path values
$baseUrl = 'https://sandbox.partner.api.bri.co.id'; //base url

// change variables accordingly
$partnerId = ''; //partner id
$channelId = ''; // channel id

$beneficiaryBankCode = '002';
$beneficiaryAccountNo = '888801000157508';
$deviceId = '';
$channel = '';

$getAccessToken = new GetAccessToken();

[$accessToken, $timestamp] = $getAccessToken->get(
  $clientId,
  $pKeyId,
  $baseUrl
);

$response = $interbankTransfer->inquiry(
  $clientSecret,
  $partnerId,
  $baseUrl,
  $accessToken,
  $channelId,
  $timestamp,
  $beneficiaryBankCode,
  $beneficiaryAccountNo,
  $deviceId,
  $channel
);

echo "inquiry $response \n";
