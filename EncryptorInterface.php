<?php

namespace FDevs\Crypt;

use FDevs\Crypt\Exception\Exception;

interface EncryptorInterface
{
    /**
     * Plain text to encrypt.
     *
     * @param string      $data Plain text
     * @param string|null $key
     *
     * @return string
     *
     * @throws Exception
     */
    public function encrypt($data, $key = null);
}
