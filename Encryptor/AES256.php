<?php

namespace FDevs\Crypt\Encryptor;

use FDevs\Crypt\CryptoInterface;
use FDevs\Crypt\Exception\KeyException;
use FDevs\Padding\PaddingInterface;
use FDevs\Padding\Pkcs7;

class AES256 implements CryptoInterface
{
    /**
     * @var string
     */
    private $iv;

    /**
     * @var int
     */
    private $blockSize;

    /**
     * @var PaddingInterface
     */
    private $padding;

    /**
     * AES256Encryptor constructor.
     */
    public function __construct()
    {
        $this->iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB), MCRYPT_RAND);
        $this->blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
    }

    /**
     * @param PaddingInterface $padding
     *
     * @return $this
     */
    public function setPadding(PaddingInterface $padding)
    {
        $this->padding = $padding;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function decrypt($data, $key = null)
    {
        return $this->unpad(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->prepareKey($key), $data, MCRYPT_MODE_ECB, $this->iv));
    }

    /**
     * {@inheritdoc}
     */
    public function encrypt($data, $key = null)
    {
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->prepareKey($key), $this->pad($data), MCRYPT_MODE_ECB, $this->iv);
    }

    /**
     * @param string $key
     *
     * @return string
     *
     * @throws KeyException
     */
    private function prepareKey($key)
    {
        $len = strlen($key);
        if ($len !== 16 && $len !== 24 && $len !== 32) {
            throw new KeyException(sprintf('Key of size %s not supported by this algorithm. Only keys of sizes 16, 24 or 32 supported', $len));
        }

        return $key;
    }

    /**
     * @return PaddingInterface|Pkcs7
     */
    private function getPadding()
    {
        if (!$this->padding) {
            $this->padding = new Pkcs7();
        }

        return $this->padding;
    }

    /**
     * @param string $data
     *
     * @return string
     */
    private function pad($data)
    {
        return $this->getPadding()->pad($data, $this->blockSize);
    }

    /**
     * @param string $data
     *
     * @return string
     */
    private function unpad($data)
    {
        return $this->getPadding()->unpad($data, $this->blockSize);
    }
}
