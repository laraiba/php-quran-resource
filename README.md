PHP Quran Resource
==================

Al Quran Resource Component for PHP.

| Development | Master | Releases | Statistics |
| ----------- | ------ | -------- | ---------- |
| [![Build Status](https://travis-ci.org/laraiba/php-quran-resource.svg?branch=development)](https://travis-ci.org/laraiba/php-quran-resource) [![Code Coverage](https://scrutinizer-ci.com/g/laraiba/php-quran-resource/badges/coverage.png?b=development)](https://scrutinizer-ci.com/g/laraiba/php-quran-resource/?branch=development) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/laraiba/php-quran-resource/badges/quality-score.png?b=development)](https://scrutinizer-ci.com/g/laraiba/php-quran-resource/?branch=development) | [![Build Status](https://travis-ci.org/laraiba/php-quran-resource.svg?branch=master)](https://travis-ci.org/laraiba/php-quran-resource) | [![Latest Stable Version](https://poser.pugx.org/laraiba/resource/v/stable.png)](https://packagist.org/packages/laraiba/resource) | [![Total Downloads](https://poser.pugx.org/laraiba/resource/downloads.png)](https://packagist.org/packages/laraiba/resource) |


Installation
------------

Use [Composer](https://getcomposer.org) to install.

1. Open a terminal (command line interface) and point to your project directory.
2. [Download Composer](https://getcomposer.org/download/) by running `php -r "readfile('https://getcomposer.org/installer');" | php`
3. Run

```sh
php composer.phar require laraiba/resource:dev-master
```


Usage
-----

#### 1. Get and Show a single ayat


```php
require_once __DIR__ . '/vendor/autoload.php';

$ayatRepositoryFactory = new Laraiba\Resource\Ayat\AyatRepositoryFactory();
$ayatRepository = $ayatRepositoryFactory->createAyatRepository();

$ayat = $ayatRepository->findOneById('2:3');

echo $ayat->getText();
```

#### 2. Show surat

```php
require_once __DIR__ . '/vendor/autoload.php';

$ayatRepositoryFactory = new Laraiba\Resource\Ayat\AyatRepositoryFactory();
$ayatRepository = $ayatRepositoryFactory->createAyatRepository();

$suratRepositoryFactory = new Laraiba\Resource\Surat\SuratRepositoryFactory();
$ayatListInitializer = new Laraiba\Resource\Surat\Initializer\AyatListInitializer($ayatRepository);

$suratRepositoryFactory->addInitializer($ayatListInitializer);

$suratRepository = $suratRepositoryFactory->createSuratRepository();

$surat = $suratRepository->findOneBySuratNumber(114);

foreach ($surat->getAyatList() as $ayat) {
    echo $ayat->getAyatNumber() . ':' . $ayat->getText() . "\n";
}
```
