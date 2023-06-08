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
define( 'DB_NAME', 'furniture' );

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
define( 'AUTH_KEY',         '-)P2hS?8$1FSwn,)4./{NgjKSwGzYg6eRuh%0K|eDeDyuhf=5V3n<i-&MNk3r.Yh' );
define( 'SECURE_AUTH_KEY',  's${FTY?|5P(e<&&`.Qa(SY~O>~|qN*zh}NtLo;<W3Jdq]h^EY~S7iptkp$hax-}/' );
define( 'LOGGED_IN_KEY',    'y]3dmB!R!F}dh1)==c @lj2`SJj=wP`q<iILsqodlL@)-0|WOjN5AGD{}ml>P7Vv' );
define( 'NONCE_KEY',        'U!e:lBdX[mS {%5x5CfF1a2M&1;}%xEu-zTG<I,5:7&hn_ DClz9hsm&v)a=WkIH' );
define( 'AUTH_SALT',        '_<zt~`Svb:Qo,qDp?+m(ixOSGQ:eQ0YM2~f7)XD69L#PjF{uZQONVS51ZRB=pXKe' );
define( 'SECURE_AUTH_SALT', ')(T5IhtL7LD*ihF_NON~O@FT2O>vpLAh0$Y5,-B9Ty8HHg5^63~Yc :.J^M^YIk/' );
define( 'LOGGED_IN_SALT',   ';>xMq6^7s(RzJ^ve^>V$P^v{!)cf@0dXYq^LLltu]5zX ?AiBeNGRvS%g=`rp<~M' );
define( 'NONCE_SALT',       'vWUr)3F]S-4?e]m]eI(@ZSgm3v83<z-(>3EXs-%9Y,F;9Y{%G ax[peM]IYtdRiV' );

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
