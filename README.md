[![Build Status](https://travis-ci.org/yowcow/php-mime-base64-urlsafe.svg?branch=master)](https://travis-ci.org/yowcow/php-mime-base64-urlsafe)

NAME
----

MIME::Base64URLSafe - URL-safe Base64 Encoder/Decoder

DESCRIPTION
-----------

PHP implementation of Perl module [MIME::Base64::URLSafe](https://metacpan.org/pod/MIME::Base64::URLSafe).

SYNOPSIS
--------

### Encoding

~~~php
use \MIME\Base64URLSafe;

$output = Base64URLSafe::urlsafe_b64encode('Original Message');
// "T3JpZ2luYWwgTWVzc2FnZQ"
~~~

### Decoding

~~~php
use \MIME\Base64URLSafe;

$input = Base64URLSafe::urlsafe_b64decode('T3JpZ2luYWwgTWVzc2FnZQ');
// "Original Message"
~~~

FUNCTIONS
---------

### urlsafe_b64encode($original_string)

Encode a string into base64 string.

### urlsafe_b64decode($b64_string)

Decode a base64 string into string.

EXAMPLES
--------

### Deflate XML into query string:

```php
$xml = '<hello>world</hello>';

$query_safe_data = Base64URLSafe::urlsafe_b64encode(gzdeflate($xml));

echo http_build_query(array('data' => $query_safe_data), '&amp;');
```

### Inflate XML from query string:

```php
$query_safe_data = $_GET['data'];

$xml = gzinflate(Base64URLSafe::urlsafe_b64decode($query_safe_data));

echo $xml;
```
