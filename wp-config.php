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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'traphusy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
// Ls@04072018
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '&SgIKmY_~@4:g4PV+!!J_m$B5H<V^:,J99Qokr@EdgPKnwH9Wozlr!5C[=>F>5hL');
define('SECURE_AUTH_KEY',  'N&N^Vc}VHqTHZaGU/e]+7-6ZBR4X<g]PnuPy! ]4S<)Zt0rXT[9,A%aF>V;ya1Mu');
define('LOGGED_IN_KEY',    'O<W1 x`z|ft,<EYwwf_<bq7PnxnGsupz[42{wE@jJ>}}`Rx2(zH=+55))9DSN27Z');
define('NONCE_KEY',        'nz-{UGB1[)GwC 6x1$Teg2_;|D-c(?wGK@Ve(6yTWcAgJG:q<5/B`[R9j`;xSIwV');
define('AUTH_SALT',        'EPc%>:gvJgd5h-$577HH :Ouk5[2fv3oN!!P3%X>)Rm)FJC~aG<OuT224O^NP5Ma');
define('SECURE_AUTH_SALT', '.xC|fQgT5%N_YTYto%J7uEkyws.uZ0Hb[vM.Zkf`5o1&C8AC_qc^I_6a>`i|zXmu');
define('LOGGED_IN_SALT',   '>2NQ^Huy5SdHwut-a2v(;[.f-@ZdKQhLUDNo+jQ<RJ3<m$TvMaJeI7<juG4e~EJq');
define('NONCE_SALT',       'LTbfQJ_;RLn+e.2T(tyK/A&?+fhLxo([kT}AU5z;!}~K`6Kio}9uvc<oQ+b@+5b.');

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

define('WP_POST_REVISIONS', 1);
/* Add any custom values between this line and the "stop editing" line. */

define('WC_REMOVE_ALL_DATA', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('WP_ALLOW_REPAIR', true);
