<?php

namespace Omnipay\Yoomoney\Message;

class PurchaseRequest extends AbstractRequest
{

    public function getData()
    {
        $this->validate('amount', 'description', 'transactionId');

        $targets = $this->getTargets();
        if (!$targets) {
            $targets = $this->getDescription();
        }

        $data = [
            'targets'       => $targets,
            'receiver'      => $this->getReceiver(),
            'quickpay-form' => $this->getQuickpayForm(),
            'paymentType'   => $this->getPaymentType(),
            'sum'           => $this->getAmount(),
            'label'         => $this->getTransactionId(),
            'need-fio'      => $this->getNeedFio(),
            'need-email'    => $this->getNeedEmail(),
            'need-phone'    => $this->getNeedPhone(),
            'need-address'  => $this->getNeedAddress(),
        ];

        if ($this->getSuccessUrl()) {
            $data['successURL'] = $this->getSuccessUrl();
        }

        if ($this->getTargets()) {
            $data['comment'] = $this->getDescription();
        }

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
