<?php
require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..' . '')->load();

require __DIR__ . '/../../briapi-sdk/autoload.php';

use BRI\TransferCredit\InterbankTransfer;
use BRI\Util\GenerateDate;
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

$partnerReferenceNo = '';
$beneficiaryAccountName = '';
$beneficiaryAccountNo = '';
$beneficiaryBankCode = '';
$sourceAccountNo = '';
$transactionDate = (new GenerateDate())->generate();
$beneficiaryAddress = '';
$beneficiaryBankName = '';
$beneficiaryEmail = '';
$customerReference = '';
$value = "";
$currency = 'IDR';
$deviceId = '';
$channel = '';

$getAccessToken = new GetAccessToken();

[$accessToken, $timestamp] = $getAccessToken->get(
  $clientId,
  $pKeyId,
  $baseUrl
);

$response = $interbankTransfer->transfer(
  $clientSecret,
  $partnerId,
  $baseUrl,
  $accessToken,
  $channelId,
  $timestamp,
  $partnerReferenceNo,
  $value,
  $beneficiaryAccountName,
  $beneficiaryAccountNo,
  $beneficiaryBankCode,
  $sourceAccountNo,
  $transactionDate,
  $currency,
  $beneficiaryAddress,
  $beneficiaryBankName,
  $beneficiaryEmail,
  $customerReference,
  $deviceId,
  $channel
);

echo "transfer $response \n";
