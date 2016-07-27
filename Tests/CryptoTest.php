<?php

namespace FDevs\Crypt\Tests;

use FDevs\Crypt\CryptoInterface;

abstract class CryptoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    abstract public function getSuccess();

    /**
     * @return CryptoInterface
     */
    abstract public function init();

    /**
     * test interface.
     */
    public function testInterface()
    {
        $this->assertInstanceOf(CryptoInterface::class, $this->init());
    }

    /**
     * @dataProvider getSuccess
     */
    public function testSuccessEncrypt($data, $key, $expected)
    {
        $encryptor = $this->init();
        $this->assertEquals($expected, $encryptor->encrypt($data, $key));
    }

    /**
     * @dataProvider getSuccess
     */
    public function testSuccessDecrypt($expected, $key, $data)
    {
        $encryptor = $this->init();
        $this->assertEquals($expected, $encryptor->decrypt($data, $key));
    }
}
