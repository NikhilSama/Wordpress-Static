<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'demo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '?&nC5p$R#!xk!X/-wuIP)2?neh.W.hn927l@Io0+.A?X/#j4<c6uCjS$O$FQtt*X');
define('SECURE_AUTH_KEY',  'ycMA|Sp05L]D^1<+{}iP!?%):5sx=t|Ow tB6V,.e,yl_WOqdxaw<(l/zT}+{wZ<');
define('LOGGED_IN_KEY',    'hc]4qb?l!4YAU?R1D6l;8){NsQbLmw5Zp$9{wuoiKEJ*-dEslqm?0lJ&v}[tnpw|');
define('NONCE_KEY',        'U OP<tG7sm|]fV~I`7%7ABugsL/kB=ze+;V_{Q-8M>GcTr|/ yCB*nqkL<W&)%u+');
define('AUTH_SALT',        '|71aU).<bG-2X-|k.awY;#|OI:onF:a2o-;C)%R|CNg?ElSOxxT,9~(J[x/T-d#(');
define('SECURE_AUTH_SALT', '%L--iSzf7:}JSiN+q3HY_oZ)qq^cQ+9{_$ZotK1Vj +4|G<CG# D+.$HU&MGLnUC');
define('LOGGED_IN_SALT',   'hE@w@NQG%XH`a;d7oRcY+@i~iDHLli#2}@$6N@7l#-tlkl|ZR#O^DpT@WXNpmr^s');
define('NONCE_SALT',       '1| @STE<n,QRAWn6i+*f=TSF&@%|opUpNxP} KQdYSriy$+ &Y*Of_(g|FtML+rg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
