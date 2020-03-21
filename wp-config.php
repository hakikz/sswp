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
define( 'DB_NAME', 'sswp' );

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
define( 'AUTH_KEY',         'Lp+lF,y2L?9S6pjWdU]0S*`2n~Li^52//9><r(/SfGWt^3TbAX8;W+[5Z$i6(NIw' );
define( 'SECURE_AUTH_KEY',  'QKY;V1lJ:@!>mPu/`u[5x-Iv>-j`[|HY`0:h:F :fvco3yC)lIKv;U.L+Fo#@eRQ' );
define( 'LOGGED_IN_KEY',    '.t&d-i&$&xY>Z]>a#V@?)w5?>]iO3Glekn6v|*?2=v>Vvd*Pi5SsQKCkd<UOvD=m' );
define( 'NONCE_KEY',        '*8Qj;:oHPd:^eDZZVJQ8Jqo^wpNBADX s}:cxU<LpsEw#LTsuY2%kQOLi#h8lr4i' );
define( 'AUTH_SALT',        'jw7P,KdnX?#8Y_>6Oc9rPIR7X22[gDc3lXf69mxk-yvd $YExQbBfFi+oMsP@OMP' );
define( 'SECURE_AUTH_SALT', ']&m9D-O:=:iN4]@K{OlV@:Ow_Xytn.QyPEZb_M/ylqB}cLM883Oz,`M1K#O5POY_' );
define( 'LOGGED_IN_SALT',   'YM?Cc:y?O%#_0s)o?^L6$~r3kl<S mb~U[`S|^+*;1Bnf_,mJGK][#z#jAwfu=U;' );
define( 'NONCE_SALT',       '~^p5 Y3T8~|J{s!MRp^7L@)kuFKlahGi}F.@Jur0{|hT#:`@w&;Emuy{~(g$;>-_' );

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
