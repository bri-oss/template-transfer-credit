# Transfer Credit

This is a simple template for Transfer Credit SNAP BI using PHP.

module:
- [Interbank Transfer](https://developers.bri.co.id/en/snap-bi/api-account-inquiry-external-interbank-transfer#Transfer)
- [Intrabank Transfer](https://developers.bri.co.id/en/snap-bi/api-account-inquiry-internal-intrabank-transfer-v11)
- [Transaction Status Inquiry](https://developers.bri.co.id/en/snap-bi/api-transaction-status-inquiry)

## List of Content
- [Instalasi](#instalasi)
  - [Prerequisites](#prerequisites)
  - [How to Setup Project](#how-to-setup-project)
  - [Interbank Transfer Inquiry](#interbank-transfer-inquiry)
  - [Interbank Transfer Transfer](#interbank-transfer-transfer)
  - [Intrabank Transfer Inquiry](#intrabank-transfer-inquiry)
  - [Transaction Status Inquiry](#transaction-status-inquiry)
- [Caution](#caution)
- [Disclaimer](#disclaimer)

## Instalasi

### Prerequisites
- php
- composer

### How to Setup Project

```bash
1. copy .env file by typing 'cp .env.example .env' in the terminal
2. fill the .env file with the required values
3. run composer install to install all dependencies
```

### Interbank Transfer Inquiry
```bash
1. fill partnerId and channelId
2. fill beneficiaryAccountCode example 002
3. fill beneficiaryAccountNo example 888801000157508
4. run command `php src/interbank_transfer_inquiry.php serve`
```

### Interbank Transfer Transfer
```bash
1. fill partnerId and channelId
2. fill partnerReferenceNo is Transaction identification on service provider system example 2020102900000000000001
3. fill beneficiaryAccountName example Dummy
4. fill beneficiaryAccountNo example 888801000187508
5. fill beneficiaryBankCode example 002
6. fill sourceAccountNo example 988901000187608
7. fill transactionDate by default this template give you utils that can generate date
8. fill beneficiaryAddress example palembang
9. fill beneficiaryBankName example Bank BRI
10. fill beneficiaryEmail example yories.yolanda@work.bri.co.id
11. fill customerReference example 10052023
12. fill value example 1000000.00
13. fill currency example IDR
14. fill deviceId example 12345
15. fill channel example mobilephone
16. run command `php src/interbank_transfer_inquiry.php serve`
```

### Intrabank Transfer Inquiry
```bash
1. fill partnerId and channelId
2. fill beneficiaryAccountCode example 002
3. fill beneficiaryAccountNo example 888801000157508
4. run command `php src/intrabank_transfer_inquiry.php serve`
```

### Intrabank Transfer Transfer
```bash
1. fill partnerId and channelId
2. fill beneficiaryAccountNo is Transaction identification on service provider system example 2020102900000000000001
3. fill deviceId example '12345679237'
4. fill channel example mobilephone
5. fill partnerReferenceNo example 2021112500000000000001
6. fill sourceAccountNo example 888801000157610
7. fill feeType example BEN
8. fill remark example remark test
9. fill customerReference example 10052031
10. fill transactionDate by default this template give you utils that can generate date
11. fill value example 1000000.00
12. fill currency example IDR
13. run command `php src/intrabank_transfer_transfer.php serve`
```

### Transaction Status Inquiry
```bash
1. fill partnerId and channelId
2. fill beneficiaryAccountNo example 888801000157508
3. fill deviceId
4. fill channel
5. fill originalPartnerReferenceNo example 10052031
6. fill serviceCode example 17
7. fill transactionDate by default this template give you utils that can generate date example 2021-11-30T10:30:24+07:00
8. run command `php src/transaction_status_inquiry.php serve`
```

## Caution

Please delete the .env file before pushing to github or bitbucket

## Disclaimer

Please note that this project is just a template on the use of BRI-API php sdk and may have bugs or errors.
