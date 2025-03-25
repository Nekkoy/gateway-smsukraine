# gateway-smsukraine
SMS Gateway для сервиса [smsukraine.com.ua](https://smsukraine.com.ua)

Установка:
```
composer require nekkoy/gateway-smsukraine
```

Конфигурация `.env`
===============
```
# Включить/выключить модуль
SMSUKRAINE_ENABLED=true

# Ключь API
SMSUKRAINE_API_KEY=

# Канал для отправки (sms/viber)
SMSUKRAINE_CHANNEL=sms

# Имя отправителя в СМС
SMSUKRAINE_SMS_NAME=

# Имя отправителя в Viber
SMSUKRAINE_VIBER_NAME=

# Значение 1 (если переотправлять сообщение по SMS в случае невозможности доставить через Viber)
SMSUKRAINE_RESEND_IF_VIBER_FAIL=0
```

Использование
===============

Создайте DTO сообщения, передав первым параметром текст, а вторым — номер получателя:
```
$message = new \Nekkoy\GatewayAbstract\DTO\MessageDTO("test", "+380123456789");
```

Затем вызовите метод отправки сообщения через фасад:
```
/** @var \Nekkoy\GatewayAbstract\DTO\ResponseDTO $response */
$response = \Nekkoy\GatewaySmsukraine\Facades\GatewaySmsukraine::send($message);
```

Метод возвращает DTO-ответ с параметрами:
 - message - сообщение об успешной отправке или ошибке
 - code - код ответа:
   - code < 0 - ошибка модуля
   - code > 0 - ошибка HTTP
   - code = 0 - успех
 - id - ID сообщения
