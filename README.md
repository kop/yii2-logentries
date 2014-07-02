Yii2 Logentries
===============

[Yii2 Logentries (Y2LE)](http://kop.github.io/yii2-logentries) adds a `LogentriesTarget` class that sends Yii2 log
messages to the [Logentries log management service](https://logentries.com/).

[![Latest Stable Version](https://poser.pugx.org/kop/yii2-logentries/v/stable.svg)](https://packagist.org/packages/kop/yii2-logentries)
[![Code Climate](https://codeclimate.com/github/kop/yii2-logentries.png)](https://codeclimate.com/github/kop/yii2-logentries)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kop/yii2-logentries/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kop/yii2-logentries/?branch=master)
[![Version Eye](https://www.versioneye.com/php/kop:yii2-logentries/badge.svg)](https://www.versioneye.com/php/kop:yii2-logentries)
[![License](https://poser.pugx.org/kop/yii2-logentries/license.svg)](https://packagist.org/packages/kop/yii2-logentries)

## Requirements

- Yii 2.0 (dev-master)
- PHP 5.4

> Note:
This extension mandatorily requires [Yii Framework 2](https://github.com/yiisoft/yii2).
The framework is under active development and the first stable release of Yii 2 is expected in early 2014.


## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

``` php composer.phar require kop/yii2-logentries "dev-master" ```

or add

``` "kop/yii2-logentries": "dev-master"```

to the `require` section of your `composer.json` file.


## Usage

Add Logentries target to your log component config:

```php
return [
    ...
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                'logentries' => [
                    'class' => 'kop\y2le\LogentriesTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'categories' => ['application'],
                    'logToken' => '<<< YOUR KEY HERE >>>',
                ],
            ],
        ],
    ],
    ...
];
```


## Configuration

The log destination is specified via `$logToken` property. Please refer to
[Logentries docs for PHP applications](https://logentries.com/doc/php/) for more details.


## Report

- Report any issues [on the GitHub](https://github.com/kop/yii2-logentries/issues).


## License

**yii2-logentries** is released under the MIT License. See the bundled `LICENSE.md` for details.


## Resources

- [Project Page](http://kop.github.io/yii2-logentries)
- [Packagist Package](https://packagist.org/packages/kop/yii2-logentries)
- [Source Code](https://github.com/kop/yii2-logentries)