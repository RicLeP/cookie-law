## A simple package for adding cookie consent messages to legacy Laravel 4 websites

Shows a dialog with a message and button to accept cookies. The default name of the acceptance cookie is: `laravel_cookie_acceptance`. You are responsible for implementing logic based on their acceptance!

###Chacking acceptance with Blade

```pgp
@if (isset($_COOKIE[Config::get('cookie-law::cookie-law.cookie_name')]))
	// Cookie is accepted to do stuff here 
@endif
```

###Installation

`composer require riclep/cookie-law`

Add the Service Provider

`'RicLeP\CookieLaw\CookieLawServiceProvider',` to `config/app`

Include the Blade view in your template near the bottom.

`@include('cookie-law::dialog')`


If you want to edit anything then publish the config file

`php artisan config:publish riclep/cookie-law`

To create the cookies page copy the controller and view stubs from the package and adjust them to fit the site. You can then add the following line to the routes file: 

`Route::get(Config::get('cookie-law::cookie-law.cookie_url'), 'CookiesController@view');`

To override the wording create a language file in `app/lang/packages/{locale}/cookie-law/lang.php` with the contents:
```php
<?php

return array (
	'message' => '',
	'accept-button' => '',
	'reject-button' => '',
	'customise-button' => '',

	'details' => '',
	'categories' => array(
		'' => '', 
		'' => '', 
		//e.g. 'Analytics cookies' => ''
	)
);
```

###JavaScript and styling

This package comes with no default styling but uses BEM style classes.

```css
/* The container element */
.cookie-law {}

/* Class applied via JS when the accept button is hit - use this to hide the dialog */
.cookie-law--accepted {}


/* Inner element should you want to the container to span but fix the width of the contents */
.cookie-law__inner {}

/* Container for the message to be shown */
.cookie-law__message {}

/* The accept button styling */
.cookie-law__button {}
```