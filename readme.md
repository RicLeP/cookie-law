## A simple package for adding cookie consent messages to legacy Laravel 4 websites

###Installation

`composer install riclep/cookie-law`

Add the Service Provider

`'RicLeP\CookieLaw\CookieLawServiceProvider',` to `config/app`

Include the Blade view in your template near the bottom.

`@include('cookie-law::dialog')`

If you want to edit anything then publish the config file

`php artisan config:publish riclep/cookie-law`

To override the wording create a language file in `app/lang/packages/{locale}/cookie-law/lang.php` with the contents:
```php
<?php

return array (
	'message' => '',
	'accept-button' => '',
);
```