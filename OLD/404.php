<?php $_SERVER['REDIRECT_STATUS'] = 404; ?>
<?php $title = "Page Not Found"; ?>
<?php $additionalHeadTags = ""; // <link rel='canonical' href='' /> ?>
<?php include("header.php"); ?>

<section class="intro clearfix error-page">
    <div class="centered">
    	<div class="content align-center">
    		<h1>I'm Sorry!</h1>
			<h4>The page you requested has not been found :(</h4>
			<a href="portfolio" class="button">View My Portfolio</a>
    	</div>
    </div>
</section>

<?php include("footer.php"); ?>