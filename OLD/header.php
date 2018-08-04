<?php include_once("database.php"); ?>
<?php include_once("lib/functions.php"); ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
    <base href="<?php echo $_SITE['CLIENT_WEBSITE']; ?>" />
    <!-- <base href="http://jessicawarhus.com/" /> -->

    <?php include('meta.php'); ?>
    
    <!-- [if lt IE9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif] -->

    <link rel="stylesheet" type="text/css" href="start.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    
    <!-- Favicons -->
    <!-- Easily generate all versions at http://realfavicongenerator.net/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="images/favicons/manifest.json">
    <link rel="mask-icon" href="images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <?php echo $additionalHeadTags; ?>
    <script> var fullURL = "<?php echo $_SITE['CLIENT_WEBSITE']; ?>"; </script>
</head>
<body>
    <script type="text/javascript" src="js/jquery.allPages.js"></script>
    
    <div class="dimmer"></div> <!-- "full screen" background behind .popUp div -->

    <header class='header clearfix'>
        <div class="display-flex align-items justify-content" data-items="center" data-content="space-between">
            <div class="logo"><a href=""><img src="<?php echo $_SITE['CLIENT_LOGO']; ?>" /></a></div>
            <nav class="menu">
                <ol>
                    <li><a href="portfolio">Portfolio</a></li>
                    <li><a href="about">About</a></li>
                    <!-- <li><a>Journal</a></li> -->
                    <li><a href="contact">Contact</a></li>
                </ol>
                <div class="hamburger"><span></span></div>
                <div class="dimmer"></div>
            </nav> 
        </div>    
    </header>

    <main class="<?php echo $pagename; ?>"> <!-- to target elements by page from the stylesheet -->