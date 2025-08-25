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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


define( 'WP_HOME', 'https://solarex.mu/' );
define( 'WP_SITEURL', 'https://solarex.mu/' );


define( 'DB_NAME', 'sola_rexDB25' );

/** Database username */
define( 'DB_USER', 'usr_solrx25' );

/** Database password */
define( 'DB_PASSWORD', 'C67z6f0&p' );

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
define( 'AUTH_KEY',         '+~8K0s|A0lCg`dA0~9]rqAQh{t!Qx70&Efj4}W{D<L+H@o9q0 q7qow[1$& iGYH' );
define( 'SECURE_AUTH_KEY',  '_XP*S8v.JzE#d2YxU2r5asP%3hX^7t?9gl k#*(Q2:;iN`wx|PZhsKDWpcpEG%~h' );
define( 'LOGGED_IN_KEY',    '2[DZNTAN71uHymEj?_l>)VsY#.%W4~$B;+rGS,iIJ6gM/nu|tLM_zJR7kT*<+6*s' );
define( 'NONCE_KEY',        '9Ue]ip,U[Umc:gYII:u$s| O|rH9Fw7|]XfNk?&*.C*Rm#NN4>ol}9LyIcGz?-ca' );
define( 'AUTH_SALT',        'Wn>0mx$[6s|<Fih^Hx~TxDyZ^w[UQ5d<&{nV%l/j,n&vUq*A=pKxe:n^,kH $CTi' );
define( 'SECURE_AUTH_SALT', '+*rr?>liB,emxk02T |V8kt><gM zsyY>txXH~>jh-AP[#PMa_e:&P5|:]zx]f=#' );
define( 'LOGGED_IN_SALT',   ')*?WTuVEE%1m!sd6h7a5^O|x)!Q[Rg4HCw[8NUAZs8H*8Tkc5}X>,@/}X1JU;Zp{' );
define( 'NONCE_SALT',       'BK/ O$:Q# zm#|U`LT2D;Pt*[lYs9C}PePT2er&Qb6rQy.+@zGe4uzgBQrFj)=X:' );

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
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );


define( 'WP_AUTO_UPDATE_CORE', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
