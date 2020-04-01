<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
<?php get_template_part( 'footer-widget' ); ?>
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #content -->



    <footer class="footer py-4 border-top border-dark">

        <div class="container">

            <div class="social row d-flex justify-content-between pt-3 pb-4 mt-2">
                <div class="col-md-4 footer-menu">
                    <h6>
                        Доставка по Красноусольску
                    </h6>
                    <div class="mt-3">
                      <a href="<?php echo esc_url( home_url( '/' )); ?><?php echo "/region"; ?>" class="">
                        Населённые пункты
                      </a>
                    </div>
                    <div class="mt-2">
                      <a href="<?php echo esc_url( home_url( '/' )); ?><?php echo "/for-shop"; ?>" class="">
                        Юридическим лицам
                      </a>
                    </div>
                </div>

                <div class="col-md-4 col-6">
                    <h6>
                        Телефон
                    </h6>
                    <div class="mt-2">
                        <span class="phone font-weight-bold text-monospace">
                          <a href="tel:<?php echo $GLOBALS['cgv']['phone_footer'] ?>" class="">
                            <?php echo $GLOBALS['cgv']['phone_footer'] ?>
                          </a>
                        </span>
                    </div>
                    <h6 class="mt-md-4 mt-2">
                        Email
                    </h6>
                    <div class="mt-2">
                        <span class="phone font-weight-bold text-monospace">
                            <a href="mailto:<?php echo $GLOBALS['cgv']['email_footer'] ?>" class="contacts__row-info-phone">
                              <?php echo $GLOBALS['cgv']['email_footer'] ?>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-1 px-2">
                <span class="copyright">
                  <?php echo $GLOBALS['cgv']['copyright'] ?>
                </span>
            </div>
        </div>

    </footer>


<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
