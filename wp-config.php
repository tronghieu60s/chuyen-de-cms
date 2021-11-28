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
define( 'DB_NAME', 'wordpress_project' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '(1gByoOlI8AI :Duyf*4>3i)Y/8tgU^YYUHn)-&S;Dk5e5Q|W/_u.*4$ni&|DZ?d' );
define( 'SECURE_AUTH_KEY',  'nV8T:%,7o55s%*&o>Qvu*rJ)Lo$2s>X(Q^>X !vFrONV}a3]V3uZ*vFd&.%k;Sz ' );
define( 'LOGGED_IN_KEY',    'R K3A13]Bs8If`?=b$$>h>+8/wKYzvLFJ,}X6}5r_5E3t_;M,#Zn}eR3{wu}T>WN' );
define( 'NONCE_KEY',        'F!i`^Aq7=^40VC?@:hU[V;`.W-?[]OD2XbNQq<^d?8rlEW=)`M_yB1u?}r?%Xz8w' );
define( 'AUTH_SALT',        '1?_KV~0$ Tw]*es H- 7UvwwLNuls92syF!9vuF54ze[i2p({mK<|=Dm/.USAZY<' );
define( 'SECURE_AUTH_SALT', '7>qM;x bXVQ<+MW@Ma8N/T+mcfF<J7j;hT4$xy1`uTIcXM=eq9pj$%[Irirw/J32' );
define( 'LOGGED_IN_SALT',   '[jdrIGsd^}e#,O+{R(<67xJK5 ZAlNN9D?{Hi>zr&/MxGn@{MP>``&f:i[,>3ujO' );
define( 'NONCE_SALT',       'D%UCs?(x?4]|]aQ }(P@lxPk3U=Bz_G V$;4lf>Nsg`i!o@NNGu2_>`6Deb#G`4<' );

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
