<?php

namespace Omnipay\YooMoney\Message;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\YooMoney\Traits\ResponseFieldsTrait;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class ServerNotifyRequest extends AbstractRequest implements NotificationInterface
{
    use ResponseFieldsTrait;

    protected $data;

    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        parent::__construct($httpClient, $httpRequest);

        $this->data = $httpRequest->request->all();
    }

    public function getData()
    {
        if (!$this->isValid()) {
            throw new InvalidResponseException("Callback hash does not match expected value");
        }

        return $this->data;
    }

    public function sendData($data)
    {
        return $this->data;
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

    /**
     * Was the transaction successful?
     *
     * @return string Transaction status, one of {@see STATUS_COMPLETED}, {@see #STATUS_PENDING},
     * or {@see #STATUS_FAILED}.
     */
    public function getTransactionStatus()
    {
        if (!$this->isValid()) {
            return self::STATUS_FAILED;
        }

        $isUnaccepted = $this->getUnaccepted();

        return filter_var($isUnaccepted, FILTER_VALIDATE_BOOL) ?
            self::STATUS_PENDING : self::STATUS_COMPLETED;
    }

    public function getMessage()
    {
        if (!$this->isValid()) {
            return sprintf('Callback hash does not match expected value');
        }

        return '';
    }

}
