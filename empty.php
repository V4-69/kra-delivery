<?php
/**
* Template Name: Empty
**/

get_header(); 
?>
        </div><!-- .row -->
    </div><!-- .container -->

    <div class="container mt-5">
         
    <?php
    while ( have_posts() ) : the_post();

      the_content();

    endwhile; // End of the loop.
    ?>
           

      </div>

</div>
</div>
<?php
get_footer();
