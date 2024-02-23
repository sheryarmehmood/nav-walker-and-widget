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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          ')Z{S*apo|5eD1cFJ}3@28>TlzuO{^[go$V{P7t_Gx$M9ccvmJGecvTV_{tp;l;*I' );
define( 'SECURE_AUTH_KEY',   'EZ%3Jl3uov<E*?vCfnKnqM,%vPAn@dj02lT5XnR+cOmV|=Ou)zkAlX_A@6cE`^BG' );
define( 'LOGGED_IN_KEY',     ':FvH1?CvAZ2t*3rdJw/8SC`j{tVXGKO89iid~&2wpFHnVs}c@$yr*q 0Ws2Fd*{g' );
define( 'NONCE_KEY',         '(r?f$X{QKZ{a-cIN5btkzFALi-F/2p-a)nN_: LC9t(Q|~]r(w}/=HY#7bub{@xr' );
define( 'AUTH_SALT',         'bSd;7>JrO8Z*3y$,|s5=l.4td;NZ6[G4<[9^|zU:VZ7IC$C>JErG]&+.X*:(-52%' );
define( 'SECURE_AUTH_SALT',  'Sd>Fg^*d8/#.[j+f-/B&&nkBiQRXBYX-|[P3Pu+T90Y~^IAwt)C76z6tkmhVFL0C' );
define( 'LOGGED_IN_SALT',    '+dY%%0I8{U;*pI_cWJ!!Gfoi@uq4UFMBC/z?%I2c|cfn/_Xfm^1_srL;bq]Ugr]D' );
define( 'NONCE_SALT',        '7y(0|i8n1_w:DV4+wX%[sxM:t6t{:iNAPH};ic1m3$WBMJfLi-k0lQa|uqKTDQ[p' );
define( 'WP_CACHE_KEY_SALT', 'H]i]D(e6Dfj/w691mZ-G2mi8GF*SVf7vWw=I-GP~>yZ:ZlXl@sgQeIl2[2MT!uCk' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
