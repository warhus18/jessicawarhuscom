## General Tips

* Style loop.php first. This is the most used function in the blog and is called any time an article preview occurs. 
* The `<main>` tag is used on every primary page. You can either attach the columns on each of these pages individually (if they would for any reason be different) or extend the tag in the sass.

    ````sass
    main[role="main"] {
       @extend .two-thirds;
       @extend .columns;
    }
    ````
* Include the columns for the sidebar inside of sidebar.php
    * Doing so will reduce the amount of pages that need to be styled.
* Change the sidebar widgets inside of the WordPress admin rather then hard coding them
* Set a php variable in the header and footer to have easy access to the full url.

## Remember

* The fav.ico is located inside of img/icons/ and should be modified accordingly
* When linking back to pages out side of the blog, you *MUST* include the full URL
    ````php
    <?php $baseURL = 'http://website.com/'; ?>

    <!-- In http://website.com -->
    <a href="contact">Contact</a> <!-- Will go to: http://website.com/contact -->

    <!-- In http://website.com/blog/ -->
    <a href="contact">Contact</a> <!-- Will go to: http://website.com/blog/contact -->
    <a href="<?php echo $baseURL; ?>contact">Contact</a> <!-- Will go to: http://website.com/contact -->
    ````
* If you attempt to use database data from the main sites database, you will need to create a new connection.
    ````php
    <?php
        // Create a new file called database.php
        define('DB_HOST', '');
        define('DB_USER', '');
        define('DB_PASS', '');
        define('DB_NAME', '');
    ?>
    ````

    ````php
    <?php
        // Inside header.php
        require_once('database.php'); // Untested, may not work, if it doesn't put the defines in header
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    ?>
    ````
* Everything in the root folder, wp-admin, and wp-includes will need to be FTP'd on the server
* Set the WP Ignores in the primary .gitignore

    ````
    # Wordpress Ignores
    blog/index.php
    blog/license.txt
    blog/readme.html
    blog/wp-active.php
    blog/w-blog-header.php
    blog/wp-comments-post.php
    blog/wp-con.php
    blog/wp-links-opml.php
    blog/wp-load.php
    blog/wp-login.php
    blog/wp-mail.php
    blog/wp-signup.php
    blog/wp-trackback.php
    blog/xmlrpc.php
    blog/wp-admin/*
    blog/wp-includes/*
    blog/wp-content/upgrade/*
    blog/wp-cdontent/index.php
    blog/wp-content/install.php
    blog/wp-content/uploads/*
    blog/wp-config-sample.php
    blog/wp-content/plugins/*
    blog/wp-content/debug.log
    ````