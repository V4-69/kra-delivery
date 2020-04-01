<?php
/**
* Template Name: Blog
**/

get_header();
?>
        </div><!-- .row -->
    </div><!-- .container -->
  <div class="container mt-5">

    <?php
    $cat = get_category_by_slug('blog');
    $id = $cat->term_id;

    //$id = 46; // ID заданной рубрики
    $n  = 30;   // количество выводимых записей
    $recent = new WP_Query("cat=$id&showposts=$n");
    $counter_post = 0;
    while($recent->have_posts()) :
    $recent->the_post();
    $counter_post++;
    $order1 = 1;
    $order2 = 2;
    if ($counter_post % 2 == 0) {
      $order1 = 2;
      $order2 = 1;
    }
    ?>

    <div class="row d-md-flex flex-md-nowrap bd-md-highlight mt-5">
      <div class="col-md-6 order-<?php echo $order2; ?>">
        <div class="date-post mt-5">
          <?php echo get_the_date(); ?>
        </div>
        <div class="post-title mt-2 pb-2 border-bottom">
          <h5 class = "mb-3">
            <?php the_title(); ?>
          </h5>
        </div>
        <div class="mt-3 post-content text-justify">
          <?php the_excerpt(); ?>
        </div>
        <div class="mt-4 read-more">
          <a href="<?= the_permalink();?>">
            Читать дальше
          </a>
        </div>
      </div>
    </div>

    <?php endwhile; ?>
  </div>
</div>





</div>
<?php
get_footer();
