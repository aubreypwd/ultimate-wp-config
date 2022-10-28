# `aubreypwd/ultimate-wp-config`

A re-usable and flaggable config file for WordPress, mostly controlled by CONSTANTS you can change using `wp config set`.

_I mostly use this in my own local development environments._

---------------------------------

## Installation

```bash
composer require aubreypwd/ultimate-wp-config:dev-main@dev --dev
```

---------------------------------

## Usage

After installation, add:

```php
require_once  __DIR__ . '/vendor/autoload.php';
```

...after the `/* That's all, stop editing! Happy publishing. */` bit in `wp-config.php`
 but before `/** Absolute path to the WordPress directory. */`.

---------------------------------

### Core

- Use `define( 'LOCAL_HOST' )` to set your host to something other than `localhost`

---------------------------------

### LocalWP & WP-CLI

To make WP-CLI work better, we suggest using a configuration like this:

```php

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:/Users/aubreypwd/Library/Application Support/Local/run/QTHTAm9k8/mysql/mysqld.sock' );

```

A direct link to the `.sock` file on your system will make sure WP-CLI works better. When you run WP-CLI commands you might get an error to run a command to set this:

```bash
wp config set DB_HOST 'localhost:/path/to/file.sock'
```

If you don't want to go this route, simply use:

```bash
wp config set DB_HOST_NO_SOCKET true --raw
```

...to bypass.

---------------------------------

### Multisite

When `WP_ALLOW_MULTISITE` is set to `true`, multisite will automatically be enabled for a multisite DB.

```php
define( 'WP_ALLOW_MULTISITE', true|false );
```

```bash
wp config set WP_ALLOW_MULTISITE true|false --raw
```

---------------------------------

### AffilaiteWP License

To use the below easily, first you have to set your Pro and Personal licenses:

```bash
wp config set AFFWP_LICENSE_PRO key
wp config set AFFWP_LICENSE_PERSONAL key
```

Then you can use this more easily to switch while your keys are safely stored forever:

Set `AFFWP_LICENSE` to `pro` or `personal` will activate the set keys for AffiliateWP.

```php
define( 'AFFWP_LICENSE', 'pro|personal' );
```

```bash
wp config set AFFWP_LICENSE "pro|personal"
```

- Use `wp config delete AFFWP_LICENSE` to use your own.

---------------------------------

### LocalWP Development & Live Links

When not using multisite, you can force LocalWP to use the livelinks URL for your site by using:

```php
define( 'LIVE', true ); // $> wp config set LIVE true --raw
define( 'LIVE_USERNAME', 'username' ); // $> wp config set LIVE_USERNAME 'username'
define( 'LIVE_PASSWORD', 'password' ); // $> wp config set LIVE_PASSWORD 'password'
define( 'LIVE_HOST', 'subdomain.localsite.io' ); // $> wp config set LIVE_HOST 'example.com'
```

Use `wp config set LIVE false --raw` to turn off live links mode.