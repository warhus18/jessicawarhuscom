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
define('DB_NAME', 'jessicaw_wp605');

/** MySQL database username */
define('DB_USER', 'jessicaw_wp605');

/** MySQL database password */
define('DB_PASSWORD', '4]8pS7fn@1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '7iwtmm9xthla3xxmohdqnz4t6uscght4xmbjsil5wxkehkq4cqa3zbqauxk68xtl');
define('SECURE_AUTH_KEY',  'wfhzakix3dpqds2e16zsxqfub6e09msalgckmsv1osolmlctbmdjrhgddy0wcn1a');
define('LOGGED_IN_KEY',    'l60exixwwxs07l3uomudl6ycie673kszylx1pwq8334vz9yq1dsewgid1fmhlpen');
define('NONCE_KEY',        'a5r3rlhlhfa9ktxyhzvxiuffxcowlgpubongrgmymyrowa2tvpqy8yd6i9wpedjv');
define('AUTH_SALT',        'qk2o35jwqufyyy6cdlik8hxzzakhcf9d9puuangrb2bp3sju9vk1rygjklblze6e');
define('SECURE_AUTH_SALT', 'jynskxgexczrzygxezrjzg546jmhrrh4t5vvqfn1zhafqvlygwn7buv8mpwyv5vo');
define('LOGGED_IN_SALT',   'o6cidoxlbibfqqk3co8jqzf6kjinbh6ooe9qotohxvq8b6mrs4dlcqpcfnsgasen');
define('NONCE_SALT',       'n7bhn4bnxb2vbuuwceifnja6g0lv5axpq0hoahg3986yc9skb7cmirjd6rr8vm39');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp2v_';

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
