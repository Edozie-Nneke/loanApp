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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'loan_db' );

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
define( 'AUTH_KEY',         'Bhr9/U6mx=<_m&~K-%ctwX1%3JsqxCZ4ubmZ{ira(a2<1KN?@otw9u[ljyI>oSbp' );
define( 'SECURE_AUTH_KEY',  '>uEEA%4&n{.yI=(.51(-Q4qA|Xk()T?m7`D8M=V&z;`#lIJ-n{JW1p4HfTn5abSl' );
define( 'LOGGED_IN_KEY',    'J>~|@U,.EYY]BCt,G8 RZ33[h|)8}/.?!2x,]Pa%kg{cH50ijdZn9JZvX,;aHpAj' );
define( 'NONCE_KEY',        'W?/{N]Nop@73X):a$jNsD$~uEF+`] (A=`jHT!AoN}^bL!/l1mEr+0gx_)Wn!Vtv' );
define( 'AUTH_SALT',        '{4~)6O{~#Hob3|$^(/W( kz]&12&:Qp%),AOA|v]+d!pZA]d@J6_%7eHI=BkZM |' );
define( 'SECURE_AUTH_SALT', ')33081QiE[^ocZ|g2{xB*?5@J32trMaH4]W12r}=a&znua)xaV3Phb5W1h.BUex@' );
define( 'LOGGED_IN_SALT',   'gP8Pr11CFxl`JglCm9Y*/+u2TRXU2J|hxe(0AYB{nd$.!cC/I_V*BZuRs!w?$MTw' );
define( 'NONCE_SALT',       '+Oh*1e1VQ h($k9i75&Ex5Z},`>4Zd|M_a_Weq7dL95j%5;r&amViM4_i52c&7(H' );

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
define( 'WP_DEBUG', false );

define( 'FS_METHOD', 'direct' );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
