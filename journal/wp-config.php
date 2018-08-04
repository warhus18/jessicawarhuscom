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
define('DB_NAME', 'jessicaw_wp874');

/** MySQL database username */
define('DB_USER', 'jessicaw_wp874');

/** MySQL database password */
define('DB_PASSWORD', '6S2-2Y(zp7');

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
define('AUTH_KEY',         'ehstrznfbw1g0s7r7qo1olq2dkhjeppyfsefcnyayj6y45ngwcjzvqsv2hjxklrw');
define('SECURE_AUTH_KEY',  'p1z5vrgjncup9g6xz6o2at6dd4vmf5y0vb0ryrdngcdfvu6qvrfawlymzuekyeur');
define('LOGGED_IN_KEY',    'du4yvddsebjwlaavpnhvhcloyn1beqzn7dkbq0mp6hy3jphhcjgavelrsy6jkova');
define('NONCE_KEY',        'uyiffryycrnfs9q6lvfle72akjmmhzblwpxjns6flbi6d1x4gjkyz4gcvczv99wq');
define('AUTH_SALT',        'qv2h0mw3tv6kbdkly267zziuwbgx0fyuqpl0zanphditaswbailkbh48fancuw0s');
define('SECURE_AUTH_SALT', 'hgb9k9gooqmh5blgeh9f4dgz1ccxleynb8lo8yxkaxkaw6wx4ihdv6nohvfwlhhs');
define('LOGGED_IN_SALT',   'zjlunrazqcovxmkdhad8karqrmers2qaihqvfabmkns4fitrfzxqdvo3h3cv2ply');
define('NONCE_SALT',       'cnra1hyzk8xhkvukrj5pzfli7ro2blviic5zsyfida5gktfpnnwzwwchgsqaxdhf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpfd_';

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
