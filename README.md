# PHP Helper

[![Tests](https://github.com/shimomo/php-helper/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/shimomo/php-helper/actions/workflows/tests.yml)
[![PHP Version Require](https://poser.pugx.org/shimomo/helper/require/php)](https://packagist.org/packages/shimomo/helper)
[![Latest Stable Version](https://poser.pugx.org/shimomo/helper/v/stable)](https://packagist.org/packages/shimomo/helper)
[![Latest Unstable Version](https://poser.pugx.org/shimomo/helper/v/unstable)](https://packagist.org/packages/shimomo/helper)
[![License](https://poser.pugx.org/shimomo/helper/license)](https://packagist.org/packages/shimomo/helper)

## Installation
```
composer require shimomo/helper
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Shimomo\Helper\Arr;

$items = [
    ['number' => 1, 'name' => 'ninjaA'],
    ['number' => 2, 'name' => 'ninjaB'],
    ['number' => 3, 'name' => 'ninjaC'],
];

Arr::firstWhere($items, 'number', 1);
Arr::firstWhereKeys($items, ['number', 'name'], 1);
Arr::flatten($items);
Arr::where($items, 'number', 1);
Arr::whereIn($items, 'number', [1]);
Arr::whereNotIn($items, 'number', [1]);
```

## License
The PHP Helper is open source software licensed under the [MIT license](LICENSE).
