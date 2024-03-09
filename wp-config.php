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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u108869289_zTHNI' );

/** Database username */
define( 'DB_USER', 'u108869289_jeBnU' );

/** Database password */
define( 'DB_PASSWORD', 'zeJupUfnFG' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'BC*:Nzl~d8B`,xZSS@Kg(=-cq`uN)O+KRwv,J]u{aZDT%q^+*Mh}DWb)XmD{mWbq' );
define( 'SECURE_AUTH_KEY',   '),G)H e`Qc)z V-3*QaWww2^bF.K[firEB$qV~ODwD)s?C3&IRX^REo9z5HLz eX' );
define( 'LOGGED_IN_KEY',     '-JC{)!T)n}v$cRF0R/fwsJzkpHEhIF;4vx96I<kT0k5H8,j#XB*EzhM!liOkFVf!' );
define( 'NONCE_KEY',         '+u;7^u6b`/~^Ipv+##(X]GS^)Pf`a)7~Y;cG6:18A[H;>W.W!!*R(Z_tO>j|/^-a' );
define( 'AUTH_SALT',         '_;4kMXw[Ks7+T4q,.4.AE#Bzm|EQg$r@3]5Iw(V3(*j]9r$Q*@/^e@N6,u)a?6QZ' );
define( 'SECURE_AUTH_SALT',  'qYl6o/CB ]:V;7y}M#G82TfbNaN76P1[T6[Gz%W<)Tv~<ofV .?DXvG#F^Li~LvJ' );
define( 'LOGGED_IN_SALT',    'YbCT_?Sai up@hgXf^#ttuV#/e%4t[HV/)ABBJ.XP@0bp^o.>f(`s[yd3=n0tl5B' );
define( 'NONCE_SALT',        'vRA%iVIgGa}|4LS.,%#sn&!!*.>i.uQ7fN-&;:BdvpV#tc`C !V$OJ;H@-@sGEJb' );
define( 'WP_CACHE_KEY_SALT', '2 +Ua2,;yDl2s^Zq(FRG 4=RRw?pgw`%%HWM[;15Ix2>Di8K2|c5YSp,gt5~f>Nq' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
