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
define('DB_NAME', 'learningviolin');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Fb0N8EhnQ[JKt[1RQwBkdsV}`|Fdz ?C(b[fa~:`KgGQ)6r]&XsslmE.OFJxQz_H');
define('SECURE_AUTH_KEY',  '~Ij&IA.>bnCXhC@t^nV>r8,Fshyg:($^k]*U/^mKe6+MsXloJy3j=xrad!*,BYuh');
define('LOGGED_IN_KEY',    'r) 8nRL@|;A>#L*8KM!hE7y1kzb>1|>8tC^<[:K5p#=<*Q]*&X~v_k2sCU[h;7 T');
define('NONCE_KEY',        'Q)e>VOt$@L>i==OGM!qoDjN7vy,[^,K>kdkKDiZP85IP6326ju^k<1q;xA?dhob_');
define('AUTH_SALT',        'IQvSZf[}Q+;5nu`B8J?|8&J+D$[TAxSAX,nxvo{k6z|LoZHcSe={%h1Ph+Wmhfp$');
define('SECURE_AUTH_SALT', 'y5_[jn<iei}hXBc^Q|+nJ:2fCu=O6$?g,)>lMc7+b3:PY5HuQG]=d^_1U?sG&APn');
define('LOGGED_IN_SALT',   'DboD@9c{w}_|+{T9qt= kd.k@?H|[UZUp3C)user_qYk!hhxRC!(Vgvb?#x-[ONx');
define('NONCE_SALT',       'xfCrvHYB5emYy0#*{QU]xb_e+=1zVOp,v!f/]1UbZdx.W>9(5M^j8AWy6u-]g->U');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
