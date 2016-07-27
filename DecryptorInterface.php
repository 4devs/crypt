<?php

namespace FDevs\Crypt;

use FDevs\Crypt\Exception\Exception;

interface DecryptorInterface
{
    /**
     * Encrypted text to plain.
     *
     * @param string      $data Encrypted text
     * @param string|null $key
     *
     * @return string Plain text
     *
     * @throws Exception
     */
    public function decrypt($data, $key = null);
}
