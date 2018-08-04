<?php $journal = 'http://jessicawarhus.com/'; ?>
<?php $template_directory = get_template_directory(); ?>

<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); ?>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $journal; ?>images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo $journal; ?>images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $journal; ?>images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo $journal; ?>images/favicons/manifest.json">
    <link rel="mask-icon" href="<?php echo $journal; ?>images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheets -->    
    <link rel="stylesheet" type="text/css" href="<?php echo $journal; ?>start.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $journal; ?>style.css" />

</head>

<body <?php body_class(); ?>>

    <script type="text/javascript" src="<?php echo $journal; ?>js/jquery.allPages.js"></script>

    <div class="dimmer"></div>
    
    <header class='header clearfix'>
        <div class="display-flex align-items justify-content" data-items="center" data-content="space-between">
            <div class="logo"><a href="<?php echo $journal; ?>"><img src="<?php echo $journal; ?>images/jw_logo.jpg" /></a></div>
            <nav class="menu">
                <ol>
                    <li><a href="<?php echo $journal; ?>portfolio">Portfolio</a></li>
                    <li><a href="<?php echo $journal; ?>about">About</a></li>
                    <!-- <li><a>Journal</a></li> -->
                    <li><a href="<?php echo $journal; ?>contact">Contact</a></li>
                </ol>
                <div class="hamburger"><span></span></div>
                <div class="dimmer"></div>
            </nav> 
        </div>    
    </header>

    <main class="blog">
