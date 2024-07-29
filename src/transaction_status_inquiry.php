<?php

use BRI\TransferCredit\TransactionStatusInquiry;
use BRI\Util\GetAccessToken;

require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..' . '')->load();

require __DIR__ . '/../../briapi-sdk/autoload.php';

// env values
$clientId = $_ENV['CONSUMER_KEY']; // customer key
$clientSecret = $_ENV['CONSUMER_SECRET']; // customer secret
$pKeyId = $_ENV['PRIVATE_KEY']; // private key

// url path values
$baseUrl = 'https://sandbox.partner.api.bri.co.id'; //base url

// change variables accordingly
$partnerId = ''; //partner id
$channelId = ''; // channel id

$beneficiaryAccountNo = '';
$deviceId = '';
$channel = '';
$originalPartnerReferenceNo = '';
$serviceCode = '';
$transactionDate = ''; // 2021-11-30T10:30:24+07:00
$getAccessToken = new GetAccessToken();

$transactionStatusInquiry = new TransactionStatusInquiry();

[$accessToken, $timestamp] = $getAccessToken->get(
  $clientId,
  $pKeyId,
  $baseUrl
);

$response = $transactionStatusInquiry->inquiry(
  $clientSecret,
  $partnerId,
  $baseUrl,
  $accessToken,
  $channelId,
  $timestamp,
  $originalPartnerReferenceNo,
  $serviceCode,
  $transactionDate,//(new GenerateDate())->generate(),
  $deviceId,
  $channel
);

echo "transfer status inquiry $response \n";
