<?php
/**
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\Yoomoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\Yoomoney\Message\CompletePurchaseRequest;
use Omnipay\Yoomoney\Message\PurchaseRequest;
use Omnipay\Yoomoney\Message\ServerNotifyRequest;

/**
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = [])
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'YooMoney';
    }

    public function getDefaultParameters()
    {
        return [
            'secret'        => '',
            'receiver'      => '',
            'quickpay_form' => 'shop',
            'payment_type'  => 'PC',
            'success_url'   => null,
            'targets'       => null,
            'need_fio'      => false,
            'need_email'    => false,
            'need_phone'    => false,
            'need_address'  => false,
            'testMode'      => false,
        ];
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
     * @return Gateway
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
     * @return Gateway
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

    /**
     * @param string $value Необязательный параметр (название магазина)
     *
     * @return Gateway
     */
    public function setTargets($value)
    {
        return $this->setParameter('targets', $value);
    }

    public function getTargets()
    {
        return $this->getParameter('targets');
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * Use acceptNotifications
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\RequestInterface
     * @deprecated
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

    /**
     * Handle notification callback.
     * Replaces completeAuthorize() and completePurchase()
     *
     * @return \Omnipay\Common\Message\AbstractRequest|ServerNotifyRequest
     */
    public function acceptNotification(array $parameters = array())
    {
        return $this->createRequest(ServerNotifyRequest::class, $parameters);
    }


    public function __call1($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
