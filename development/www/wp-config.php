<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'floyd_jessicaflo');

/** MySQL database username */
define('DB_USER', 'floyd_jessicaflo');

/** MySQL database password */
define('DB_PASSWORD', 'trC280ai');

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
define('AUTH_KEY', 'DwXtWijUjID5aNoZfsEVLXRI7fkGz9i8YBa9Ey1n7DAiQlUD0WUTmpQwasRWBzR5');
define('SECURE_AUTH_KEY', 'XgrJ4uRPqW9Fhk5RJOdvMNWTZcEoviFLCJjhV3UvAoxRcBH17TZKSeRQA6F32VX4');
define('LOGGED_IN_KEY', 'QUYKrT0LCYUFe9RueyA8GiITc36tenmXnQSVK0ToxFTliyhi9Fq3QUTEcC5KFHsq');
define('NONCE_KEY', '3NpUh6kQsnuGGoyNxUYApFl3tJETi8b2eu3xFZTG6ZlV3j53HYinx0bNFhJv8igh');
define('AUTH_SALT', '8YUq49wou4vGbpDnVNols3sIapuaPRt81w9gSyv6EJPD3QMOkA9Q6k3qOnesrLM4');
define('SECURE_AUTH_SALT', 'A8lq90RpJNfVNUbxDDeZnf6ExAcM7M0ImK2yhmAHBmsjyAXQwEN2fSbRKDWYuxcf');
define('LOGGED_IN_SALT', 'Ic2LAllUb4EAoHdMLN6f0PXHGGie51dWVTyQsuQxIh1Ll2zLJGm01KR9MBX08fDd');
define('NONCE_SALT', 'nbxV9YfibjLcd7hZnq1wYXKKU3jjQE3stF83Ho0V1lFbW1Bu7QwlyrUtlHYNFMvm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
