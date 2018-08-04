<?php

include_once("../database.php");

// get url info
$shorturl = $_REQUEST['shorturl'];
$query = "SELECT urlID,url FROM LEV_urls WHERE shorturl='$shorturl' LIMIT 1";
$insert = "INSERT INTO LEV_urlReferrals (`urlID`,`referrer`,`datetime`) VALUES ('".$q[urlID]."','".$_SERVER['HTTP_REFERER']."','".date('c')."') ";

if(!$results = $db->query($query)) {
    $row = $results->fetch_assoc();

    $tracking = $db->query($insert);
}

// redirect
header("HTTP/1.1 301 Moved Permanently"); 
header("Location: ".$row["url"]); 

die();
?>