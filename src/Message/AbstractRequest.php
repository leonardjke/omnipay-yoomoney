<?php

namespace Omnipay\YooMoney\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;

abstract class AbstractRequest extends OmnipayRequest
{
    public $endpoint = 'https://yoomoney.ru/quickpay/confirm.xml';

    public function getEndpoint()
    {
        return $this->endpoint;
    }

//    public function getAccount()
//    {
//        return $this->getParameter('account');
//    }
//
//    public function setAccount($value)
//    {
//        return $this->setParameter('account', $value);
//    }

    public function getQuickpayForm()
    {
        return $this->getParameter('quickpay_form');
    }

    public function getPaymentType()
    {
        return $this->getParameter('payment_type');
    }

    /** Value: PC - оплата из кошелька ЮMoney, AC - с банковской карты, MC - с баланса мобильного */
    public function setPaymentType($value)
    {
        return $this->setParameter('payment_type', $value);
    }

    public function getSuccessUrl()
    {
        return $this->getParameter('success_url');
    }


}
