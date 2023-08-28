<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'onlinefood' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'J^b7XoIer;hZ~|4hw{S3LpF!Hqe|8|8NeT@OXEA$iR!bR2eR[+Q[ g)|(<O-cy-M' );
define( 'SECURE_AUTH_KEY',  'Hn?5HKbm84Q<Q|8fOCC]`T[A,U3b+M:ijVl<.P~1W8YB{cJ&n]o6j>0f/<<j[5UF' );
define( 'LOGGED_IN_KEY',    ':S*wgi=Pt46CSi&b7MPP Uvl=i4qa$Wxl?82C)0E;JV$O~8zk`d7jyf8n1EqQEM]' );
define( 'NONCE_KEY',        '/k=8!;j01-|eH`_} LXZi)<0eONZF[BdKEY#*wWha5J?p%ycq%[.<.*0grcIYO09' );
define( 'AUTH_SALT',        '[_<O?FS(Eh>BF9Eojcm?U0O~;tL*F7?!o&fSS=EZcJs%E[m2$,@oMb[x>LHVnwqF' );
define( 'SECURE_AUTH_SALT', 'mAa(,TR1,XAsj~?19GQvnVMJM&:d~,|`OA,BO#eM43OIu:TnTqqV!B ibA5WsF;2' );
define( 'LOGGED_IN_SALT',   'Y90dP/bZDPug$eVRx I.yiA7J=RSr(N]}Z&,.;Dp%oyR{O_?4=h$9]TfO&)mpp^?' );
define( 'NONCE_SALT',       '#UQ ra~cTtt2;kcruQAun11kIZ8-8(h9_=_hOw+-jKI-+YS)U)UJrc=hN.7}3gaT' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
