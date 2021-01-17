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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gaweb1_corp' );

/** MySQL database username */
define( 'DB_USER', 'gaweb1_sa' );

/** MySQL database password */
define( 'DB_PASSWORD', 'test1' );

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
define( 'AUTH_KEY',         ',ia@htvC(@[kw};5piKz!]& 8#*XYJYU&k9bDGy>Gk2XaO%hD<uZ`t,u.x.wGh:]' );
define( 'SECURE_AUTH_KEY',  '_y`ul44tZmz%+&I>n$QQi5:#G49W{O 7RQd 7cW`o0YC]e3)1}#sQHS4,9mY%Bdq' );
define( 'LOGGED_IN_KEY',    'Xe-|Bm2mWcAy_  OJ132S*n1R^4Uj LA[B+7h@4$}`AWc;114,J795.s;tSF:(NA' );
define( 'NONCE_KEY',        '=B:sXeU_[d5{[8h3xP.IR($0`JkA:R JoK.ezf}eMrv:E]r{tmGIs;%q7 VUORFX' );
define( 'AUTH_SALT',        '_PZ~9yhdGT-?{R1}7(;P^TZuI%gcH(XM]DPiQ7XE#z+a_*?:p(ijj+zb#o<b]yU>' );
define( 'SECURE_AUTH_SALT', '2[#D6z5&Zq=M4&+&P/kk`%!P.@x%QP{Z_s!pfr.xn$6j!>db_#}4(m2=<=%D Pv*' );
define( 'LOGGED_IN_SALT',   'n80oGzQ4%QF0ThW2,PoJp5J?qd+#^-io6)Z$g/vMt?g_ VrVt1<qeMf}7xI;12jW' );
define( 'NONCE_SALT',       'Ej$M$@_{,AD({}#XwgN*Vh:G;G&v*O>(;lhD*c[I&vy)&&?BA$.d|U-Mp~y5N#6f' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gaweb1_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
