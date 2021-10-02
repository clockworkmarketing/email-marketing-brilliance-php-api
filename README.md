# A simple PHP Wrapper around the Email Marketing Brilliance Dashboard 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/clockworkmarketing/email-marketing-brilliance-php-api.svg?style=flat-square)](https://packagist.org/packages/clockworkmarketing/email-marketing-brilliance-php-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/clockworkmarketing/email-marketing-brilliance-php-api/run-tests?label=tests)](https://github.com/clockworkmarketing/email-marketing-brilliance-php-api/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/clockworkmarketing/email-marketing-brilliance-php-api.svg?style=flat-square)](https://packagist.org/packages/clockworkmarketing/email-marketing-brilliance-php-api)


This is basic PHP wrapper around the Email Brilliance Marketing API - [(https://app.emailmarketingbrilliance.co.uk/help/api_integration)](https://app.emailmarketingbrilliance.co.uk/help/api_integration)

## Installation

You can install the package via composer:

```bash
composer require clockworkmarketing/email-marketing-brilliance-php-api
```

## API Keys

The first step to getting started with the API is to generate API keys. Admin rights are required to perform this action within the [account settings screen](https://app.emailmarketingbrilliance.co.uk/help/account_settings). Once API keys have been generated, HTTP GET and POST requests can be made to all API endpoints.

## Usage

``` php
<?php

use ClockworkMarketing\EmailMarketingBrilliance\EmailMarketingBrilliance;

$response = $emb = EmailMarketingBrilliance::setAuthDetails('API_ID', 'API_KEY')
    ->call(
        'GET',
        '/users/details', 
        ['email_address'=>'example@example.com']
    );

// OR // 

$emb = new EmailMarketingBrilliance('API_ID', 'API_KEY');

$response = $emb->call(
    'GET',
    '/users/details', 
    ['email_address'=>'example@example.com']
);



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
