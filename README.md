# Morse: the PHP detective-inspector

Morse is a feature detection library for PHP code that needs to run in multiple different environments.

[![Build Status](https://travis-ci.org/drewm/morse-php.svg?branch=master)](https://travis-ci.org/drewm/morse-php)

Supports PHP 5.3 and up.

## Why?

Writing PHP that works in unknown (some sometimes hostile) environments is hard. You don't always know what functionality is available to you, so you have to test for it. Morse is a library to encapsulate those tests.

Most tests are really simple - just a `function_exists()` or similar - but you can often end up needing to repeat that test over and over across your codebase. Morse centralises those tests, providing reusability and consistancy. 

Some tests aren't so simple, perhaps due to _that one weird PHP bug_ or unusual hosting configurations or whatever. You have to do a weird dance to check if something is _really_ going to work. Morse takes care of that, and keeps the weird dancing out of your application code, safe from the next developer who thinks it's dumb and rips it out.

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

Features that may be available in either newer class support or older function support can return a value of `Morse::CLASS_SUPPORT` or `Morse::FUNCTION_SUPPORT`, both of which are truthy.

So this works:

```php
if (Morse::featureExists('file/finfo')) {
	...
}
```

but equally:

```php
switch(Morse::featureExists('file/finfo')) {
	case Morse::CLASS_SUPPORT: 
		$finfo = new finfo(...);
		break;

	case Morse::FUNCTION_SUPPORT:
		$finfo = finfo_open(...);
		break;

	default:
		die('No finfo support!');
		break;
}
```

If class support is found, this returns regardless of function support.


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

- cache
	- apc
	- memcache
	- memcached
	- opcache
- db
	- mysqli
	- pdo
	- pdo-mysql
	- pdo-sqlite
- file
	- finfo
	- zip
- http
	- curl
	- filter
	- sockets
- image
	- gd
	- imagick
- number
	- bigint
- string
	- json
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

If a feature can exist in both class and function form, return `\DrewM\Morse\Morse::CLASS_SUPPORT` or `\DrewM\Morse\Morse::FUNCTION_SUPPORT` as your truthy value. Check for classes first.

Feature classes should be big concepts (image, string, database) and the tests themselves should be specific features.

Please write a corresponding PHPUnit test for the feature you're adding. Note that you can't rely on the environment, so just test that the detection works and returns a sane value.