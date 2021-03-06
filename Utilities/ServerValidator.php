<?php
namespace tpaySDK\Utilities;

class ServerValidator
{
    const REMOTE_ADDRESS = 'REMOTE_ADDR';

    const FORWARDER_ADDRESS = 'HTTP_X_FORWARDED_FOR';

    /**
     * @var bool
     */
    private $validateForwardedIP;

    /**
     * @var bool
     */
    private $validateServerIP;

    /**
     * @var bool
     */
    private $secureIP;

    public function __construct($validateServerIP, $validateForwardedIP, array $secureIP)
    {
        $this->validateServerIP = $validateServerIP;
        $this->validateForwardedIP = $validateForwardedIP;
        $this->secureIP = $secureIP;
    }

    /**
     * Check if request is called from secure tpay server
     *
     * @return bool
     */
    public function isValid()
    {
        if (!$this->validateServerIP) {
            return true;
        }
        $remoteIP = $this->getServerValue(static::REMOTE_ADDRESS);
        $forwarderIP = $this->getServerValue(static::FORWARDER_ADDRESS);
        if (is_null($remoteIP) && is_null($forwarderIP)) {
            return false;
        }
        if ($this->checkIP($remoteIP)) {
            return true;
        }
        if ($this->validateForwardedIP && $this->checkIP($forwarderIP)) {
            return true;
        }

        return false;
    }

    /**
     * Get value from $_SERVER array if exists
     *
     * @param string $name
     * @return string|null
     */
    private function getServerValue($name)
    {
        if (isset($_SERVER[$name])) {
            return $_SERVER[$name];
        }

        return null;
    }

    /**
     * Validate if $ip is secure
     *
     * @param $ip
     * @return bool
     */
    private function checkIP($ip)
    {
        return in_array($ip, $this->secureIP, true);
    }

}
