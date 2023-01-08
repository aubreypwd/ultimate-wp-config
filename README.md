# `aubreypwd/ultimate-wp-config`

A PHP CONSTANT controled wp-config enhancement for WordPress (and various plugin) development in [LocalWP](https://localwp.com/).

_I mostly use this in my own local development environments._

You can easily turn things on and off (and configure them) using `wp config set|delete`.

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

- Use `define( 'HOST' )` to set your host to something other than `localhost`

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
wp config set LWP_DB_HOST_NO_SOCKET true --raw
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
define( 'LWP_LIVE', true ); // $> wp config set LWP_LIVE true --raw
define( 'LWP_LIVE_USERNAME', 'username' ); // $> wp config set LWP_LIVE_USERNAME 'username'
define( 'LWP_LIVE_PASSWORD', 'password' ); // $> wp config set LWP_LIVE_PASSWORD 'password'
define( 'LWP_LIVE_HOST', 'subdomain.localsite.io' ); // $> wp config set LWP_LIVE_HOST 'example.com'
```

Use `wp config set LWP_LIVE false --raw` to turn off live links mode.

--------------------------------------

### Jetpack protection

This is on by default, set `define( 'DISABLE_JETPACK_PROTECTION', true )` to bypass this protection.

When enabled, it should keep JetPack from connecting to wordpress.com or VIP services.

--------------------------------------

### Disable Email

Email is disabled by default, unless you set:

```php
define( 'MAIL', true );
```