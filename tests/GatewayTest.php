<?php

namespace Omnipay\YooMoney\Tests;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\YooMoney\Gateway;
use Omnipay\YooMoney\Message\CompletePurchaseRequest;
use Omnipay\YooMoney\Message\PurchaseRequest;

class GatewayTest extends GatewayTestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase([
            'amount' => '0.1',
            'currency' => 'USD',
            'transactionId' => 213,
            'description' => 'Purchase: 123',
        ]);

        $this->assertInstanceOf(PurchaseRequest::class, $request);
        $this->assertSame('0.10', $request->getAmount());
    }

    public function testCompletePurchase()
    {
        $request = $this->gateway->completePurchase();

        $this->assertInstanceOf(CompletePurchaseRequest::class, $request);
    }

}
