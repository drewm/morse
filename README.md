# Morse: the PHP detective-inspector

Morse is a feature detection library for PHP code that needs to run in multiple different environments.

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

