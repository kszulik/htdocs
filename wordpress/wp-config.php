<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'salon' );

/** Database username */
define( 'DB_USER', 'salon' );

/** Database password */
define( 'DB_PASSWORD', 'ducati916' );

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
define( 'AUTH_KEY',         '7;kMM4$=|d&[d}QW%cx2,-V]y:C#=`Xk<I1u~> Fcndr}}&8V6Jq~MAl]ydiC|So' );
define( 'SECURE_AUTH_KEY',  'I9%B~ivV;naqZNX(_{6g2h*s@CmD-TE(mLfvRzy&AoJwC>?tEVIE[7{=AYNkN9L*' );
define( 'LOGGED_IN_KEY',    ')jP^(4D-/^!L=YoJ1Z-`* K$GB2]lh!}Q8jj%i16d7lV7e`D6/yBuY.a]%M?G6nP' );
define( 'NONCE_KEY',        'QyGf+b5;<HggNE9z>{={A^&h)fwJ(S@VplZ`m?gfSPpE$:KX$o|c*X.2pO=UYBF$' );
define( 'AUTH_SALT',        '$bwb5Bhhonq,0Ae/on]$fTP/!=}Xes|1$t3nQ=N+TSUcls.n9}9e_/F)2$CW.y~U' );
define( 'SECURE_AUTH_SALT', 'Yb.hO#ub6I^DRBc[Q,a 8]aM2?Pq~xC`(y6XN>$<)_vJsf>gggivi5@_WzIhF0]0' );
define( 'LOGGED_IN_SALT',   '>+nFQk#.qew~3;>sPv?th1tbt7Q#JS? S_1PHTy;GLcfS$c^%,~~rv:p/Dp7`p8a' );
define( 'NONCE_SALT',       'Ch_-4v=H]5Jbd6~rY<?3K.HiT^AS7bn&5Y&1!4H4u%}2V(g0[4E-3PDBX$e:kb%u' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
