<?php

namespace Omnipay\Yoomoney\Tests\Message;

use Omnipay\Tests\TestCase;
use Omnipay\Yoomoney\Message\PurchaseRequest;

class PurchaseRequestTest extends TestCase
{

    /**
     * @var PurchaseRequest
     */
    private $request;

    protected function setUp()
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->setSecret('secret-key');
        $this->request->setReceiver('receiver-account');
        $this->request->setQuickpayForm('shop');
        $this->request->setPaymentType('PC');
        $this->request->setNeedFio(true);
        $this->request->setNeedPhone(true);
        $this->request->setNeedAddress(true);
        $this->request->setNeedEmail(true);

        $this->request->setDescription('description');
        $this->request->setAmount('10');
        $this->request->setTransactionId(1);
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $expectedData = [
            'sum' => '10.00',
            'receiver' => 'receiver-account',
            'quickpay-form' => 'shop',
            'targets' => 'description',
            'paymentType' => 'PC',
            'label' => 1,
            'need-fio' => true,
            'need-email' => true,
            'need-phone' => true,
            'need-address' => true,
        ];

        $this->assertEquals($expectedData, $data);
    }

    public function testSendSuccess()
    {
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertEquals('https://yoomoney.ru/quickpay/confirm.xml', $response->getRedirectUrl());
        $this->assertEquals('GET', $response->getRedirectMethod());
    }
}
