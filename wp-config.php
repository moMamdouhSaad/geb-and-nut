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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'kgbp4twEkX@c =~iN!Hx1bwq~:+kBsrgvatnl(%?*+P<RGxo~y_#UmJ[PK3NCHoM' );
define( 'SECURE_AUTH_KEY',   '5wu!ZE/=ZAmr:#Re/d78Oe;n|@@nUmd0RVZS8F=?+BR@tUf}9K4&[ZS:As)nPq:r' );
define( 'LOGGED_IN_KEY',     ';q]i$KA=k;a.Y-_pFp{FG[K)MITHFe#oZcdfs*m[sgfaiLq~b~o![j@;<K=?oy{O' );
define( 'NONCE_KEY',         '|J/;.?Og;pAA6^q!pm,zAWQ>%W]{l]*7}<VeQ_}(,M/)Ka2^62Yi.na*e]xpg]5u' );
define( 'AUTH_SALT',         '6_[e8Hk3$}v1h$wgx[ n[=D5r$ XL%N M5j3z(8yMHS8G83-udwH*K_DL Lk(kHz' );
define( 'SECURE_AUTH_SALT',  '9NE/<~6kW2I0wB0y6?uu#~eLG(m`hsx{T3DDc$RzyFXDQ-|-{] 0,|EiJv9cA.qB' );
define( 'LOGGED_IN_SALT',    'i1G0L#d=Z{;Mv4yIY[zbo|>E)nS=]:JCTqJ&d%)e<@2hvfxPD<=>agGE0A>s^t%Z' );
define( 'NONCE_SALT',        '4t-a(dw1.CTW&{s%o?x!d/iSH}2LxGNe@,:XXj,5~y`hf[7DK1}?mc>Wu(&)B-=K' );
define( 'WP_CACHE_KEY_SALT', 'G=AC7[KGl( J2Z3x$2uxaKqC_f(),j^b/J28r4_%p_`+*=Ie[u1JsENcK@:@h dA' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '17GaX4_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
