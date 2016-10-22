<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u994366972_agavy');

/** MySQL database username */
define('DB_USER', 'u994366972_ugyre');

/** MySQL database password */
define('DB_PASSWORD', 'umeHabuQeW');

/** MySQL hostname */
define('DB_HOST', 'mysql');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4jXHrZeL9VVKfvjB6vVU6pE11l8lPUlTyKg64ToypydIYiBV3n36ph3hGQxJANCZ');
define('SECURE_AUTH_KEY',  'YQXetI7maXmhhJ5FIxsB6tg19EOpmtpt5mHoSAvNt6idp6e5gT3QdJ95OyXC209p');
define('LOGGED_IN_KEY',    'nuLNP5DuiGg41Tf2H6XSlbZfDoB5WBAsEzU2kSq7LT65J8uuWneAxU13kB4frsjw');
define('NONCE_KEY',        '5ZmPDI590ip6WTH9ssuZE1xbAeSHKmW4vPFsXCTyEZVNLM6zYEUJjTQ5eSH9amvD');
define('AUTH_SALT',        'txsnAnRw1tcYOs0ShRizfbXVgZIMRV2rNQa6rTSsoBkU6LSIV2cbWYIPBLXq4lvd');
define('SECURE_AUTH_SALT', 'ptDksBZ4C4Bm9vjkbxxmRNz42CWXHUOdczh019zHjTqmdTsYMvVwwm6Ro2mCTlcl');
define('LOGGED_IN_SALT',   'gF2nmVvFkxYTBlNhDn7JvzqWZYvLf4wIOihwfD8SN3XjT8u6hsLe1nXUOgbO8U99');
define('NONCE_SALT',       'IUmY4q01cORK2sTTB5uFHEAK1cIzV6R1Z57C0lWpgssEjRFWaKeG84fleX6TgiJe');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'f6x0_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
