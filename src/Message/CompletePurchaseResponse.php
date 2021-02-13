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

    public function getLabel()
    {
        return $this->getTransactionId();
    }

    public function getAccount()
    {
        return $this->getTransactionId();
    }

    public function getTransactionId()
    {
        return $this->data['label'];
    }

    public function getTransactionReference()
    {
        return $this->data['operation_id'];
    }

    public function getAmount()
    {
        return floatval($this->data['amount']);
    }

    public function getWithdrawAmount()
    {
        return floatval($this->data['withdraw_amount']);
    }

    public function getCurrency()
    {
        return $this->data['currency'];
    }

    public function getNotificationType()
    {
        return $this->data['notification_type'];
    }

    public function getBillId()
    {
        return $this->data['bill_id'];
    }

    public function getCodePro()
    {
        return $this->data['codepro'];
    }

    public function getUnaccepted()
    {
        return $this->data['unaccepted'];
    }

    public function getDatetime()
    {
        return $this->data['datetime'];
    }

    public function getSender()
    {
        return $this->data['sender'];
    }

    public function getSha1Hash()
    {
        return $this->data['sha1_hash'];
    }

    public function getOperationLabel()
    {
        return $this->data['operation_label'];
    }

}
