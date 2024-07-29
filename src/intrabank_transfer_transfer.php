<?php
require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..' . '')->load();

require __DIR__ . '/../../briapi-sdk/autoload.php';

use BRI\TransferCredit\IntrabankTransfer;
use BRI\Util\GenerateDate;
use BRI\Util\GetAccessToken;

$intrabankTransfer = new IntrabankTransfer();

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
$partnerReferenceNo = '';
$sourceAccountNo = '';
$feeType = '';
$remark = '';
$customerReference = '';
$transactionDate = (new GenerateDate())->generate();
$value = ''; // 10000.00
$currency = '';

$getAccessToken = new GetAccessToken();

[$accessToken, $timestamp] = $getAccessToken->get(
  $clientId,
  $pKeyId,
  $baseUrl
);

$response = $intrabankTransfer->transfer(
  $clientSecret,
  $partnerId,
  $baseUrl,
  $accessToken,
  $channelId,
  $timestamp,
  $partnerReferenceNo,
  $value,
  $beneficiaryAccountNo,
  $sourceAccountNo,
  $feeType,
  $remark,
  $transactionDate,
  $currency,
  $customerReference,
  $deviceId,
  $channel
);

echo "transfer $response \n";
