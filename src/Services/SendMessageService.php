<?php

namespace Nekkoy\GatewaySmsukraine\Services;

use Nekkoy\GatewayAbstract\Services\AbstractSendMessageService;
use Nekkoy\GatewaySmsukraine\DTO\ConfigDTO;

/**
 *
 */
class SendMessageService extends AbstractSendMessageService
{
    /** @var string */
    protected $api_url = 'https://smsukraine.com.ua/api/http.php';

    /** @var string */
    protected $version = 'https';

    /** @var ConfigDTO */
    protected $config;

    /** @return mixed */
    protected function data()
    {
        $request = [
            'key' => $this->config->api_key,
            'command' => 'send',
            'from' => $this->config->name_sms,
            'to' => $this->message->destination,
            'message' => $this->message->text,
            'version' => $this->version
        ];

        if( !empty($this->config->name_viber) && strtolower($this->config->channel) == "viber" ){
            $request["viber"] = 1;
            $request["viber_type"] = "text";
            $request["viber_message"] = $this->message->text;
            $request["viber_from"] = $this->config->name_viber;
            $request["viber_lifetime"] = 86400;
            $request["viber_sms"] = (bool)$this->config->sms_on_fail;
        }

        $string = '';
        foreach( $request as $key => $value ) {
            $string .= '&' . $key . '=' . $this->base64_url_encode($value);
        }

        return $string;
    }

    /**
     * @param $input
     * @return string
     */
    public function base64_url_encode($input)
    {
        return strtr(base64_encode($input), '+/=', '-_,');
    }

    /**
     * @param $input
     * @return false|string
     */
    public function base64_url_decode($input)
    {
        return base64_decode(strtr($input, '-_,', '+/='));
    }

    /** @return mixed */
    protected function development()
    {
        return '{"id":12345}';
    }

    /** @return array */
    protected function response()
    {
        $response = @unserialize($this->base64_url_decode($this->response));
        if( isset($response['errors']) && !empty($response['errors']) ) {
            $this->response_code = -1;
            $this->response_message = implode(",", $response['errors']);
        } else {
            $this->response_code = 0;
        }

        if( isset($response["id"]) ) {
            $this->message_id = $response["id"];
        }

        return $response;
    }
}
