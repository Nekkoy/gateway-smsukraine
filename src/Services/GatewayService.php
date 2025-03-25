<?php

namespace Nekkoy\GatewaySmsukraine\Services;

use Nekkoy\GatewaySmsukraine\DTO\ConfigDTO;

/**
 *
 */
class GatewayService
{
    protected $config;

    public function __construct()
    {
        $this->config = config('gateway-smsukraine', []);
    }

    /**
     * @return ConfigDTO
     */
    public function getConfig()
    {
        return new ConfigDTO($this->config);
    }
}
