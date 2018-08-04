<?php $pagename = "Contact"; ?>
<?php $additionalHeadTags = ""; // <link rel='canonical' href='' /> ?>
<?php include("header.php"); ?>

<section>
	<div class="centered clearfix">
		<div class="seven columns left">
			<img src="images/contact-photo.jpg" alt="Philadelphia Based Designer + Front-end Developer">
		</div>
		<div class="nine columns follow right">
			<h1>Say hello!</h1>
	    	<p>Please feel free to reach out to me if you have any questions, work inquiries, or just to say hello. :)</p>

	    	<ul class="contact">
                <li class="email"><a href="mailto:jessica.warhus@gmail.com"><?php svg('images/svg/icon_mail.svg'); ?> jessica.warhus@gmail.com</a></li>
                <li class="address"><?php svg('images/svg/icon_mapMarker.svg'); ?> Philadelphia, PA</li>
            </ul>

	    	<hr>

	    	<h2>Follow Me</h2>
			<p>When I’m not designing, I can usually be found running along the Schuylkill, 
			puppy watching, hiking, traveling, or searching for the best caf&eacute; au lait Philadelphia has to offer.</p>
			<ul class="social">
                <li><a href="//www.linkedin.com/pub/jessica-warhus/24/412/b1b" target="_blank"><?php svg('images/svg/social_linkedIn.svg'); ?></a></li>
                <li><a href="//twitter.com/warhus18" target="_blank"><?php svg('images/svg/social_twitter.svg'); ?></a></li>
                <li><a href="//www.instagram.com/jwarhus/" target="_blank"><?php svg('images/svg/social_instagram.svg'); ?></a></li>
                <li><a href="//dribbble.com/warhus18" target="_blank"><?php svg('images/svg/social_dribble.svg'); ?></a></li>         
            </ul>
		</div>
	</div>
</section>
 
<?php include("footer.php"); ?>