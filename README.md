# Omnipay: YooMoney

**YooMoney driver for Omnipay PHP payment library**

[![Latest Version on Packagist](https://img.shields.io/packagist/v/leonardjke/omnipay-yoomoney.svg?style=flat-square)](https://packagist.org/packages/leonardjke/omnipay-yoomoney)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/leonardjke/omnipay-yoomoney/master.svg?style=flat-square)](https://travis-ci.org/leonardjke/omnipay-yoomoney)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/leonardjke/omnipay-yoomoney.svg?style=flat-square)](https://scrutinizer-ci.com/g/leonardjke/omnipay-yoomoney/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/leonardjke/omnipay-yoomoney.svg?style=flat-square)](https://scrutinizer-ci.com/g/leonardjke/omnipay-yoomoney)
[![Total Downloads](https://img.shields.io/packagist/dt/leonardjke/omnipay-yoomoney.svg?style=flat-square)](https://packagist.org/packages/leonardjke/omnipay-yoomoney)


[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements yoomoney support for Omnipay.

## Install

Instal the gateway using require. Require the `league/omnipay` base package and this gateway.

``` bash
$ composer require league/omnipay leonardjke/omnipay-yoomoney
```

## Usage

``` php 
$gateway = Omnipay::create('YooMoney');

$gateway->setReceiver('410011122244470');
$gateway->setPaymentType('PC');
$gateway->setQuickpayForm('shop');
$gateway->setSuccessUrl('https://example.com');

$response = $gateway->purchase([
    'amount' => $payment->price,
    'transactionId' => $payment->id,
    'description' => 'Оплата товара',
    'currency' => 'RUB',
])->send();
```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/leonardjke/omnipay-yoomoney/issues),
or better yet, fork the library and submit a pull request.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email a@minedonate.ru instead of using the issue tracker.

## Credits

- [Leonard](https://github.com/leonardjke)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
