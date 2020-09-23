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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vov' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',azfAH 59]Xf*0>$NTng=O|ZTZ4gRhfKg&H%TN|W$x:q*6,SzRGbh[GrRIL=P!kT' );
define( 'SECURE_AUTH_KEY',  '[1c.N13qqym,z}j1Eu+2!]wQ#BKtY;yC3(;<0qJykG* uX|^9/J/2~M%g 7wM6~;' );
define( 'LOGGED_IN_KEY',    '%DeJ~#H7Q7y>5=6l`*HDaeP=D5tMihZF0FGO20WqnDGv+*(uL:Y[&?X^L5TaRvlO' );
define( 'NONCE_KEY',        'WAaObh>n(IS}L~q.?$Jl9A&u]0Xm3bN&|G +UI@rNSNTR7)0~fPD,$ZrV:5Q$5s*' );
define( 'AUTH_SALT',        '-cMCZ{H$[) 0f2**h:u,_<UYd|903?`G51IMI=V6}+:CCFx-R5u~j?h5:I8B{G1T' );
define( 'SECURE_AUTH_SALT', '5l9N~5Rk,i0> qg;D:>jv&@FrjZj[OITqm~}tC75fSJ=jIHjOdth9?}3E?jkE_%[' );
define( 'LOGGED_IN_SALT',   'zDG_y?ZnQfA U?]}}Qyp3bz] wVs|0VnvPM[OVJd}mD6ET924vnB6Pl7Ko-di/Th' );
define( 'NONCE_SALT',       'Tm3O=7,>nIQ+_1p)|P>YQ$|]{)q HI]gIQ_O|m^JFiZch&a/)qi##KbI5mz[>A/l' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
