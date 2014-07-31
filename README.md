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

$serviceContainer = \Laraiba\Resource\Setup\DefaultService::getServiceContainer();
$ayatRepository   = $serviceContainer->get('laraiba.ayat_repository');

$ayat = $ayatRepository->findOneById('1:7');

echo $ayat->getText();
```

```
صِرَٰطَ ٱلَّذِينَ أَنْعَمْتَ عَلَيْهِمْ غَيْرِ ٱلْمَغْضُوبِ عَلَيْهِمْ وَلَا ٱلضَّآلِّينَ
```

#### 2. Show surat

```php
require_once __DIR__ . '/vendor/autoload.php';

$serviceContainer = \Laraiba\Resource\Setup\DefaultService::getServiceContainer();
$suratRepository  = $serviceContainer->get('laraiba.surat_repository');

$surat = $suratRepository->findOneBySuratNumber(114);

foreach ($surat->getAyatList() as $ayat) {
    echo $ayat->getAyatNumber() . ') ' . $ayat->getText() . "\n";
}
```

```
1) قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ
2) مَلِكِ ٱلنَّاسِ
3) إِلَٰهِ ٱلنَّاسِ
4) مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ
5) ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ
6) مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ
```

#### 3. Show translation

Use composer to include a translation to your project:
```sh
php composer.phar require laraiba/translation-bahasa:*
```

```php
require_once __DIR__ . '/vendor/autoload.php';

$serviceContainer = \Laraiba\Resource\Setup\DefaultService::getServiceContainer();
$suratRepository  = $serviceContainer->get('laraiba.surat_repository');

$surat = $suratRepository->findOneBySuratNumber(1);

$translationManager = $serviceContainer->get('laraiba.translation_manager');
$translationManager->addTranslation(new \Laraiba\Translation\Bahasa\IndonesianMinistryTranslation());

foreach ($surat->getAyatList() as $ayat) {
    echo $ayat->getAyatNumber() . ') ' . $ayat->getText() . "\n";

    $translatedAyat = $translationManager->translate($ayat);
    echo $translatedAyat->getAyatNumber() . ') ' . $translatedAyat->getText() . "\n";
}
```

```
1) بِسْمِ ٱللَّهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
1) Dengan menyebut nama Allah Yang Maha Pemurah lagi Maha Penyayang.
2) ٱلْحَمْدُ لِلَّهِ رَبِّ ٱلْعَٰلَمِينَ
2) Segala puji bagi Allah, Tuhan semesta alam.
3) ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
3) Maha Pemurah lagi Maha Penyayang.
4) مَٰلِكِ يَوْمِ ٱلدِّينِ
4) Yang menguasai di Hari Pembalasan.
5) إِيَّاكَ نَعْبُدُ وَإِيَّاكَ نَسْتَعِينُ
5) Hanya Engkaulah yang kami sembah, dan hanya kepada Engkaulah kami meminta pertolongan.
6) ٱهْدِنَا ٱلصِّرَٰطَ ٱلْمُسْتَقِيمَ
6) Tunjukilah kami jalan yang lurus,
7) صِرَٰطَ ٱلَّذِينَ أَنْعَمْتَ عَلَيْهِمْ غَيْرِ ٱلْمَغْضُوبِ عَلَيْهِمْ وَلَا ٱلضَّآلِّينَ
7) (yaitu) Jalan orang-orang yang telah Engkau beri nikmat kepada mereka; bukan (jalan) mereka yang dimurkai dan bukan (pula jalan) mereka yang sesat.
```


Services
--------

Service                     | Interface                                                  |
------------------------    | ---------------------------------------------------------- |
laraiba.ayat_repository     | Laraiba\Resource\Ayat\Repository\AyatRepositoryInterface   |
laraiba.surat_repository    | Laraiba\Resource\Surat\Repository\SuratRepositoryInterface |
laraiba.translation_manager | Laraiba\Resource\Translation\TranslationManagerInterface   |

```php
require_once __DIR__ . '/vendor/autoload.php';

$serviceContainer    = \Laraiba\Resource\Setup\DefaultService::getServiceContainer();

$ayatRepository      = $serviceContainer->get('laraiba.ayat_repository');
$suratRepository     = $serviceContainer->get('laraiba.surat_repository');
$translationManager  = $serviceContainer->get('laraiba.translation_manager');
```


