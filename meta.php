<?php
    $_SEO = array();
    $_META = array();

    $url = $_SITE['CLIENT_WEBSITE'];

    if(!$_SITE['LIVE']) {
        $url = $_SITE['LIVE_WEBSITE'];
    }

    $_SEO['fileName'] = explode('/',$_SERVER['SCRIPT_NAME']);
    foreach($_SEO['fileName'] AS $key => $value) {
        if(strstr($value, '.php')) {
            $_SEO['fileName'] = $value;
        }
    }

    echo generateMeta($_SEO);


    /**
     * @global $_SEO | Array, $_SITE | Array, $pagename | String
     * @global $url | String
     * @param null
     * @return string
     *
     * Generates, and pulls the meta tag's based on the page URL.
     */
    function generateMeta() {
        global $_META, $_SEO, $_SITE, $pagename, $url;
        $disallowedFiles = array('401.php', '403.php', '404.php', '500.php', '503.php');
        $disallowedExtensions = array('.css','.js','.png','.jpg','.gif','.ico','.txt','.md','.scss','.html','.htm','.pdf');

        // Prevent specific files or extensions and 404 Status Codes
        if(in_array($_SEO['fileName'], $disallowedFiles)) { return false; }
        if(in_array($_SEO['fileName'], $disallowedExtensions)) { return false; }
        if(isset($_SERVER['REDIRECT_STATUS']) && $_SERVER['REDIRECT_STATUS'] == 404) { return false; }

        $uri = getURL();

        // Set the base data
        $_SEO['pageURL'] = rtrim($url,'/').$uri;
        $_SEO['pageName'] = "(".$pagename.") - ".$uri;
        $_SEO['lastmod'] = date('Y-m-d H:i:s', getlastmod());
        $_SEO['title'] = $_SITE['CLIENT_NAME']." - $pagename";

        // Drop the HTTPS or HTTP
        $_SEO['pageURL'] = str_replace('https:', '', $_SEO['pageURL']);
        $_SEO['pageURL'] = str_replace('http:', '', $_SEO['pageURL']);

        // if(!strstr($_SERVER['HTTP_HOST'],'localhost')) {
        //     if(!insertData()) {
        //         echo "Error";
        //     }
        // } else {
        //     // Never work on localhost, too many variables that
        //     // can't be taken into account. 
        //     return false;
        // }

        // getDefaultMeta();
        // getPageMeta();

        return setMeta();
    }

    /**
     * @param null
     * @return string
     *
     * Gathers the URI from the server, strips any arguments,
     * index, and .php from the request. 
     */
    function getURL() {
        $strip = $_SERVER['SCRIPT_FILENAME'];

        $uri = explode("?",$_SERVER['REQUEST_URI']);
        $uri = explode("&", $uri[0]);
        $uri = $uri[0];

        // Trim index and .php
        $uri = (strstr($uri, 'index') ? str_replace('index', '', $uri) : $uri);
        $uri = (strstr($uri, '.php') ? str_replace('.php', '', $uri) : $uri);

        return $uri;
    }

    /**
     * @global $_META | Array
     * @param null
     * @return string
     *
     * Builds out and returns the meta tags to be displayed on the
     * page based on the $_META global array.
     */
    function setMeta() {
        global $_META;

        $tags = "";

        // $tags .= "<title>$_META[title]</title>\r\n";

        foreach($_META AS $key => $value) {
            $key = str_replace('-', ':', $key);
            $tags .= "\t<meta name='$key' content='$value' /> \r\n";
        }

        if(!in_array('twitter:description', $_META) && !empty($_META['description'])) {
            $tags .= "\t<meta name='twitter:description' content='$_META[description]' /> \r\n";
        }
        if(!in_array('og:description', $_META) && !empty($_META['description'])) {
            $tags .= "\t<meta name='og:description' content='$_META[description]' /> \r\n";
        }

        return $tags;
    }

    function updateLastMod() {
        global $_SEO, $db;
        $date = date('Y-m-d', strtotime($_SEO['lastmod']));
        if(strtotime($date) <= strtotime('1 month ago')) {
            $_SEO['lastmod'] = date('Y-m-d H:i:s');
        }

        if($stmt = $db->prepare("UPDATE `LEV_meta` SET `lastmod`=? WHERE pageURL=?")) {
            $stmt->bind_param('ss',$_SEO['lastmod'], $_SEO['pageURL']);
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            echo $db->error;
            return false;
        }
    }
?>