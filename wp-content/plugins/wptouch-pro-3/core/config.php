<?php

define( 'WPTOUCH_PRO_INSTALLED', 1 );

//! Set this to 'true' to enable debugging
define( 'WPTOUCH_DEBUG', FALSE );

//! Set this to 'true' to enable simulation of all warnings and conflicts
define( 'WPTOUCH_SIMULATE_ALL', FALSE );

define( 'WPTOUCH_MAX_NEWS_ITEMS', 15 );
define( 'WPTOUCH_ROOT_NAME', 'wptouch-pro-3' );
define( 'WPTOUCH_DEFAULT_DEVICE_CLASS', 'default' );
define( 'WPTOUCH_VERSION_CHECK_TIME', 30 );
define( 'WPTOUCH_VERSION_TRANSIENT', 'wptouch_pro3_new_version' );

//! The WPtouch Pro user cookie
define( 'WPTOUCH_COOKIE', 'wptouch-pro-view' );

function wptouch_check_url_ssl( $ssl_string ) {
	if ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on' ) {
		return str_replace( 'http://', 'https://', $ssl_string );
	} else {
		return $ssl_string;
	}	
}

define( 'WPTOUCH_DIR', WP_PLUGIN_DIR . '/' . WPTOUCH_ROOT_NAME );
define( 'WPTOUCH_URL', wptouch_check_url_ssl( WP_PLUGIN_URL . '/' . WPTOUCH_ROOT_NAME ) );
define( 'WPTOUCH_PRODUCT_NAME', 'WPtouch Pro' );

define( 'WPTOUCH_ADMIN_DIR', WPTOUCH_DIR . '/admin' );
define( 'WPTOUCH_ADMIN_URL', WPTOUCH_URL . '/admin' );

$wptouch_upload_dir = wp_upload_dir();
if ( !defined( 'WPTOUCH_BASE_CONTENT_DIR' ) ) {
	define( 'WPTOUCH_BASE_CONTENT_DIR', $wptouch_upload_dir[ 'basedir' ] . '/wptouch-data' );
}

if ( !defined( 'WPTOUCH_BASE_CONTENT_URL' ) ) {
	define( 'WPTOUCH_BASE_CONTENT_URL', wptouch_check_url_ssl( $wptouch_upload_dir[ 'baseurl' ] . '/wptouch-data' ) );
}

define( 'WPTOUCH_CUSTOM_ICON_SET_NAME', __( 'Custom Icons', 'wptouch-pro' ) );
define( 'WPTOUCH_TEMP_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR . '/temp' );
define( 'WPTOUCH_TEMP_URL', WPTOUCH_BASE_CONTENT_URL . '/temp' );
define( 'WPTOUCH_CUSTOM_SET_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR .'/icons' );	
define( 'WPTOUCH_CUSTOM_UPLOAD_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR .'/uploads' );		
define( 'WPTOUCH_CUSTOM_ICON_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR . '/icons/custom' );
define( 'WPTOUCH_CUSTOM_THEME_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR .'/themes' );
define( 'WPTOUCH_CUSTOM_LANG_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR .'/lang' );

define( 'WPTOUCH_DEBUG_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR . '/debug' );
define( 'WPTOUCH_DEBUG_URL', WPTOUCH_BASE_CONTENT_URL . '/debug' );
define( 'WPTOUCH_CACHE_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR . '/cache' );
define( 'WPTOUCH_BACKUP_DIRECTORY', WPTOUCH_BASE_CONTENT_DIR . '/backups' );

define( 'WPTOUCH_CACHE_URL', WPTOUCH_BASE_CONTENT_URL . '/cache' );
define( 'WPTOUCH_CUSTOM_ICON_URL', WPTOUCH_BASE_CONTENT_URL .'/icons/custom' );

// Separates the two types of settings in terms of usability
define( 'WPTOUCH_SETTING_BASIC', 0 );
define( 'WPTOUCH_SETTING_ADVANCED', 1 );

define( 'WPTOUCH_DEFAULT_MENU_ICON', str_replace( wptouch_check_url_ssl( site_url() ), '', plugins_url( WPTOUCH_ROOT_NAME ) . '/resources/icons/elegant/Paper.png' ) );
define( 'WPTOUCH_SECS_IN_DAY', 60*60*24 );

define( 'WPTOUCH_MULTISITE_LICENSED', 'wptouch_pro_licensed' );
define( 'WPTOUCH_THUMBNAIL_SIZE', 144 );
define( 'WPTOUCH_EXCERPT_LENGTH', 24 );
define( 'WPTOUCH_PRO_README_FILE', 'http://www.bravenewcode.com/wptouch-pro-3/readme.txt' );

require_once( 'mobile-user-agents.php' );
