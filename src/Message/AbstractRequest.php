<?php

namespace Omnipay\Yoomoney\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;
use Omnipay\Yoomoney\Traits\Parametrable;

abstract class AbstractRequest extends OmnipayRequest
{
    use Parametrable;

    public $endpoint = 'https://yoomoney.ru/quickpay/confirm.xml';

    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
