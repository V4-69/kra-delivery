<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">
      <div class="container shadow pt-5 pb-4 px-4 mt-5">
        <?php
        while ( have_posts() ) : the_post();
        ?>
        <h2 class="text-center">
          <?php echo the_title(); ?>
        </h2>
        <img class="main-post-img mt-2" src="<?php echo the_post_thumbnail_url(); ?>" class="" alt="">
        <div class="mt-2 text-right px-3">
          <i class="far fa-calendar-alt"></i>
          <?php echo get_the_date(); ?>
        </div>
        
        <div class="mt-4 main-post-content px-3">
          <?php the_content();?>
        </div>
        <?php
        endwhile; // End of the loop.
        ?>
        
      </div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
