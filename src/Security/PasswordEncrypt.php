<?php
namespace Security\PasswordEncrypt;

class PasswordEncrypt
{
    public $_salt;
    protected $_hash;

    function __construct()
    {
        return null;
    }

    function Encrypt($password = null)
    {
        $salt = $this->generateSalt(null);
        $encrypted = crypt($password, $salt);
        return array('Salt' => $salt, 'Encrypted' => $encrypted);
    }

    /**
     * @param null $method
     * @return int
     */
    protected function generateSalt()
    {
        /**
         * @todo generate salt in various methods by researching internet
         */
        return $this->_salt;
    }

}

$obj = new \Security\PasswordEncrypt\PasswordEncrypt;
$obj->_salt = "ThisIsTheKey";
$EncryptedPassword = $obj->Encrypt('verysecretpassword');
var_dump($EncryptedPassword);