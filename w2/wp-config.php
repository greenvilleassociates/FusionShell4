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
define( 'DB_NAME', 'fusionshell' );

/** MySQL database username */
define( 'DB_USER', 'fusionadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fusionadmin' );

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
define( 'AUTH_KEY',         'Na%d>~U2+[S>9%cd&_-M$u/R1RuIb8:PEDpYtI_YL;EUqKn%*UKm;9-g2,>DI9Uq' );
define( 'SECURE_AUTH_KEY',  '>z1Fa=t~h&[UPgIC,: R$dv>PnVqtR%#Q;`hc9Z3W]rc!PH:Q%/Cky#/!DZaM@RT' );
define( 'LOGGED_IN_KEY',    'KM{:{#Wm@3>aeQBHbf<v4U2>4 9mMA<tZWm8N-eQv@;8p{r9^GPhW2g;)C6:fduy' );
define( 'NONCE_KEY',        '[kWQc;b)6<7+>H1j~q-^rBl*4bpSD_1o_,a|/G~ItJoRzcC7>NSbe0eC943]FQw!' );
define( 'AUTH_SALT',        '^[)U9GZp)M~Yi>j%k21H#}Il!E!W[[Lo#TNa[ n 7O)qxd^T yQse^d;G[@pk5%4' );
define( 'SECURE_AUTH_SALT', '+I<7.NqvO8LV@vqvaalLT1dtvQ&d_Nv60-x<0@nEaKyScp,W^LBY[v)}9=i2/_!T' );
define( 'LOGGED_IN_SALT',   '<kpgBKgn,ngVHaAD $W0J.kfTbb)?xeXfpvl)}trN_v+Lz0D;=kH<,??kH+H=l-1' );
define( 'NONCE_SALT',       'kMX!)1qR<XuC^G{r<p<NPk{N7xq& **T#1F#[1;^P]LMh@G)QjS-,?::q.d{[mU!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fswp2_';

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
?>