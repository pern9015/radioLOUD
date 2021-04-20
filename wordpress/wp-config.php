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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pernillestrate_dk' );

/** MySQL database username */
define( 'DB_USER', 'pernillestrate_dk' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mlhjbakitiaa!' );

/** MySQL hostname */
define( 'DB_HOST', 'pernillestrate.dk.mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[,.&@Ll]O? p*2w#=W/RCXM6t1yf:hWVB*h319,{%(]qg95JoM1_6I{)ye|jCfZ4' );
define( 'SECURE_AUTH_KEY',  '1O.BahSc$Qmo0j6NEo/zLW|z[=cL((Uiufw|4$hJR-[S:H1)(dRX*#z~Qwgv[]]6' );
define( 'LOGGED_IN_KEY',    'yt[Gqu4j>`Ti.]b,#:iG$Y`NaqS,66(?}Wp7vPK6GxH,6zE=hb(vg|2o?#/)qZ7]' );
define( 'NONCE_KEY',        '!`=o&[&I5YB*xL/kIBu%@=G+JQ|sVGrMh>s@fSzxQdey2S>8hB!D*3ugQw9|T%pB' );
define( 'AUTH_SALT',        'ZG0JOC&fIk?!z*{ld+a^:3jf&1*dj)JGM*FHgL|qG!x-O# ]hy-^8TVM! 9(cY_/' );
define( 'SECURE_AUTH_SALT', 'eQ,P6}.~m:rQxj%I:.G}AWNb%Qk$]ci_p&w&-pwdy -(yHbiD?R;sPV=E:nu]l29' );
define( 'LOGGED_IN_SALT',   ' $%,ECq ]kZMr%.+[>~cH:F^WY--6-8d][#A5yf* ]s&]H%h3.Z:#puz9R/W^KTb' );
define( 'NONCE_SALT',       '*qIZQ9NIK!3CJRm9qo)TCW$UvK~1aNZN&u{{RN _j3Pn!:YH,4>L$=3F&DF9&kQr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'radioLOUD_wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
