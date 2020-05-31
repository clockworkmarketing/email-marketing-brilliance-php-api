# :package_description

[![Latest Version on Packagist](https://img.shields.io/packagist/v/clockworkmarketing/email-marketing-brilliance-php-api.svg?style=flat-square)](https://packagist.org/packages/clockworkmarketing/email-marketing-brilliance-php-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/clockworkmarketing/email-marketing-brilliance-php-api/run-tests?label=tests)](https://github.com/clockworkmarketing/email-marketing-brilliance-php-api/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/clockworkmarketing/email-marketing-brilliance-php-api.svg?style=flat-square)](https://packagist.org/packages/clockworkmarketing/email-marketing-brilliance-php-api)


This is basic PHP wrapper around the Email Brilliance Marketing API - [(https://app.emailmarketingbrilliance.co.uk/help/api_integration)](https://app.emailmarketingbrilliance.co.uk/help/api_integration)

## Installation

You can install the package via composer:

```bash
composer require clockworkmarketing/email-marketing-brilliance-php-api
```

## Usage

``` php
<?php

use ClockworkMarketing\EmailMarketingBrilliance\EmailMarketingBrilliance;

require 'vendor/autoload.php';

$emb = EmailMarketingBrilliance::setAuthDetails('API_ID', 'API_KEY')->call('GET','/users/details', ['email_address'=>'example@example.com']);

// OR // 

$emb = new EmailMarketingBrilliance('API_ID', 'API_KEY');

$emb->call('GET','/users/details', ['email_address'=>'example@example.com']);

var_dump($emb);

```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email support@clock-work.co.uk instead of using the issue tracker.

## Credits

- [Craig Potter](https://github.com/CraigPotter)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
