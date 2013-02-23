<?php
/**
 * @author Shaharia Azam
 * @link http://www.shahariaazam.com
 * @description To encrypt data by using crypt() function of PHP with BlowFish algorithm
 */

namespace Security\PasswordEncrypt;

class PasswordEncrypt
{
    /**
     * @method Encrypt()
     * @description to encrypt data we have used crypt(). PHP itself recommend it.
     * See http://www.php.net/manual/en/faq.passwords.php#faq.passwords.fasthash
     * crypt() needs 2 parameter one is String (which needs to be encrypted) and another one is salt
     * @param null $password
     * @return array
     */
    function Encrypt($password = null, $salt = null)
    {
        if (empty($salt)) {
            $salt = $this->generateSalt();
        }
        $encrypted = crypt($password, $salt);
        return array('Salt' => $salt, 'Encrypted' => $encrypted);
    }

    /**
     * @method generateSalt
     * @description Generating salt which will be used to encrypt our password
     * There are different types of methods to make salt which will act differently in our crypt()
     * Default hashType = blowfish. Cause it's more secured
     * @param string $hashType
     * @param int $cost repeat counter to crypt(). Suppose we have passed 13 as cost so that crypt() will repeat it's work
     *                  for 13 times. The more cost will be the more time crypt() will take to encrypt data.
     * @return string
     */
    protected function generateSalt($hashType = 'blowfish', $cost = 13)
    {
        $string = $this->generateRand();
        if ($hashType == "blowfish") {
            $salt = sprintf('$2a$%02d$%s$', $cost, $string);
        }
        return $salt;
    }

    /**
     * @method generateRand
     * @description Generating few specific length random string which will be used to get random salt
     * @param int $length
     * @return string
     */
    function generateRand($length = 28)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $integar = "1234567890";
        $chars .= strtoupper($chars);
        $chars .= $integar;
        return substr(str_shuffle($chars), 0, $length);
    }
}

$obj = new PasswordEncrypt();
$encryptedData = $obj->Encrypt('Password');
var_dump($encryptedData);