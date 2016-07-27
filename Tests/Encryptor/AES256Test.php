<?php

namespace FDevs\Crypt\Tests\Encryptor;

use FDevs\Crypt\Encryptor\AES256;
use FDevs\Crypt\Tests\CryptoTest;

class AES256Test extends CryptoTest
{
    /**
     * {@inheritdoc}
     */
    public function getSuccess()
    {
        return [
            ['123', 'secretsecretsecr', base64_decode('iOGbTpirdfzTaFq7h64crA==')],
            ['test data', 'best secret key!', base64_decode('nUfltLpGqpgV17BVXM7QSA==')],
            ['test data', 'best secret key best secret key!', base64_decode('jekxi8RGPU+LGh8sIJrWtA==')],
            ['other test data', 'best secret key best secret key!', base64_decode('OxhNKkkPGinn4tna414Kgg==')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        return new AES256();
    }
}
