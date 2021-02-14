<?php

namespace Omnipay\YooMoney\Traits;

trait ResponseFieldsTrait
{

    /**
     * Get a POST data item, or null if not present.
     *
     * @param string $name The key for the field.
     * @param mixed $default The value to return if the data item is not found at all, or is null.
     *
     * @return mixed           The value of the field, often a string, but could be case to anything..
     */
    protected function getDataItem($name, $default = null)
    {
        return isset($this->data[$name]) ? $this->data[$name] : $default;
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
        return $this->getDataItem('label');
    }

    public function getTransactionReference()
    {
        return $this->getDataItem('operation_id');
    }

    public function getOperationId()
    {
        return $this->getTransactionReference();
    }

    public function getAmount()
    {
        return $this->formatCurrency($this->getDataItem('amount', 0));
    }

    public function getWithdrawAmount()
    {
        return $this->formatCurrency($this->getDataItem('withdraw_amount', 0));
    }

    public function getCurrency()
    {
        return 'RUB';
    }

    public function getNotificationType()
    {
        return $this->getDataItem('notification_type');
    }

    public function getBillId()
    {
        return $this->getDataItem('bill_id');
    }

    public function getCodePro()
    {
        return $this->getDataItem('codepro');
    }

    public function getUnaccepted()
    {
        return $this->getDataItem('unaccepted');
    }

    public function getDatetime()
    {
        return $this->getDataItem('datetime');
    }

    public function getSender()
    {
        return $this->getDataItem('sender');
    }

    public function getSha1Hash()
    {
        return $this->getDataItem('sha1_hash');
    }

    public function getOperationLabel()
    {
        return $this->getDataItem('operation_label');
    }

    public function getTestMode()
    {
        return $this->getDataItem('test_notification', false);
    }

    public function getLastName()
    {
        return $this->getDataItem('lastname');
    }

    public function getFirstname()
    {
        return $this->getDataItem('firstname');
    }

    public function getFathersname()
    {
        return $this->getDataItem('fathersname');
    }

    public function getEmail()
    {
        return $this->getDataItem('email');
    }

    public function getPhone()
    {
        return $this->getDataItem('phone');
    }

    public function getCity()
    {
        return $this->getDataItem('city');
    }

    public function getStreet()
    {
        return $this->getDataItem('street');
    }

    public function getBuilding()
    {
        return $this->getDataItem('building');
    }

    public function getSuite()
    {
        return $this->getDataItem('suite');
    }

    public function getFlat()
    {
        return $this->getDataItem('flat');
    }

    public function getZip()
    {
        return $this->getDataItem('zip');
    }

}
