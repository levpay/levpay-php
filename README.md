<img src="https://avatars2.githubusercontent.com/u/27030359?s=127&v=4" width="127px" height="127px" align="left" />

# 💙 levpay's PHP API

PHP integration for [Levpay API](https://docs.levpay.com/)

<br />

## Installation

Via Composer

```sh
composer require 'levpay/levpay-php'
```

## Usage

### Basic

First you need to create an **levToken** (*read more on [documentation](https://docs.levpay.com/#have-you-got-your-levtoken)*)

```php
$client_id = "...";
$secret_key = "...";
$environment = "homolog"
$lp = new \Levpay\Levpay($client_id, $secret_key, $environment);
$object = array(
  'payment_method' => 'transferencia',
  'description' => 'testing create new order by Levpay php Class',
  'partner_reference' => 'lev20181226141600',
  'bank_slug' => 'bradesco',
  'amount' => 10.00,
  'expiration' => 3600,
  'data' => array(),
  'customer' => array(
    'name' => 'Thiago Avelino',
    'document_number' => '00000000000',
    'phone_number' => '+55 11 00000-0000',
    'email' => 'a@levpay.com',
    'data' => array()
  )
);
print_r($lp->CreateOrder($object));
```
