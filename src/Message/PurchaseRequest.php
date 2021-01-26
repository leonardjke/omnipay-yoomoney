<?php

namespace Omnipay\YooMoney\Message;

class PurchaseRequest extends AbstractRequest
{

	public function getData()
	{
		$this->validate('amount', 'description', 'transactionId');

		$data = [
            'receiver'      => $this->getReceiver(),
            'quickpay-form' => $this->getQuickpayForm(),
            'targets'       => $this->getDescription(),
            'paymentType'   => $this->getPaymentType(),
            'sum'           => $this->getAmount(),
            'label'         => $this->getTransactionId(),
            'comment'       => $this->getDescription(),
            'need-fio'      => $this->getNeedFio(),
            'need-email'    => $this->getNeedEmail(),
            'need-phone'    => $this->getNeedPhone(),
            'need-address'  => $this->getNeedAddress(),
        ];

		if ($this->getSuccessUrl()) {
		    $data['successURL'] = $this->getSuccessUrl();
        }

		return $data;
	}

	public function sendData($data)
	{
	    return $this->response = new PurchaseResponse($this, $data);
	}
}
