<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
                <h1>Projets</h1>
                
			</header><!-- .page-header -->
            <div class="row">
            <div class="col-12  d-flex justify-content-around flex-wrap m-5">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
            
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            $image = get_field('photo_du_projet');


            if( !empty($image) ): ?>

               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


            <?php endif; ?>
                <?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
			//	get_template_part( 'content-projet', get_post_format() );
            

			endwhile;

			the_posts_navigation();
                
		else :

			get_template_part( 'content-projet', 'none' );

		endif; ?>
            </div>
                </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
