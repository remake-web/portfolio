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
define( 'DB_NAME', 'xs589364_remake' );

/** MySQL database username */
define( 'DB_USER', 'xs589364_remake' );

/** MySQL database password */
define( 'DB_PASSWORD', 'remake0126' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0NoYQeblaACVGTsrStqBmR6YQ7Cfk31vCcWbmYGqUOATf10GaZU2vTn4+FufnPfkOjB7ca5zbzxMRdv30QvLYA==');
define('SECURE_AUTH_KEY',  'zJzH7d/MXkPuhvxo0d97b4xjD5rO+eISiO2nxeaCgdLgTPqpp/KchrG0uZ70QXqmWpshCyCOn9XZbpIvF2At0w==');
define('LOGGED_IN_KEY',    'GVN++cFaKTv1+60uD0rb1/yuakOa6mhQvmJ5pDJvESnJgg5RhI6JiFRCRRjWd+l3fnzG60MNe8r2JAuTwlsE8w==');
define('NONCE_KEY',        'rB53J7nPAm2dlqTGgA3Ynr1MSRsZg6QqxRkoaUQqDZRXqdMccBDLVH5sNV+9+429Qtsrw6UHFp0NlzfI5j8SxA==');
define('AUTH_SALT',        'F983jaVpFdDAlAHjZjetNa9gv8HeTfSSOpqj7jMvhPSSSey2YHgh22mLb32a1jRWumeP98SFTfFJaJ6Lgit+Fw==');
define('SECURE_AUTH_SALT', 'T884XrudDtVlcGxFxFqVXEPcQ7COp6T++ZOWf/PLC/7QmnSwIkkDMLIgGvEhmmxajmHBQrwzz68NnAIOD7YijA==');
define('LOGGED_IN_SALT',   'odWOa8WrUFNhwUBzvDzs0e+y6bmbZePTW1Z15bnKJs0sJNM6koy4AAqI62Sj91WsFDOHXh9Bie9MjeasxWHUiA==');
define('NONCE_SALT',       '1EKxk87OZi3bn6yhAUFBWcIGgAAIrM3ArhXJ86rHVEZXrAPymjFWhH9waeDt7QCYGr+9CC432dfNxOLuQ5zstA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

//自動更新を完全に停止させる
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
