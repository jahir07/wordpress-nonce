# WordPress Nonce

Definition: A nonce is a number. WordPress nonces are hash values made up of a combination of numbers and letters. This makes them more secure than regular nonces.

This Package that implements the WordPress Nonces functionality (wp_nonce_*()) in an object orientated way.

##Usage

add to your functions.php or plugins file

```php

// Autoload files using Composer autoload
require __DIR__ . '/vendor/autoload.php';

```

##Examples

###Create a nonce

```php

$WPNonce = new \Jim\WPNonce\Classes\WPNonce();
$nonceCreate = $WPNonce -> create_nonce();

```

For example:

```php
<a href='myplugin.php?do_something=some_action&_wpnonce=<?php echo $nonceCreate; ?>'>Do some action</a>
```

###Verify a nonce

```php

$WPNonce = new \Jim\WPNonce\Classes\WPNonce();
$nonceVerify = $WPNonce -> validate();

```
###Add a nonce to a URL

```php

$WPNonce = new \Jim\WPNonce\Classes\WPNonce();
$nonceUrl = $WPNonce -> nonce_url();

```
###Add a nonce to a form

```php

$WPNonce = new \Jim\WPNonce\Classes\WPNonce();
$nonceField = $WPNonce -> nonce_field();


```
###Nonce Field for echo

```php

$WPNonce = new \Jim\WPNonce\Classes\WPNonce();
$checkAdminRefer = $WPNonce -> nonce_field_echo();

```
###Validate nonce

```php

$WPNonce = new \Jim\WPNonce\Classes\WPNonce();
$validate_nonce = $WPNonce -> validate_nonce();

```
