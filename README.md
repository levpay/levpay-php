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

First you need to create an levToken (read more on [documentation](https://docs.levpay.com/#have-you-got-your-levtoken))

```php
$client_id = "...";
$secret_key = "...";
$environment = "homolog"
$levPay = new \Levpay($environment, $client_id, $secret_key);
```
