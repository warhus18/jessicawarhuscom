<?php $_SERVER['REDIRECT_STATUS'] = 403; ?>
<?php $title = "Directory is Forbidden"; ?>
<?php $additionalHeadTags = ""; // <link rel='canonical' href='' /> ?>
<?php include("header.php"); ?>

<section class="intro clearfix error-page">
    <div class="centered">
    	<div class="content align-center">
    		<h1>I'm Sorry!</h1>
			<h4>The directory you requested is forbidden :(</h4>
			<a href="portfolio" class="button">View My Portfolio</a>
    	</div>
    </div>
</section>

<?php include("footer.php"); ?>