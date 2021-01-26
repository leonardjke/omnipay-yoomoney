<?php
/**
 * Yandex.Money driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-yandexmoney
 * @package   omnipay-yandexmoney
 * @license   MIT
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\YooMoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\YooMoney\Message\CompletePurchaseRequest;
use Omnipay\YooMoney\Message\PurchaseRequest;

/**
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = [])
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
            'receiver'      => '',
            'quickpay_form' => 'shop',
            'payment_type'  => 'PC',
            'success_url'   => '',
            'need_fio'      => false,
            'need_email'    => false,
            'need_phone'    => false,
            'need_address'  => false,
            'testMode'      => false,
        ];
    }

    public function getAccount()
    {
        return $this->getReceiver();
    }

    public function setAccount($value)
    {
        return $this->setReceiver($value);
    }

    public function getReceiver()
    {
        return $this->getParameter('receiver');
    }

    public function setReceiver($value)
    {
        return $this->setParameter('receiver', $value);
    }

    public function getQuickpayForm()
    {
        return $this->getParameter('quickpay_form');
    }

    /**
     * Values: shop — для универсальной формы, small — для кнопки, donate — для «благотворительной» формы
     *
     * @param $value
     *
     * @return Gateway
     */
    public function setQuickpayForm($value)
    {
        return $this->setParameter('quickpay_form', $value);
    }

    public function getPaymentType()
    {
        return $this->getParameter('payment_type');
    }

    /**
     * Values: PC - оплата из кошелька ЮMoney, AC - с банковской карты, MC - с баланса мобильного
     *
     * @param $value
     *
     * @return Gateway
     */
    public function setPaymentType($value)
    {
        return $this->setParameter('payment_type', $value);
    }

    /**
     * @param bool $needFio
     * @param false $needEmail
     * @param false $needPhone
     * @param false $needAddress
     *
     * @return Gateway
     */
    public function setNeedInformation($needFio, $needEmail, $needPhone, $needAddress)
    {
        $this->setParameter('need_fio', $needFio);
        $this->setParameter('need_email', $needEmail);
        $this->setParameter('need_phone', $needPhone);
        $this->setParameter('need_address', $needAddress);

        return $this;
    }

    public function getSuccessUrl()
    {
        return $this->getParameter('success_url');
    }

    public function setSuccessUrl($value)
    {
        return $this->setParameter('success_url', $value);
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
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

    public function __call1($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array())
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
