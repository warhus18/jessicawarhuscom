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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define('DB_HOST', 'database');

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
define('AUTH_KEY',         ' X38P8Nrd<XhA=z@KE ;VuSdwLi>fYLHKXK$5n,nhO7a!NG7r-JnAbF%f~!Cxzs7');
define('SECURE_AUTH_KEY',  '9l9/bBa`8:i7ru(s 37<.5y>`Lg.vL~)`DyB|$^u.(=q[gSW&OJ-GUQbzzug3;,r');
define('LOGGED_IN_KEY',    '-*!B@RPRV 2d]&6+rw>/F@oN5E_WFu%E(h{<cn;K}DFCba6:DZ%sPp>Ym6*?/iAY');
define('NONCE_KEY',        '-cafz.i9W0dL Qjsz[<qZw7vfn(gZEy`*:?{f4NG*(tSY]y2H]K_t1|y}n1fn -^');
define('AUTH_SALT',        'DkUcDF5)={K<1uFA^iwf7/(oA1}E(2N2wl)8GeU+<gj@-c,74}R|Y.[5Uh=QN,1=');
define('SECURE_AUTH_SALT', 'z ^yg8]OtB5#[XE@+ESBn(i%$Q5MXF&8u(<vC]4K9+i<rXI=_isJiN>W>!QPO(g(');
define('LOGGED_IN_SALT',   'N:[tzc*/z0Ht%IPGhbEnz-W<yWsdV2R1QJ5o&}1I1^QK5uql_Aq{y SvDgT&UW]j');
define('NONCE_SALT',       '>+R>HZVLrv:6y#/gHJUPfcB!jB~A7a7lE_2*q@m`,,hxy[8-!lVT&C/WW#C03,|4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
