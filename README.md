# Morse: the PHP detective-inspector

Morse is a feature detection library for PHP code that needs to run in multiple different environments.

[![Build Status](https://travis-ci.org/drewm/morse-php.svg?branch=master)](https://travis-ci.org/drewm/morse-php)

## How to

```php
use \DrewM\Morse\Morse;

if (Morse::featureExists('http/curl')) {
	// use curl
}else{
	// use sockets
}
```

## Testing if a feature exists

```php
Morse::featureExists('group/feature');
```

## Finding the first match in a list

```php
$best_match = Morse::getFirstAvailable(['image/gd', 'image/imagick']);
```

or

```php
$best_match = Morse::getFirstAvailable([
					'image/gd' => 'gd', 
					'image/imagick' => 'imagick'
				]);

switch($best_match) {

	case 'gd':
		...
		break;

	case 'imagick':
		...
		break;
}
```

## Features

Feature detection tests currently exist for the following:

- http
	- curl
	- sockets
	- filter
- image
	- gd
	- imagick
- db
	- pdo
	- pdo-mysql
	- pdo-sqlite
	- mysqli
- string
	- multibyte
	- transliterate

## Contributing feature tests

Feature tests are functions in the appropriate class that return true or false to indicate support for a feature.

Let's say you wanted to add a feature detection test for a database called Pongo. You would test for it with the feature identifier `db/pongo`, which would map to a function called `testPongo` in the `Feature/Db.php` class file.

Both half of the feature identifier are run through `ucwords()` to correct case. Dashes are changed to underscores. So `db/pongo-panda` would map to `Feature\Db::testPongo_Panda`.

```php
namespace DrewM\Morse\Feature;

class Db extends \DrewM\Morse\Feature
{
	public function testPongo_Panda()
	{
		// do whatever needs to be done to determine support
		// return true for support, false for no support;
		return true;
	}
}
```

Feature classes should be big concepts (image, string, database) and the tests themselves should be specific features.

Please write a corresponding PHPUnit test for the feature you're adding. Note that you can't rely on the environment, so just test that the detection works and returns a sane value.