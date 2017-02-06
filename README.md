yii2visjs
================
JQuery visjs Yii2 Extension
JQuery from: http://visjs.org
Version 2.1.1
License MIT

JQuery Documentation:
http://visjs.org/docs/index.html
Yii2 Extension by <philipp@frenzel.net>

[![Latest Stable Version](https://poser.pugx.org/philippfrenzel/yii2visjs/v/stable.svg)](https://packagist.org/packages/philippfrenzel/yii2visjs)
[![Build Status](https://travis-ci.org/philippfrenzel/yii2visjs.svg?branch=master)](https://travis-ci.org/philippfrenzel/yii2visjs)
[![Code Climate](https://codeclimate.com/github/philippfrenzel/yii2visjs.png)](https://codeclimate.com/github/philippfrenzel/yii2visjs)
[![Version Eye](https://www.versioneye.com/php/philippfrenzel:yii2visjs/badge.svg)](https://www.versioneye.com/php/philippfrenzel:yii2visjs)
[![License](https://poser.pugx.org/philippfrenzel/yii2visjs/license.svg)](https://packagist.org/packages/philippfrenzel/yii2visjs)

Installation
============
Package is although registered at packagist.org - so you can just add one line of code, to let it run!

add the following line to your composer.json require section:
```json
  "philippfrenzel/yii2visjs":"*",
```

And ensure, that you have the follwing plugin installed global:

> php composer.phar global require "fxp/composer-asset-plugin:~1.0"

Changelog
---------

06-02-2017 Move to latest 4.16.1 Version of VIS Library

29-11-2014 Updated to latest 2.2.3 Version of the library

Usage
=====

Quickstart Looks like this:

```php
  
  <?= \yii2visjs\yii2visjs::widget([
      'clientOptions' => [
        'editable' => false
      ],
      'dataSet' => [
        [
          'id' => 1,
          'start' => '2015-05-13T14:00:00',
          'end'=> '2015-05-14T01:00:00',
          'content' => 'Test A',
          'type' => 'range'
        ],
        [
          'id' => 2,
          'start' => '2015-05-15T15:00:00',
          'end'=> '2015-05-16T02:00:00',
          'content' => 'Test B',
          'type' => 'box'
        ]
      ],
    ]); ?>

```

Note, that this will only view the events without any detailed view or option to add a new event.. etc.

AJAX Usage
==========
If you wanna use ajax loader, this could look like this:

```php
TBD
```
