<?php get_header();

	while (have_posts()) : the_post(); ?>

		<main role="main">
			<section>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</section>
		</main>

	<?php endwhile;

get_footer(); ?>
