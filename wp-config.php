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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jessicaw_wp' );

/** MySQL database username */
define( 'DB_USER', 'jessicaw_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'O3BzZX4Liswi' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NCxM-N{18(m|<X6>rW.h=0nX3;Q}N@EO;rVai`n5C|@Q.w!rZE6BMBP+#V/k ql#');
define('SECURE_AUTH_KEY',  '{Eb0QY,Joeta%5qG9.+/$*WV(6+?YYq}#t{WLB),!^@F %a`xmje>qs, &+~O652');
define('LOGGED_IN_KEY',    '-u],%vbFeLIN<|N!M|?^b]gw)=(X@?U3-g,/[LZb=z>tY?wPacRn-Dd:BrD.g?Rq');
define('NONCE_KEY',        'd}jhi;d,+bm-RMmYR)6+/LasJjv,=pG%oD/7SsWP/NI0ih5Z<$PM!=f#%Byw;oni');
define('AUTH_SALT',        'PZ`98eys-nP[+&fw^d0-C~H%z}Eel^&V+H)|e58GxAPfA<[)I!e#]|e`]!(G!BX ');
define('SECURE_AUTH_SALT', '6!j9WA1w6V=L5<|`#SlE&pA[|Qe&e-!$f3~T!lK(x#$F]3Vd?s&O$wANUPGO.65U');
define('LOGGED_IN_SALT',   'ZB%UFdYU55+[teTP+r[b(Jd{w|mdyfGMWd$[&GyRsh@Rfg,AAv-Z0%W8Jv+sR)-W');
define('NONCE_SALT',       'UoZ[6vn5=KXc}loXo~M}1Qr#~.RZKgO5CuausaNGJ0YB1+dbhc,u<=Pp^e.xc_><');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
