<?php
/**
 * @Author  Shaharia Azam
 * @URL http://www.shahariaazam.com
 * This component will Check Server Status
 */

namespace Network\Status;

class ChechStatus
{
    /**
     * @param null $host
     * @param null $port
     * @param null $timeout
     *
     * @return bool|string
     */
    function PingToServer($host = null, $port = null, $timeout = null)
    {
        if (empty($host) || empty($port) || empty($timeout)) {
            return false;
        }
        $TimeStart = microtime(true);
        $Response = fSockOpen($host, $port, $errno, $errstr, $timeout);
        if (!$Response) {
            return "down";
        }
        $TimeEnd = microtime(true);
        return round((($TimeEnd - $TimeStart) * 1000), 0) . " ms";
    }
}
