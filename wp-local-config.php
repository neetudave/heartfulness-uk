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
define('DB_NAME', 'HeartfulnessDB');

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
define('AUTH_KEY',         '*Hb[&LVds[aIZ[Qj*S,PDzLZoS~R/o,kr+wj%*^&mQpB!kJbq-s$PGSg-J.kfH 6');
define('SECURE_AUTH_KEY',  'vMk19%8/H[owTfHuY6WSh(.J2ITN*Fv])gFq-g,]QI+?UNmY-&!m}H}k9-x`of74');
define('LOGGED_IN_KEY',    'HgME{qpTL$l(g|Ch]s>!*zAhY2xJiY}N]sEp@vbGZSGSE6RkbZ*.e3tgg-LgbwM=');
define('NONCE_KEY',        'TZ+Jtf^VhdK6v:{J$|mRPyu;#YuQz-Bb-^JnC`[2:zwj+:!n^qr$jn8u|&|D6b>!');
define('AUTH_SALT',        'ReNl7IF[[z.KvE&WYu]CUC+<VqdsIotCjAW|KI|0AkNi1xs,c0{B85?w|$YCGK0 ');
define('SECURE_AUTH_SALT', 'E+agC&KNJ:xkb&dptFSabk6<AMZX6IAO?HK)oOYi. NkE`)Cg=7vRYnMJ+>nao5h');
define('LOGGED_IN_SALT',   'o8R9h9Q<vo|e&idk}b`{I6H<fPs9niX~+5yj[x.kH8$`x8|r`JL!O]gdUCdy]c(z');
define('NONCE_SALT',       'z06?2I2 2:bJU8aYM>+F[SONW~r5orLR8:q~^8S}pGIF-QYb0(@,`@ctp%1y%lyD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hfn_';

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
