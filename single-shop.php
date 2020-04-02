<?php
/*
 * Template Name: Shop
 * Template Post Type: post
 */
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

				<div class = "row">
					<div class = "col-lg-4">
        		<img class="img-shop-single" src="<?php echo the_post_thumbnail_url(); ?>" class="" alt="">
					</div>
					<div class = "col-lg-8">
						<h3 class="text-center mb-3 pb-3 border-bottom mt-lg-1 mt-3">
		          <?php echo the_title(); ?>
		        </h3>

						<div class="d-flex bd-highlight mb-3 pb-3">
							<div class="mr-auto bd-highlight">
								Часы работы
							</div>
							<div class="bd-highlight">
								<?php echo get_post_meta( get_the_id(), 'time_work', true) ?>
							</div>
						</div>

						<div class="d-flex bd-highlight mb-3 pb-3">
							<div class="mr-auto bd-highlight">
								Телефон
							</div>
							<div class="bd-highlight">
			          <a href="tel:<?php echo get_post_meta( get_the_id(), 'phone_link', true) ?>" class="contacts__row-info-phone">
			            <?php echo get_post_meta( get_the_id(), 'phone', true) ?>
			          </a>
			        </div>
						</div>

						<div class="d-flex bd-highlight mb-3 pb-3">
							<div class="mr-auto bd-highlight">
								Сайт
							</div>
							<div class="bd-highlight">
								<a href="<?php echo get_post_meta( get_the_id(), 'site', true) ?>">
									<?php echo get_post_meta( get_the_id(), 'site', true) ?>
								</a>
							</div>
						</div>

						<div class="d-flex bd-highlight mb-3 pb-3">
							<div class="mr-auto bd-highlight">
								Instagram
							</div>
							<div class="bd-highlight">
								<a href="<?php echo get_post_meta( get_the_id(), 'instagram', true) ?>" class="">
                  ___<i class="fab fa-instagram"></i>___
                </a>
							</div>
						</div>


					</div>
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
