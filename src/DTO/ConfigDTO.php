<?php

namespace Nekkoy\GatewaySmsukraine\DTO;

use Nekkoy\GatewayAbstract\DTO\AbstractConfigDTO;

/**
 *
 */
class ConfigDTO extends AbstractConfigDTO
{
    /**
     * API KEY
     * @var string
     */
    public $api_key;

    /**
     * Имя при отправке через СМС
     * @var string
     */
    public $name_sms;

    /**
     * Имя при отправке через Viber
     * @var string
     */
    public $name_viber;

    /**
     * Канал отправки (sms/viber))
     * @var string
     */
    public $channel;

    /**
     * Значение 1 (если переотправлять сообщение по SMS в случае невозможности доставить через Viber)
     * @var int
     */
    public $sms_on_fail;

    /**
     * @var string
     */
    public $handler = \Nekkoy\GatewaySmsukraine\Services\SendMessageService::class;
}
