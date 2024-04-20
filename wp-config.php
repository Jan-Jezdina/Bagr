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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bagr_db' );

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
define( 'AUTH_KEY',         'A{(u<fd_~`^+[[q@EKepYY3t#RUNW:Ty+WTISn?g2;F5*6.-8nAlA}r2X]%H@pvy' );
define( 'SECURE_AUTH_KEY',  '+39ue&Zw3L,zDDmU2<<qK,!,Z Blb*x1D!.TK+U/j1m]D&T3e9ro8v}PvY<UCS[#' );
define( 'LOGGED_IN_KEY',    'WK^3.RF5r5<oC}D9W ;_IX[8W?`Xxq5c}cuHehDRFNeQm^9mY/R,01`%>X5Zq!X?' );
define( 'NONCE_KEY',        'VNWJIJfFrqAc8qa0><bS|7#H|,Le38:ZBkG@CC[;--m|684?}dSmE{.g?.a})DLv' );
define( 'AUTH_SALT',        'x/r12_-IqAwT1B~r&$Fp1ouO]Nx[Lzc39y qn9mH|FW8`p<*9iA|v0}A%,wKB~=X' );
define( 'SECURE_AUTH_SALT', 'a@jB>E22_#F`]}J>.L,&*uBaHM3Llsg7HhM&,3/@A ^LeXmT }8uip.k9CleZX=:' );
define( 'LOGGED_IN_SALT',   '](s;hndL~YG,kAy:byz3RoQ5HHu!ZKX829,)).$z&=O5IXX*a ly}fe^=9m@ 7~!' );
define( 'NONCE_SALT',       '$0$C3x,#V0++~+fK<ynZ,~Ofm&iN)u?*,Cbs!LGUOgutn_4z?/qs{CJ<i3a`^gg`' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
