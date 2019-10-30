# ZeroBounce Email Verification Library for PHP

## Getting Started  
You will need a [zerobounce account](https://www.zerobounce.net) to get started.  
Once you get an account, you will need to [get an api key](https://www.zerobounce.net/members/apikey/) 
to use it in the API calls.  

## Installation

Make sure you have [composer](https://getcomposer.org) installed.

Require the package

```bash
$ composer require twisted1919/zerobounce
```

#### PHP Versions

Requires PHP >= 7.1  

## Usage

```php
<?php

// Include Composer autoloader
require_once 'vendor/autoload.php';

/** @var ZeroBounce\HttpClient\HttpClient $client */
$client = new ZeroBounce\HttpClient\HttpClient('YOUR-API-KEY');

/** @var ZeroBounce\Api $api */
$api = new ZeroBounce\Api($client);

try {

  /** @var ZeroBounce\Response\ValidateResponse $response */
  $response = $api->validate("test@example.com");

} catch (Exception $e) {

  var_dump($e);
}
```  
(see more in the `/example` folder)  

## License
MIT

## Test  
```bash
$ composer test
``` 

## Bug Reports
Report [here](https://github.com/twisted1919/zerobounce-php/issues).
