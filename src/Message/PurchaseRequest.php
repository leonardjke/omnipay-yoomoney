<?php

namespace Omnipay\YooMoney\Message;

class PurchaseRequest extends AbstractRequest
{

	public function getData()
	{
		$this->validate('receiver', 'quickpay_form', 'payment_type', 'amount', 'description', 'transactionId');

		$data = [
            'receiver'      => '',
            'quickpay-form' => $this->getQuickpayForm(),
            'targets'       => $this->getDescription(),
            'paymentType'   => $this->getPaymentType(),
            'sum'           => $this->getAmount(),
            'label'         => $this->getTransactionId(),
            'comment'       => $this->getSuccessUrl(),
            'successURL'    => $this->getParameter('success_url'),
            'need-fio'      => $this->getParameter('need_fio') ? 'true' : 'false',
            'need-email'    => $this->getParameter('need_email') ? 'true' : 'false',
            'need-phone'    => $this->getParameter('need_phone') ? 'true' : 'false',
            'need-address'  => $this->getParameter('need_address') ? 'true' : 'false',
        ];

		return $data;
	}

	public function sendData($data)
	{
	    return $this->response = new PurchaseResponse($this, $data);
	}
}
