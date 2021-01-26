<?php

namespace Omnipay\YooMoney\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class CompletePurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    public function isSuccessful()
    {
        return true;
    }

    public function getTransactionId()
    {
        return $this->data['label'];
    }

    public function getAmount()
    {
        return floatval($this->data['amount']);
    }

    public function getCurrency()
    {
        return $this->data['currency'];
    }

}
