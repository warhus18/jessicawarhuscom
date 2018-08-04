<?php
/**
 * Custom settings file for either a local machine, or a 
 * development branch. If a setting needs to be change for any reason
 * remove the # in front of it to uncomment the line.
 *
 * In the case of a localhost, CLIENT_WEBSITE will always need to
 * be overridden in order for your site to function properly. Any
 * of the values set in settings.php can be overridden here.
 *
 */

/* == Client Settings ======================================== */
$_SITE['CLIENT_LOGO']      = 'images/jw_logo.jpg';
$_SITE['CLIENT_WEBSITE']   = 'http://localhost/JAW_portfolio/';
#$_SITE['CLIENT_WEBSITE']   = '//jessicawarhus.com/';
$_SITE['CLIENT_EMAIL']     = 'warhusj@brolik.com';

/* == Server Settings ======================================== */
#$_SITE['DB_HOST']          = 'localhost';
#$_SITE['DB_USER']          = 'root';
#$_SITE['DB_PASS']          = '';
#$_SITE['DB_NAME']          = 'leverage';

$_SITE['ERRORS']           = true;
$_SITE['LIVE']             = false;

?>