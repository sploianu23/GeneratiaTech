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
define( 'AUTH_KEY',          'WW2bp*xz7L$o2_zy{&yE_Kmh(+@B#M]n84tL2PMRfIUXaf8In-jcju@s^Xuf)Ds1' );
define( 'SECURE_AUTH_KEY',   'D0{$O;E=1x)<5tHcFHdsJ%4:|<-iX;z,v?wj>x+Jb~DIx0#hvu!oft<844#SOTjX' );
define( 'LOGGED_IN_KEY',     'A_Mlj^?m`Wl9!2|il&4Tfa*DWO6HXD);+`,R;J]%J^B+?Lqe*oN3vnSRJ=m=n[$N' );
define( 'NONCE_KEY',         '1==l{beE@b$?# =hw`+fmT!y)K~*MDCW7&bnN1ZLgt_C?ZZm,RocRzZ>1K]a:KS*' );
define( 'AUTH_SALT',         ')WqjRDLErdc:fK}l%:ii:=@3 o/K?hiB(^r<L%GMg-4}WXdl4IWtK!Iz)s[wcq0q' );
define( 'SECURE_AUTH_SALT',  'V9,a^x)i[fb{^(YCJ.Q4-yU9x?bR&Y#lV$mh^nv4^)!]75^N=.%q%<2R,7v+afXh' );
define( 'LOGGED_IN_SALT',    '?8|>AAN)]{KxEDe64Yh2L]{9xrxgY]5;p0VHHk]Dk:tq7{(7|{E,bkMI:m}%HcuV' );
define( 'NONCE_SALT',        '^Ow1yW~_]>G6oe+l~Om~NK_{CVfdo1qVVxnRtbgv%svkNeb>&wq?`.C,h{]BY%h5' );
define( 'WP_CACHE_KEY_SALT', 'yjwNIq_:gk7%}=2-VoSu2MU{x *>)(fw&{verH?#o5y.Y*`KufJn[{?BO3*m3,Sr' );


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
