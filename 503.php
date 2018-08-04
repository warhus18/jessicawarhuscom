<?php
    $_SERVER['REDIRECT_STATUS'] = 503;
    header("HTTP/1.1 503 Service Temporarily Unavailable.");
    header("Status: 503 Service Temporarily Unavailable.");
    header('Retry-After: 3600');
?>
<?php $title = "Service Temporarily Unavailable"; ?>
<?php $additionalHeadTags = ""; // <link rel='canonical' href='' /> ?>
<?php include("header.php"); ?>

<section class="intro clearfix error-page">
    <div class="centered">
    	<div class="content align-center">
    		<h1>I'm Sorry!</h1>
			<h4>Service is temporarily unavailable :(</h4>
    	</div>
    </div>
</section>

<?php include("footer.php"); ?>