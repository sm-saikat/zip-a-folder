<?php
    /**
     * The template for displaying single posts and pages.
     *
     */
    
    get_header();
    ?>

    <?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
            the_content();
		}
	}

	?>

    <?php get_footer(); ?>
    