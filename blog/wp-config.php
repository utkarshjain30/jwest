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
define('DB_NAME', 'jwest');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'hrhk');

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
define('AUTH_KEY',         'u$W+g-.^oUykd)PTX(:>PGbqL0[fprY]V:p$CT0y%VREhj,!+gc?I`L*x)!$}=>w');
define('SECURE_AUTH_KEY',  '`E/W.w6z?2Yu6z![ Xy_[Y=^_^lV#|)D{z[E:Ne@9ZRF<?u{ZLVZILq7*YM#C+t}');
define('LOGGED_IN_KEY',    'jV0Y.<7<d?-zK{{3Vsxy8&xwl3u$.IkQx`A^}=O9bnSd9^NFvn!L[JUqa||1f~][');
define('NONCE_KEY',        '4e({QUK)%/qo>Z4R<JH9h0s5<~#6n>Wju]<kRhg<jqDFbtad&}vawr,f@J`M=D^s');
define('AUTH_SALT',        'FfLHVbg>)]|<uKk(u4}??i0}j4x(Pw:yM=9CuCX;uo#/ $1Kw}QY@;QCg:W$;BXh');
define('SECURE_AUTH_SALT', '.xT/Kty-_(2;iNp9vVAe!Cq-:`9$MTq%W!2g9&GW&O}V dpEjfCSp&8`?:>`;7i;');
define('LOGGED_IN_SALT',   'pI8+{dME1kcwNKHGpwPuyX<5~ZzzW<q|>A!D=ys4IXIiL%L#q8^Q:tFG]%:<pn[L');
define('NONCE_SALT',       '{O`DV>Glxd|6iKB,M{zIGiL~5q&kn1j/z%4Qm,si&9h4/.BBBV+lc4jj/Fa+/iCX');

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
