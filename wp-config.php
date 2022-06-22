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
define( 'DB_NAME', 'dev' );

// for ftp 
define('FS_METHOD','direct');

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
define( 'AUTH_KEY',         's:/waG^KwZ0*!ft05dfrOpWu[042(QhPV`{old`e`knC;*yc=``NLGFBZj%mbq3r' );
define( 'SECURE_AUTH_KEY',  'sV}T#y!_uxW=[LYK8c4Q|n9qLFotm>/RUZuPjE<Gg_9xRw=ST|Aw<ZF)h%(+1V2m' );
define( 'LOGGED_IN_KEY',    '?wO;9=&WznqZL)?.9KXLV>?9$iJGz|WHOJ~wO%Y|_H$xNyc2/QW-{>f/Rf)r3~2B' );
define( 'NONCE_KEY',        '+5N]m&[Ny_7QQynS+BMhldLe%d=ph;;[jfg`Q`Rg>bi={lvg? (?w+O{Q3J_Ipn$' );
define( 'AUTH_SALT',        '%M[|.VA26Ammy|UafIi>xd7Th=J/7OusVDvx% I~exufcQAomiiIjc>_2Z`w<dL/' );
define( 'SECURE_AUTH_SALT', 'O)q(Lo1wi_>dJ|T;Pj|(LQj6a<vd@5G^xy~#dT?VVRAv]Z#)|#H_$J4]{<Z>BP]+' );
define( 'LOGGED_IN_SALT',   '9on4Scwiku?#=VE yo0>k>03Xm1w[8ih;#x,!h_~8>cJ#S#3hc1I1e2skT]%waRX' );
define( 'NONCE_SALT',       '^jvJB3E87bx5wS7T_,cEuz S`aPcfDD1J(7QPc~}ybRZk:o-MUl;*Z)O.T8<fwh7' );

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
