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
define( 'DB_NAME', 'testsite' );

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
define( 'AUTH_KEY',         '5uZ>bS;5OvC@9n6I_$|>?}9`Nep5k4Q-St`Us~2%Pqix}Ue*P[>!6_]<g.+xie(`' );
define( 'SECURE_AUTH_KEY',  '#>LFdhlF![N+ C|D;74E-.YHJn,@VhM}thUxz_6*?9JJF-Kb/Ak+8bbRwXXU6@U*' );
define( 'LOGGED_IN_KEY',    'lS?+5I9~C2#(|BFDq{#O%WbFMNdgzWmP;la*=]E$a4~.~iK h/rvjP&~P0)4+%@s' );
define( 'NONCE_KEY',        'C#c?v2#@_yU}|:,[F0X^C|;tcF aIs%UTuZMeHCPwfWi> uj/175|FqRf P:.#2~' );
define( 'AUTH_SALT',        '#>z~/O#/1_pUp=EEhq%lij<&tD-bWUtb`F529y]g4J$[f|:R=!4n5?V3BsJqf{{P' );
define( 'SECURE_AUTH_SALT', 'ua>HixBW+DK.c!`pJ>e>Lcdjh5@uRNwmU{T;c{]x Fh/b0gO*F_ip|mr(d]#&TOE' );
define( 'LOGGED_IN_SALT',   ')*mY22`-~+t.a~%CWRQ4F$@M&3LyhrbL6%-lh47 !vTbXXtOhLK:FzNT I{~|66+' );
define( 'NONCE_SALT',       'g-inWjgGYM-CrUI+F|$s$HBBzGcrBVQzIdK$5f 5kl#-&;%{#6IgL|!1sL1WMBB>' );

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
