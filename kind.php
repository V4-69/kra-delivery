<?php
/**
* Template Name: Kind
**/

get_header();
?>
        </div><!-- .row -->
    </div><!-- .container -->

<?php

  $region_slug = 'kra';
  if (isset($_GET['region'])) {
    $region_slug = $_GET['region'];
  }
  $all_categories = get_categories( [
    'taxonomy'     => 'category',
    'type'         => 'post',
    'child_of'     => get_category_by_slug('kind')->term_id,
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

?>

<div class="content menu">

    <h3 class="text-center mt-5 pb-3"><?php the_title(); ?></h3>

    <h4 class="text-center mt-5 pb-3">
      <?php echo get_category_by_slug($region_slug)->name ?>
    </h4>

    <div class="container px-xl-5">
      <div class="row">
        <nav>
          <div class="nav nav-tabs row d-flex justify-content-center align-items-center" id="nav-tab" role="tablist">
<?php
            $i = 0;
            foreach ($all_categories as $cat) {
                $name = $cat->name;
                $slug = $cat->slug;
                $selected = 'false';
                $active = '';
                if($i == 0){
                  $selected = 'true';
                  $active = ' active';
                }
                $i++;
?>
                <a class="category-one1 nav-item nav-link<?php echo $active;?>" id="nav-<?php echo $slug;?>-tab" data-toggle="tab" href="#nav-<?php echo $slug;?>" role="tab" aria-controls="nav-<?php echo $slug;?>" aria-selected="<?php echo $selected;?>">
                  <div class="col-auto">
                    <span class = "category-name d-flex align-items-center justify-content-center">
                      <?php echo $name;?>
                    </span>
                  </div>
                </a>
<?php
            }
?>
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="tab-content" id="nav-tabContent">
<?php
        $iCat = 0;
        foreach ($all_categories as $kinds_shop) {
            $kind_shop_slug = $kinds_shop->slug;
            $kind_shop_id = $kinds_shop->term_id;
            $showActive = '';
            if((($iCat == 0) && ($category_p == '')) || ($slug == $category_p)){
                $showActive = ' show active';
            }
            $iCat++;
?>
            <div class="tab-pane fade<?php echo $showActive;?>" id="nav-<?php echo $kind_shop_slug;?>" role="tabpanel" aria-labelledby="nav-<?php echo $kind_shop_slug;?>-tab">
              <div class="products mt-5">
                <div class = "row">
<?php
                  $posts = get_posts(array( 'category__and' => array(get_category_by_slug($region_slug)->term_id, get_category_by_slug($kind_shop_slug)->term_id) ));
                  foreach ($posts as $post) {
?>

                    <div class="col-xl-3 col-md-4 col-sm-6 py-1 px-1 my-1">
                      <a class="link" href="<?php echo get_permalink($post)?>">
                        <div class="product py-2 px-2 shadow-sm">
                          <div class="d-flex justify-content-center mt-4">
                            <img src="<?php echo get_the_post_thumbnail_url($post);?>" class="img-shop" alt="Адаптивные изображения">
                          </div>
                          <span class="product-name text-center mt-2">
                            <h6><?php echo get_the_title($post);?></h6>
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
<?php
      }
?>
    </div>
  </div>

</div>
<?php
get_footer();
