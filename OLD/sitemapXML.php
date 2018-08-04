<?php 
require_once('database.php');
ini_set('display_errors',1);
ini_set('log_errors',1);
error_reporting(E_ALL);

/* == XML Header ============================================= */
$header = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
XML;

/* == XML Pages ============================================== */
$body = "";

$query = "SELECT pageURL, `lastmod`, `changefreq`, `priority` FROM LEV_meta WHERE pageID != 1";
$baseChangeFreq = "SELECT `changefreq` FROM LEV_meta WHERE pageID = 1 LIMIT 1";

if(!$results = $db->query($query)) {
    echo $db->error;
}

if(!$baseChange = $db->query($baseChangeFreq)) {
    echo $db->error;
}

$baseChange = $baseChange->fetch_assoc();

while($row = $results->fetch_assoc()) {
    if(empty($row['changefreq'])) {
        $row['changefreq'] = $baseChange['changefreq'];
    }
    if($row['lastmod'] == '0000-00-00 00:00:00') {
        $date = date('Y-m-d H:i:s');
    } else {
        $date = $row['lastmod'];
    }

    $pre = ($_SERVER['SERVER_PORT'] == '443' ? 'https:' : 'http:');
    $body .= "
        <url>\r
            <loc>$pre$row[pageURL]</loc>\r
            <lastmod>$date</lastmod>\r
            <changefreq>$row[changefreq]</changefreq>\r
            <priority>$row[priority]</priority>\r
        </url>\r
    ";
}

/* == XML Footer ============================================= */
$footer = <<<XML
</urlset>
XML;

$XML = $header.$body.$footer;

/* == Create File ============================================ */

$file = "sitemap.xml";
$fh = fopen($file, 'w');

fwrite($fh, $XML);
fclose($fh);

header("Content-Type: text/xml");
print $XML;