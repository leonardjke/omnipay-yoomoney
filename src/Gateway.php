<?php

namespace Omnipay\Yoomoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\Yoomoney\Message\CompletePurchaseRequest;
use Omnipay\Yoomoney\Message\PurchaseRequest;
use Omnipay\Yoomoney\Message\NotificationRequest;
use Omnipay\Yoomoney\Traits\Parametrable;

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
    use Parametrable;

    public function getName()
    {
        return 'Yoomoney';
    }

    public function getDefaultParameters()
    {
        return [
            'secret'        => '',
            'receiver'      => '',
            'quickpay_form' => 'shop',
            // shop — для универсальной формы, small — для кнопки, donate — для «благотворительной» формы
            'payment_type'  => 'PC',
            // PC - оплата из кошелька ЮMoney, AC - с банковской карты, MC - с баланса мобильного
            'success_url'   => null,
            'targets'       => null,
            // Необязательный параметр (название магазина)
            'need_fio'      => false,
            'need_email'    => false,
            'need_phone'    => false,
            'need_address'  => false,
            'testMode'      => false,
        ];
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
     * @return \Omnipay\Common\Message\NotificationInterface
     */
    public function acceptNotification(array $parameters = [])
    {
        return $this->createRequest(NotificationRequest::class, $parameters);
    }

}
