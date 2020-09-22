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
define( 'DB_NAME', 'wordpress_five' );

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
define( 'AUTH_KEY',         'KvnXAhg (NKQ<(Gxc2*a1G+<%V9}rVfHg5J7o0z,{0iQAFybANx~{#&OL7d]$<Ha' );
define( 'SECURE_AUTH_KEY',  'ri^XsmH3KEoIn|l`wa/c++09iK;N!035uSJ]1B7NVs#pSs9f|IQ0D!5qzgPBO9G6' );
define( 'LOGGED_IN_KEY',    '|oNFk_ k0}iLPq<Ww~F4/3[S7Q,+:#{KNYSB%]aB%M&WUF]Wve_0Lu^| ryJLxP]' );
define( 'NONCE_KEY',        'fqTs4iVD}ENHWc-2)Vx7py_9%[DrkzDg&c9swZ)Z?Fe3J9-lj/k&GE`r]/Z?|Br/' );
define( 'AUTH_SALT',        'Fzc>9*k :z<84bxyj==qHLnd7ocy.@^1J2|z~m^ge~YE1{1t_`XMc[[CT*L`}f70' );
define( 'SECURE_AUTH_SALT', 'qy]CT^f=0! OnfudNO.i9/ wVP(IDP_/!|_J[C(XusdEun2~[!W(MU`_&* Ca#Gs' );
define( 'LOGGED_IN_SALT',   'i~^tA?>D(yB&mn]*`o/68FPysXEPY|`w1CSIcKJYvI)djt7(+4@+;je?(FPK4=#B' );
define( 'NONCE_SALT',       'yAZ9OqQgOv2J+R*.SD3z^VnsLI!sc7h$,RhquP)MEMRZjbjuYi8hKxlUhDOcP`9J' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_f_';

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
