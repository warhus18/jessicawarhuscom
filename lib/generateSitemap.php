<?php require_once('../database.php');

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

$query = "SELECT pageURL, lastmod, changefreq, priority FROM LEV_meta WHERE pageID != 1";

if(!$results = $db->query($query)) {
    if($_SITE['ERROR_REPORTING']) {
        echo $db->error;
    }
}

while($row = $results->fetch_assoc()) {
    $body .= "
        <url>\r
            <loc>$row[pageURL]</loc>\r
            <lastmod>$row[lastmod]</lastmod>\r
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

$file = "../sitemap.xml";

$fh = fopen($file, 'w');

fwrite($fh, $XML);

fclose($fh);