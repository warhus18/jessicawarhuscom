<?php
/* == Include connection settings (For Remote) =============== */
include("lib/settings.php");

/* == Include local connection settings ====================== */
if(file_exists('local.settings.php')) {
    include('local.settings.php');
}
if(file_exists('lib/local.settings.php')) {
    include('lib/local.settings.php');
}

date_default_timezone_set($_SITE['TIMEZONE']);

/* == Force Forward Slash ==================================== */
$_SITE['CLIENT_WEBSITE'] = (substr($_SITE['CLIENT_WEBSITE'],-1) != "/" ? $_SITE['CLIENT_WEBSITE'].'/' : $_SITE['CLIENT_WEBSITE']);

/* == Enable Error Reporting ================================= */
ini_set('display_errors', $_SITE['LIVE'] ? 0 : 1);
ini_set('log_errors', $_SITE['LIVE'] ? 0 : 1);
error_reporting($_SITE['LIVE'] ? 0 : E_ALL);

/* == Attempt Database connection ============================ */
#$db = new mysqli($_SITE['DB_HOST'], $_SITE['DB_USER'], $_SITE['DB_PASS'], $_SITE['DB_NAME']);

#if($db->connect_errno > 0) {
#    header('Location: 503');
#}

/* == Check for install ====================================== */
#if(!$validate = $db->query("SHOW TABLES LIKE 'LEV_meta'")) {
#    if($_SITE['ERRORS']) {
#        die($db->error);
#    }
#}

#if($validate->num_rows < 1 && !strstr($_SERVER['PHP_SELF'],'install')) {
#    echo "<div style='border:1px solid #ccc; background-color:#fbfbfb; padding:5%; width:50%; margin:5% auto;'>";
#    echo "<h1>Welcome to the <a href='".$_SITE['LEVERAGE_WEBSITE']."'>Leverage CMS</a></h1>";
#    echo "<p>It appears this is your first time running this application on this server. Please take the time to install the required databases before continuing.</p>";
#    echo "</div>";

#    exit;
#}


?>