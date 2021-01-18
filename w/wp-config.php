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
define( 'AUTH_KEY',         '+i8za3),>jBU1qkx5%P@-0p#EYAJgQCMNOtTn/IsN7)u).NiWq~=EiY^<ZU)6}&Z' );
define( 'SECURE_AUTH_KEY',  ']:aNf.`(*&7CGParr7bEt7X]+&=L}tNv)z#G.dVC#biwPU0OT/wM^c:ibAUK3RN}' );
define( 'LOGGED_IN_KEY',    '%P;K~+_{%GhbV@$(QCDsCpn+mJlrC9>N&c),vJJSVkfjP5-vPEg6|dfA4-!T8SR>' );
define( 'NONCE_KEY',        '2O9Nyf!o|e[;?/)mV.c+@`gR{hX`v4J;ssm}SB0.>ClU>eo|Z7[7^Dm%q-brBw!b' );
define( 'AUTH_SALT',        'NC:0(@|#pc6fEgfxWcq6H6zed }`0Sb`E%BM@~0D+}vNF2j)P2ChLNw:v8Hymi_)' );
define( 'SECURE_AUTH_SALT', 'd2z2oKlY]:w$qXV%.[@1wJ9IrMrnR!(Wv1i0.RkqjbrI]Oz-7~[=o:[K-<Rmb:&H' );
define( 'LOGGED_IN_SALT',   'mJe4}Z68R^wV%j[c?3F fia<b/&+>vG#4u}$Rt14+Wq^,#L_FxsyAAw*9^&,6>O&' );
define( 'NONCE_SALT',       'lx Uh^rl30q]ESUj[&Q/bXSn}}#sw3]P{(J4b;nZT==Rdv/>=s^+vk4Y0L(L~n$d' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fswp_';

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