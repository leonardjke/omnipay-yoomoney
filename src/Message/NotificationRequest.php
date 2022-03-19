<?php

namespace Omnipay\Yoomoney\Message;

use Omnipay\Common\Message\NotificationInterface;

class NotificationRequest extends AbstractRequest implements NotificationInterface
{

    public const HASH_ERROR = 'hash_error';
    public const UNACCEPTED = 'unaccepted';
    public const PROTECTED  = 'protected';

    protected $data;

    public function getData()
    {
        if (isset($this->data))
        {
            return $this->data;
        }

        return $this->data = $this->httpRequest->request->all();
    }

    /**
     * @inheritdoc
     */
    public function getTransactionReference()
    {
        return $this->getOperationId();
    }

    /**
     * @inheritdoc
     */
    public function getTransactionStatus()
    {
        if (!$this->isValid())
        {
            return self::STATUS_FAILED;
        }

        if ($this->getUnaccepted())
        {
            return self::STATUS_PENDING;
        }

        if ($this->getCodePro())
        {
            return self::STATUS_PENDING;
        }

        return self::STATUS_COMPLETED;
    }

    /**
     * @inheritdoc
     */
    public function getMessage()
    {
        if (!$this->isValid())
        {
            return self::HASH_ERROR; // Хэш не совпадает
        }

        if ($this->getUnaccepted())
        {
            return self::UNACCEPTED; // Перевод еще не зачислен. Получателю нужно освободить место в кошельке
        }

        if ($this->getCodePro())
        {
            return self::PROTECTED; // Перевод защищен кодом протекции
        }

        return null;
    }

    public function isValid()
    {
        return $this->getSignature() === $this->buildSignature();
    }

    private function getSignature()
    {
        return $this->getSha1Hash();
    }

    private function buildSignature()
    {
        $params = [
            $this->getDataItem('notification_type'),
            $this->getDataItem('operation_id'),
            $this->getDataItem('amount'),
            $this->getDataItem('currency'),
            $this->getDataItem('datetime'),
            $this->getDataItem('sender'),
            $this->getDataItem('codepro'),
            $this->getSecret(),
            $this->getDataItem('label', ''),
        ];

        return hash('sha1', implode("&", $params));
    }

    protected function getDataItem($name, $default = null)
    {
        $data = $this->getData();

        return $data[$name] ?? $default;
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

    public function getOperationId()
    {
        return $this->getDataItem('operation_id');
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
        return filter_var($this->getDataItem('codepro'), FILTER_VALIDATE_BOOLEAN);
    }

    public function getUnaccepted()
    {
        return filter_var($this->getDataItem('unaccepted'), FILTER_VALIDATE_BOOLEAN);
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
        return filter_var($this->getDataItem('test_notification', false), FILTER_VALIDATE_BOOLEAN);
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

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setReceiver($value)
    {
        return $this->setParameter('receiver', $value);
    }

    public function sendData($data)
    {
        return $this;
    }
}
