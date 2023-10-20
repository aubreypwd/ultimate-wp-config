# `aubreypwd/ultimate-wp-config`

A PHP CONSTANT controled wp-config enhancement for WordPress local development.

You can easily turn things on and off (and configure them) using `wp config set|delete` or by editing CONSTANTS directly in your `wp-config.php` file.

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

- Use `define( 'HOST' )` to set your host to something other than what's defined in the database (does not work on multisite).

---------------------------------

### LocalWP & WP-CLI

WP CLI w/ LocalWP can be confusing, and sometimes not work at all. This recommends you setup `DB_HOST` with a Socket file. We don't recommend you copy/paste the socket value directly into the `DB_HOST`, instead run `wp` in a Site Shell to find out what to do.

The way this does it ensures if you clone, blueprint, or import a site you don't accidentally connect to the original site's database. I also recommend you exclude `*.sock` from being exported in your Preferences.

Just run `wp` to find out what to do.

To ignore this recommendation:

```php
define( 'LOCALWP_ALLOW_EXTERNAL_CLI', true );
```

```bash
wp config set LOCALWP_ALLOW_EXTERNAL_CLI true
```

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

### AffiliateWP License

This is specific to use with [AffiliateWP](https://affiliatewp.com), a plugin I work on.

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
define( 'LOCALWP_LIVE', true ); // $> wp config set LOCALWP_LIVE true --raw
define( 'LOCALWP_LIVE_USERNAME', 'username' ); // $> wp config set LOCALWP_LIVE_USERNAME 'username'
define( 'LOCALWP_LIVE_PASSWORD', 'password' ); // $> wp config set LOCALWP_LIVE_PASSWORD 'password'
define( 'LOCALWP_LIVE_HOST', 'subdomain.localsite.io' ); // $> wp config set LOCALWP_LIVE_HOST 'example.com'
```

Use `wp config set LOCALWP_LIVE false --raw` to turn off live links mode.

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

```bash
wp config set MAIL true --raw
```
