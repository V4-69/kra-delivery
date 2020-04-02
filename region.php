<?php
/**
* Template Name: Region
**/

get_header();
?>
        </div><!-- .row -->
    </div><!-- .container -->

  <div class="content menu">
    <div class="container">
      <div class = "row1 mt-5 mb-5">
        <h3 class="text-center">
          Выберете Ваш населённый пункт
        </h3>
      </div>

      <div class = "row">

<?php
      $all_region = get_categories( [
      	'taxonomy'     => 'category',
      	'type'         => 'post',
      	'child_of'     => get_category_by_slug('region')->term_id,
      	'parent'       => '',
      	'orderby'      => 'name',
      	'order'        => 'ASC',
      	'hide_empty'   => 0,
      	'hierarchical' => 1,
      	'exclude'      => '',
      	'include'      => '',
      	'number'       => 0,
      	'pad_counts'   => false,
      ] );

      foreach ($all_region as $region) {
?>
        <div class="col-xl-3 col-md-4 col-sm-6 py-1 px-1 my-1">
          <a class="link" href="<?php echo esc_url( home_url( '/' )) . 'kind/?region=' . $region->slug ?>">
            <div class="product py-2 px-2 shadow-sm">
              <div class="d-flex justify-content-center mt-4">
                <img src="<?php echo get_stylesheet_directory_uri().'/img/region/' . $region->slug . '.jpg';?>" class="img-shop" alt="Адаптивные изображения">
              </div>
              <span class="product-name text-center mt-2">
                <h6><?php echo $region->name;?></h6>
              </span>
            </div>
          </a>
        </div>
<?php
      }
?>

      </div>
    </div>
  </div>
</div>
<?php
get_footer();
