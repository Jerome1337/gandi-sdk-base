# Gandi SDK

PHP SDK for Gandi API.

[![Latest Stable Version](https://poser.pugx.org/jerome1337/gandi-sdk/v/stable?format=flat-square)](https://packagist.org/packages/jerome1337/gandi-sdk)
[![Latest Unstable Version](https://poser.pugx.org/jerome1337/gandi-sdk/v/unstable?format=flat-square)](https://packagist.org/packages/jerome1337/gandi-sdk)
[![License](https://poser.pugx.org/jerome1337/gandi-sdk/license?format=flat-square)](https://packagist.org/packages/jerome1337/gandi-sdk)
[![Total Downloads](https://poser.pugx.org/jerome1337/gandi-sdk/downloads?format=flat-square)](https://packagist.org/packages/jerome1337/gandi-sdk)

## Prerequisites

The project requires:

* PHP 7.0+

## Installation

Require this library with Composer:

``` bash
composer require Jerome1337/gandi-sdk
```

With Symfony:

* Register the bundle

```
new Jerome1337\Gandi\Bridge\Symfony\Bundle\Jerome1337GandiBundle()
```

* In your `config.yml`

```
jerome1337_gandi:
    # Change to https://rpc.gandi.net/xmlrpc/ in prod
    server_url: https://rpc.ote.gandi.net/xmlrpc/
    api_key: 'youApiKey'
```

## Usage

Then use it as is
