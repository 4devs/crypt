Crypt Component
===============

[![Build Status](https://travis-ci.org/4devs/crypt.svg?branch=master)](https://travis-ci.org/4devs/crypt)

## Installation
Crypt uses Composer, please checkout the [composer website](http://getcomposer.org) for more information.

The simple following command will install `fdevs/crypt` into your project. It also add a new
entry in your `composer.json` and update the `composer.lock` as well.


```bash
composer require fdevs/crypt
```

## Usage examples

### basic usage

```php
<?php
use FDevs\Crypt\Encryptor\AES256;

$encryptor = new AES256();
$data = '';//your data
$secretKey = '';//very secret key

$cryptData = $encryptor->encrypt($data, $secretKey);

echo $encryptor->decrypt($cryptData,$secretKey);
```


License
-------

This library is under the MIT license. See the complete license in the library:

    LICENSE


---
Created by [4devs](http://4devs.pro/) - Check out our [blog](http://4devs.io/) for more insight into this and other open-source projects we release.
