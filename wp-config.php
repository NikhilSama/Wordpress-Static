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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '$;Rcl<s& n>R<N&@]Cyh?V$!qy!`mB% N|/F8+z7h/`$wD!n1en>iA30YLU/P:$L');
define('SECURE_AUTH_KEY',  '#6Idxxi)CK})]Fzv$:BwQO~q]CZ|<w8`x7qz, nZGwg;xc=R0XKAF|bvPCzug[mS');
define('LOGGED_IN_KEY',    'p>yeNE|/,U(LE:Ub#,Cg<[&FyO=;cS?r>DI?,&@P|UZP5Nd067>%J9p>?yJ;-dl/');
define('NONCE_KEY',        'm2>ER&z?9-gn% Go+#]2@_l/oIOE^K-Rga@}?9jH-b4qfm# SINZT82}k}~=m2~e');
define('AUTH_SALT',        'Wb9X~;t02~?Jh@=I1O4(LSJRbjhqphXp TAM`1R-^s`jK]dN@R55}M[`5~?]n?$Z');
define('SECURE_AUTH_SALT', '2?<R&oS0F7:[$Tb6D@JO?!g+$6{;<m2(9,!=3;]]/?(3^s{IJ;fR>t3HVRZ[7Twq');
define('LOGGED_IN_SALT',   '=+0/EmD4H__jUH :(HyqL9UJ*-Ul6na9{A42&}gYpQO9%Mfa]I-9 kZ<$FCSAb!N');
define('NONCE_SALT',       '.(=IuF]g<x$Fh%tLS:n9t/bC94m*G7<w7(bJ`D38eXdn=#FXvSDJesRKfGxYfX[D');

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

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'wordpress.snaplion.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
define( 'SUNRISE', 'on' );
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

