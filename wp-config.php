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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ' Ek}7NiH|/K$)E^?_yw7f;Is:9bR/l{J>_rCE>1F/Z4zz8lX{s5[}X1<:T}!+@5d' );
define( 'SECURE_AUTH_KEY',  'd&G^Jg+=bhrW^Shh3nend%OX>zSfGHXxW/pMmdAH[lnR8Ei+x[S{5FpUUmak<E,u' );
define( 'LOGGED_IN_KEY',    'g @.h?tiRd#t`s:Fxl1x-d?ul3 Sxd+ebTSy2WF2}~sg=Jk2$TH$bQP5v,EaFQvN' );
define( 'NONCE_KEY',        ':FnfybCpZq_B 77N&*her?LWU`8fZwDu5`O)2fNrpnfER78(Zl?c0l,I4ezrFtNW' );
define( 'AUTH_SALT',        '|zTl*:74}Z,){&&)5ELPE+|H1i,c1c9B-Ip`7gq2_M=TL0z8I*J9)wyPz,{IAFQ3' );
define( 'SECURE_AUTH_SALT', 'pm?7(U;>F}+#ms~e(%I%HYJmzc0=~Z7=u`:?5+y]*=7pOZ(}cf FWAY$&c[4`K]1' );
define( 'LOGGED_IN_SALT',   'D=P_68iliRl@|YwYK]x6o5xtRHz{(8H(DF1pv/6}3*GArv^V!j{Np9bLxV$(lF:i' );
define( 'NONCE_SALT',       'c&5X4M!ddpb)bv]4.}ACw:;X1mM}h>1gEqoShtA^VLoxDZ718B4dqB/yb(B$=A4z' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
