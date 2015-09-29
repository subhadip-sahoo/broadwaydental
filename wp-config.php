<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'broadwaydentals');

/** MySQL database username */
define('DB_USER', 'broadwaydentals');

/** MySQL database password */
define('DB_PASSWORD', 'bro#$54$');

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
define('AUTH_KEY',         'pr|B::>A=:}^U4f7mf[-^VBiOlrBlGHY~?&&9+Exf+|$85cf5L9yh}-KYh%CmRI#');
define('SECURE_AUTH_KEY',  'xt_!LTDLhi9HqK!pkqXK)4BO@L*j#axBD{},MHi$)9>+Y[umm*&I`>%~k~Uq#;,s');
define('LOGGED_IN_KEY',    '+Hs+Qy;Q rg~@qHzVbv,0:XS&1RSnLxzh8b13s2-8pq/+!n)cBHLp8_$V7|T6OT-');
define('NONCE_KEY',        '.QodELCipSMlsQSIQA!/f49=hdGffgMy*)&`JVImuQLmi^@i0g6O2<{;Ib,c>>4|');
define('AUTH_SALT',        'GY8ANCHh-m5aS ScD#RT0=Y(@8[M1kz{$-SX**u1[? kOAT<*TO2a+7^-)OSr.H6');
define('SECURE_AUTH_SALT', 'G+wXlJ<c.B8_|_WH|sPqU1t<xT:a^tr{uN^>udGhx-9sJ]:<2RB)rF]8LO*fb8_+');
define('LOGGED_IN_SALT',   'h(I|o <IWbu!-Jfoqq<[E).R-|Tbj5|aP1^+Y=?&nAnqNLhmvk^=qDpxCIz0mmq{');
define('NONCE_SALT',       'Y`5`I+cl09z<T}iN5EtzHW-i?.ti|iGFdMu-Dk74O&pBVQBV 9dhh(Y6|s$y>g{$');

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
