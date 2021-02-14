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

    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setReceiver($value)
    {
        return $this->setParameter('receiver', $value);
    }

    public function getReceiver()
    {
        return $this->getParameter('receiver');
    }

    /**
     * @param string $value shop — для универсальной формы, small — для кнопки, donate — для «благотворительной» формы
     *
     * @return AbstractRequest
     */
    public function setQuickpayForm($value)
    {
        return $this->setParameter('quickpay_form', $value);
    }

    public function getQuickpayForm()
    {
        return $this->getParameter('quickpay_form');
    }

    /**
     * @param string $value PC - оплата из кошелька ЮMoney, AC - с банковской карты, MC - с баланса мобильного
     *
     * @return AbstractRequest
     */
    public function setPaymentType($value)
    {
        return $this->setParameter('payment_type', $value);
    }

    public function getPaymentType()
    {
        return $this->getParameter('payment_type');
    }

    public function setSuccessUrl($value)
    {
        return $this->setParameter('success_url', $value);
    }

    public function setReturnUrl($value)
    {
        return $this->setParameter('success_url', $value);
    }

    public function getSuccessUrl()
    {
        return $this->getParameter('success_url');
    }

    public function setNeedFio($value)
    {
        return $this->setParameter('need_fio', $value);
    }

    public function getNeedFio()
    {
        return $this->getParameter('need_fio');
    }

    public function setNeedEmail($value)
    {
        return $this->setParameter('need_email', $value);
    }

    public function getNeedEmail()
    {
        return $this->getParameter('need_email');
    }

    public function setNeedPhone($value)
    {
        return $this->setParameter('need_phone', $value);
    }

    public function getNeedPhone()
    {
        return $this->getParameter('need_phone');
    }

    public function setNeedAddress($value)
    {
        return $this->setParameter('need_address', $value);
    }

    public function getNeedAddress()
    {
        return $this->getParameter('need_address');
    }

    public function setTargets($value)
    {
        return $this->setParameter('targets', $value);
    }

    public function getTargets()
    {
        return $this->getParameter('targets');
    }

}
