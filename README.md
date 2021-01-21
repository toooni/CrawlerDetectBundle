# CrawlerDetectBundle

[![Build Status](https://travis-ci.org/nicolasmure/CrawlerDetectBundle.svg?branch=master)](https://travis-ci.org/nicolasmure/CrawlerDetectBundle)
[![Coverage Status](https://coveralls.io/repos/github/nicolasmure/CrawlerDetectBundle/badge.svg?branch=master)](https://coveralls.io/github/nicolasmure/CrawlerDetectBundle?branch=master)

A Symfony bundle for the [Crawler-Detect](https://github.com/JayBizzle/Crawler-Detect "JayBizzle/Crawler-Detect")
library (detects bots/crawlers/spiders via the user agent).

## Table of contents

- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)

## Introduction

This Bundle integrates the [Crawler-Detect](https://github.com/JayBizzle/Crawler-Detect "JayBizzle/Crawler-Detect")
library into Symfony.
It is **recommended** to read the lib's documentation before continuing here.

The aim of this bundle is to expose the [`CrawlerDetect`](https://github.com/JayBizzle/Crawler-Detect/blob/master/src/CrawlerDetect.php "Jaybizzle\CrawlerDetect\CrawlerDetect")
class as a service (`crawler_detect`) to make it easier to use with Symfony
(dependency injection, usable from a controller, etc...).

## Installation

Download the bundle using composer :

```bash
$ composer require nmure/crawler-detect-bundle
```

then enable the bundle in your bundles.php:

```php
// config/bundles.php
return [
...
    Nmure\CrawlerDetectBundle\CrawlerDetectBundle::class => ['all' => true],
...
];

```

## Usage

The `crawler_detect` service is initialized with the data from
the Symfony's master request.

To use this service from a controller :

```php
use Nmure\CrawlerDetectBundle\CrawlerDetect\CrawlerDetect;

public function indexAction(CrawlerDetect $crawlerDetect)
{
    if ($crawlerDetect->isCrawler()) {
        // this request is from a crawler :)
    }

    // you can also specify an user agent if you don't want
    // to use the one of the master request or if the app
    // is accessed by the CLI :
    $ua = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
    if ($crawlerDetect->isCrawler($ua)) {
        // this user agent belongs to a crawler :)
    }
}
```

## Testing

```bash
$ docker run --rm -v `pwd`:/app phpunit/phpunit -c /app
```
