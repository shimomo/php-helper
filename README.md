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

var_dump(Arr::firstWhere($items, 'number', 1));
/*------------------------------
array(2) {
  ["number"]=>int(1)
  ["name"]=>string(6) "ninjaA"
}
------------------------------*/

var_dump(Arr::firstWhereKeys($items, ['number', 'name'], 1));
/*------------------------------
array(2) {
  ["number"]=>int(1)
  ["name"]=>string(6) "ninjaA"
}
------------------------------*/

var_dump(Arr::where($items, 'number', 1));
/*------------------------------
array(1) {
  [0]=>array(2) {
    ["number"]=>int(1)
    ["name"]=>string(6) "ninjaA"
  }
}
------------------------------*/

var_dump(Arr::whereIn($items, 'number', [1]));
/*------------------------------
array(1) {
  [0]=>array(2) {
    ["number"]=>int(1)
    ["name"]=>string(6) "ninjaA"
  }
}
------------------------------*/

var_dump(Arr::whereNotIn($items, 'number', [1]));
/*------------------------------
array(2) {
  [0]=>array(2) {
    ["number"]=>int(2)
    ["name"]=>string(6) "ninjaB"
  }
  [1]=>array(2) {
    ["number"]=>int(3)
    ["name"]=>string(6) "ninjaC"
  }
}
------------------------------*/
```

## License
The PHP Helper is open source software licensed under the [MIT license](LICENSE).
