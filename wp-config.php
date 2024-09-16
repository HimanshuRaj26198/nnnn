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
define( 'DB_NAME', 'u163647679_Softakora' );

/** Database username */
define( 'DB_USER', 'u163647679_Softakora' );

/** Database password */
define( 'DB_PASSWORD', 'London@2030' );

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
define( 'AUTH_KEY',         'a8dqfbsrfzkzcjnimbaxm93hq1o9syjve5q0lasic9glfiieuds9ufaxwjyrxup8' );
define( 'SECURE_AUTH_KEY',  'vjhfkmkicvpwidlv3saigyhkg6rtmy6b13sp2oodwonzr8wpmoxaco0zuxvmb9ma' );
define( 'LOGGED_IN_KEY',    'uiewk1ut9gduyzdanoixhrzy0sym3i8c9pcm0mtffn7l25axg3rsrnqxwiv3czjz' );
define( 'NONCE_KEY',        'qqexsimsyz9j9lsoq7xuymu0y4ptp74fcqgyoscv842cg23fznnydyw9bnpqrdmj' );
define( 'AUTH_SALT',        'vyeh3ikkao6vkqxmoxk0f4rsciqstgearnfvtrbqhdzotpi0bixf6b1xgbekdzo9' );
define( 'SECURE_AUTH_SALT', 'obdgv9kwxl4rqsi55xypr2odmhzhmzgwyr1v2eeww0yeun8lku55reci0eb2fly5' );
define( 'LOGGED_IN_SALT',   'v1cy7bnlrw1mxlw6ldf54x5nq5nlx2du08qvfb66ftw5t1ao3get8butismdzmhp' );
define( 'NONCE_SALT',       '1dk1dxp8ljevgsr1jgvhinho18bpzfkgpobj9hfns4zjgwz2t6dlfjefuv3xww2r' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'getsecured';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
