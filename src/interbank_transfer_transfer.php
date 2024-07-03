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

$partnerReferenceNo = '20211130000000001';
$beneficiaryAccountName = 'Dummy';
$beneficiaryAccountNo = '888801000187508';
$beneficiaryBankCode = '002';
$sourceAccountNo = '988901000187608';
$transactionDate = (new GenerateDate())->generate();
$beneficiaryAddress = 'Palembang';
$beneficiaryBankName = 'Bank BRI';
$beneficiaryEmail = 'yories.yolanda@work.bri.co.id';
$customerReference = '10052023';
$value = "1000000.00";
$currency = 'IDR';
$deviceId = '12345679237';
$channel = 'mobilephone';

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
