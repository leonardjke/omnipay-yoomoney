<?php

namespace Omnipay\Yoomoney\Message;

use Omnipay\Common\Exception\InvalidResponseException;

class CompletePurchaseRequest extends AbstractRequest
{

    public function getData()
    {
        $sign = $this->getSignature([
            $this->httpRequest->get("notification_type"),
            $this->httpRequest->get("operation_id"),
            $this->httpRequest->get("amount"),
            $this->httpRequest->get("currency"),
            $this->httpRequest->get("datetime"),
            $this->httpRequest->get("sender"),
            $this->httpRequest->get("codepro"),
            $this->getSecret(),
            $this->httpRequest->get("label"),
        ]);

        if ($this->httpRequest->get("sha1_hash") != $sign) {
            throw new InvalidResponseException("Callback hash does not match expected value");
        }

        return [
            'notification_type' => $this->httpRequest->get("notification_type"),
            'bill_id'           => $this->httpRequest->get("bill_id"),
            'amount'            => $this->httpRequest->get("amount"),
            'codepro'           => $this->httpRequest->get("codepro"),
            'withdraw_amount'   => $this->httpRequest->get("withdraw_amount"),
            'unaccepted'        => $this->httpRequest->get("unaccepted"),
            'operation_id'      => $this->httpRequest->get("operation_id"),
            'currency'          => $this->httpRequest->get("currency"),
            'datetime'          => $this->httpRequest->get("datetime"),
            'sender'            => $this->httpRequest->get("sender"),
            'label'             => $this->httpRequest->get("label"),
            'sha1_hash'         => $this->httpRequest->get("sha1_hash"),
            'operation_label'   => $this->httpRequest->get("operation_label"),
            'test_notification' => $this->httpRequest->get("test_notification"),
        ];
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    private function getSignature($params)
    {
        return hash('sha1', implode("&", $params));
    }
}
